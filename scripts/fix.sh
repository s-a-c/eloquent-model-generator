#!/usr/bin/env bash

# Exit on error with better error handling
set -euo pipefail

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Script directory
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$SCRIPT_DIR/.."

# Default fix level (can be overridden by environment variable)
FIX_LEVELS=${FIX_LEVELS:-"all"}

# Function to print section header
print_header() {
    echo -e "\n${YELLOW}=== $1 ===${NC}\n"
}

# Function to print info message
print_info() {
    echo -e "${BLUE}$1${NC}"
}

# Function to handle errors
handle_error() {
    echo -e "\n${RED}Error in $1${NC}"
    if [ -n "${2:-}" ]; then
        echo -e "${RED}Details: $2${NC}"
    fi
    exit 1
}

# Function to show usage
show_usage() {
    echo "Usage: $0 [OPTIONS]"
    echo "Options:"
    echo "  -l, --levels LEVELS    Comma-separated list of PHPStan levels to fix (e.g., '1,3,5' or '1-4')"
    echo "  -a, --all             Fix all detected issues (default)"
    echo "  -h, --help            Show this help message"
    echo ""
    echo "Environment variables:"
    echo "  FIX_LEVELS           Alternative way to specify levels (same format as --levels)"
    echo ""
    echo "Examples:"
    echo "  $0 --levels 1,3,5     # Fix issues for levels 1, 3, and 5"
    echo "  $0 --levels 1-4       # Fix issues for levels 1 through 4"
    echo "  FIX_LEVELS=1,2 $0     # Fix issues for levels 1 and 2"
}

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
    -l | --levels)
        FIX_LEVELS="$2"
        shift 2
        ;;
    -a | --all)
        FIX_LEVELS="all"
        shift
        ;;
    -h | --help)
        show_usage
        exit 0
        ;;
    *)
        echo "Unknown option: $1"
        show_usage
        exit 1
        ;;
    esac
done

# Function to expand level range (e.g., "1-4" to "1,2,3,4")
expand_level_range() {
    local levels="$1"
    if [[ $levels =~ ^[0-9]+-[0-9]+$ ]]; then
        local start="${levels%-*}"
        local end="${levels#*-}"
        seq -s, "$start" "$end"
    else
        echo "$levels"
    fi
}

# Function to check if a command exists
command_exists() {
    command -v "$1" >/dev/null 2>&1
}

# Function to backup files before fixing
backup_files() {
    print_info "Creating backup of source files..."
    BACKUP_DIR="$PROJECT_ROOT/build/backup/$(date +%Y%m%d_%H%M%S)"
    mkdir -p "$BACKUP_DIR"
    cp -r "$PROJECT_ROOT/src" "$BACKUP_DIR/"
    print_info "Backup created at: $BACKUP_DIR"
}

# Function to restore backup if needed
restore_backup() {
    if [ -d "$BACKUP_DIR" ]; then
        print_info "Restoring from backup..."
        rm -rf "$PROJECT_ROOT/src"
        cp -r "$BACKUP_DIR/src" "$PROJECT_ROOT/"
        print_info "Restore completed"
    fi
}

# Check for required tools
for tool in php composer vendor/bin/rector vendor/bin/php-cs-fixer vendor/bin/phpcbf; do
    if ! command_exists "$tool"; then
        handle_error "Missing required tool" "Please ensure $tool is installed and available in your PATH"
    fi
done

# Get analyzed levels and target directory from the last analysis run
REPORTS_DIR="$PROJECT_ROOT/build/reports"
if [ -f "$REPORTS_DIR/analyzed_levels.txt" ] && [ -f "$REPORTS_DIR/target_dir.txt" ]; then
    ANALYZED_LEVELS=$(cat "$REPORTS_DIR/analyzed_levels.txt")
    TARGET_DIR=$(cat "$REPORTS_DIR/target_dir.txt")
else
    print_info "No analysis report found. Running analysis first..."
    if ! "$SCRIPT_DIR/analyze.sh"; then
        handle_error "Analysis failed" "Please fix analysis errors before running fixes"
    fi
    ANALYZED_LEVELS=$(cat "$REPORTS_DIR/analyzed_levels.txt")
    TARGET_DIR=$(cat "$REPORTS_DIR/target_dir.txt")
fi

# Validate target directory still exists
if [ ! -d "$TARGET_DIR" ]; then
    handle_error "Invalid directory" "Target directory no longer exists: $TARGET_DIR"
fi

# If FIX_LEVELS is "all", use all analyzed levels
if [ "$FIX_LEVELS" = "all" ]; then
    FIX_LEVELS="$ANALYZED_LEVELS"
else
    # Expand any ranges in FIX_LEVELS
    FIX_LEVELS=$(expand_level_range "$FIX_LEVELS")

    # Validate that we're only fixing analyzed levels
    for level in ${FIX_LEVELS//,/ }; do
        if ! echo "$ANALYZED_LEVELS" | grep -q "\b$level\b"; then
            handle_error "Invalid level" "Level $level was not included in the analysis. Please run analyze.sh with this level first."
        fi
    done
fi

# Create backup before starting
backup_files

# Trap errors and restore from backup if needed
trap 'echo -e "${RED}Error occurred. Rolling back changes...${NC}"; restore_backup' ERR

print_header "Starting Automated Fix Process"
print_info "Target directory: $TARGET_DIR"

# Function to get files with issues for a specific level/tool
get_files_with_issues() {
    local error_file="$1"
    if [ -f "$error_file" ] && [ -s "$error_file" ]; then
        cat "$error_file"
    fi
}

# Stage 1: Run Rector fixes for each level
print_info "Stage 1: Running Rector fixes for levels: $FIX_LEVELS"
for level in ${FIX_LEVELS//,/ }; do
    print_header "Fixing PHPStan Level $level issues"
    error_file="$REPORTS_DIR/level$level/PHPStan_Level_$level.errors"
    if [ -f "$error_file" ] && [ -s "$error_file" ]; then
        files_to_fix=$(get_files_with_issues "$error_file")
        if [ -n "$files_to_fix" ]; then
            print_info "Fixing $(wc -l <"$error_file") files..."
            echo "$files_to_fix" | xargs vendor/bin/rector process --config-set="parameters.phpstan.level=$level"
        fi
    fi
done

# Stage 2: Fix coding standards
print_info "Stage 2: Fixing coding standards..."

# Run PHP CS Fixer on files with issues
cs_fixer_errors="$REPORTS_DIR/tools/PHP_CS_Fixer.errors"
if [ -f "$cs_fixer_errors" ] && [ -s "$cs_fixer_errors" ]; then
    print_header "PHP CS Fixer"
    files_to_fix=$(get_files_with_issues "$cs_fixer_errors")
    if [ -n "$files_to_fix" ]; then
        print_info "Fixing $(wc -l <"$cs_fixer_errors") files..."
        echo "$files_to_fix" | xargs vendor/bin/php-cs-fixer fix
    fi
fi

# Run PHP Code Beautifier on files with issues
phpcs_errors="$REPORTS_DIR/tools/PHP_CodeSniffer.errors"
if [ -f "$phpcs_errors" ] && [ -s "$phpcs_errors" ]; then
    print_header "PHPCBF"
    files_to_fix=$(get_files_with_issues "$phpcs_errors")
    if [ -n "$files_to_fix" ]; then
        print_info "Fixing $(wc -l <"$phpcs_errors") files..."
        echo "$files_to_fix" | xargs vendor/bin/phpcbf
    fi
fi

# Stage 3: Run type coverage improvements
print_info "Stage 3: Running type coverage improvements..."
type_coverage_errors="$REPORTS_DIR/tools/Type_Coverage.errors"
if [ -f "$type_coverage_errors" ] && [ -s "$type_coverage_errors" ]; then
    files_to_fix=$(get_files_with_issues "$type_coverage_errors")
    if [ -n "$files_to_fix" ]; then
        print_info "Fixing $(wc -l <"$type_coverage_errors") files..."
        echo "$files_to_fix" | xargs vendor/bin/rector process --config rector-type-coverage.php
    fi
fi

# Stage 4: Verify fixes
print_header "Verifying Fixes"

# Run analyze.sh to check if issues are resolved
print_info "Running analysis to verify fixes..."
if ! "$SCRIPT_DIR/analyze.sh" --levels "$FIX_LEVELS" --directory "$TARGET_DIR"; then
    print_info "Some issues remain after fixes. Manual review may be needed."
    # Don't exit with error - some issues might need manual intervention
fi

# Create rector-type-coverage.php if it doesn't exist
if [ ! -f "$PROJECT_ROOT/rector-type-coverage.php" ]; then
    cat >"$PROJECT_ROOT/rector-type-coverage.php" <<'EOF'
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\Property\AddPropertyTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([__DIR__ . '/src']);

    $rectorConfig->rules([
        AddReturnTypeDeclarationRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        AddPropertyTypeDeclarationRector::class,
        ParamTypeFromStrictTypedPropertyRector::class,
    ]);

    $rectorConfig->skip([
        // Add any paths or patterns to skip
        __DIR__ . '/src/Legacy/*',
    ]);
};
EOF
fi

print_header "Fix Process Completed"
echo -e "${GREEN}Fixes have been applied successfully!${NC}"
echo -e "A backup of your original files is available at: $BACKUP_DIR"
echo -e "\nTo verify the fixes, run: ${BLUE}composer analyze --levels $FIX_LEVELS --directory $TARGET_DIR${NC}"
