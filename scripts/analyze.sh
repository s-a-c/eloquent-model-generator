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

# Default analysis levels and target directory
ANALYSIS_LEVELS=${ANALYSIS_LEVELS:-"1,2,3,4,5,6,7,8"}
TARGET_DIR=${TARGET_DIR:-"$PROJECT_ROOT/src"}

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
    echo "  -l, --levels LEVELS    Comma-separated list of PHPStan levels to run (e.g., '1,3,5' or '1-4')"
    echo "  -d, --directory DIR    Directory to analyze (default: ./src)"
    echo "  -h, --help            Show this help message"
    echo ""
    echo "Environment variables:"
    echo "  ANALYSIS_LEVELS       Alternative way to specify levels (same format as --levels)"
    echo "  TARGET_DIR           Alternative way to specify target directory"
    echo "  CI                    Set to any value to enable CI mode"
    echo ""
    echo "Examples:"
    echo "  $0 --levels 1,3,5                    # Run levels 1, 3, and 5"
    echo "  $0 --levels 1-4 --directory ./lib    # Run levels 1-4 on ./lib directory"
    echo "  TARGET_DIR=./app $0                  # Analyze ./app directory"
}

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
    -l | --levels)
        ANALYSIS_LEVELS="$2"
        shift 2
        ;;
    -d | --directory)
        TARGET_DIR="$2"
        shift 2
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

# Validate target directory
if [ ! -d "$TARGET_DIR" ]; then
    handle_error "Invalid directory" "Directory does not exist: $TARGET_DIR"
fi

# Convert target directory to absolute path
TARGET_DIR=$(cd "$TARGET_DIR" && pwd)

# Store target directory for fix.sh
mkdir -p "$PROJECT_ROOT/build"
echo "$TARGET_DIR" >"$PROJECT_ROOT/build/target_dir.txt"

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

# Expand any ranges in ANALYSIS_LEVELS
ANALYSIS_LEVELS=$(expand_level_range "$ANALYSIS_LEVELS")

# Function to run command with error handling and output capture
run_command() {
    local command_name="$1"
    local level="${2:-}" # Optional level parameter
    shift
    [[ -n "$level" ]] && shift

    local report_dir
    if [[ -n "$level" ]]; then
        report_dir="$REPORTS_DIR/level$level"
        command_name="$command_name Level $level"
    else
        report_dir="$REPORTS_DIR/tools"
    fi

    mkdir -p "$report_dir"
    local output_file="$report_dir/${command_name// /_}.txt"
    local error_file="$report_dir/${command_name// /_}.errors"

    print_header "$command_name"
    if ! "$@" >"$output_file" 2>&1; then
        echo -e "${RED}⚠ $command_name found issues. Check $output_file for details${NC}"
        # Extract file paths from the output and store them
        grep -o "$TARGET_DIR/[^:]*" "$output_file" | sort -u >"$error_file"
        # Don't exit immediately, collect all issues
        FOUND_ISSUES=1
    else
        echo -e "${GREEN}✓ $command_name completed successfully${NC}"
        # Create empty error file to indicate no issues
        touch "$error_file"
    fi
}

# Create reports directory if it doesn't exist
REPORTS_DIR="$PROJECT_ROOT/build/reports"
mkdir -p "$REPORTS_DIR"

# Cleanup previous reports
rm -rf "$REPORTS_DIR"/*

# Initialize issues flag
FOUND_ISSUES=0

# Check if running in CI
if [ -n "${CI:-}" ]; then
    PARALLEL_FLAG="--parallel"
    ANSI_FLAG="--ansi"
else
    PARALLEL_FLAG=""
    ANSI_FLAG=""
fi

# Run PHPStan for each specified level
print_info "Running PHPStan analysis for levels: $ANALYSIS_LEVELS"
print_info "Target directory: $TARGET_DIR"
for level in ${ANALYSIS_LEVELS//,/ }; do
    run_command "PHPStan" "$level" vendor/bin/phpstan analyse --level="$level" --memory-limit=256M --error-format=table "$TARGET_DIR"
done

# Run other analysis tools
print_info "Running additional analysis tools..."
run_command "Psalm" "" vendor/bin/psalm --show-info=true --output-format=console --report="$REPORTS_DIR/tools/psalm.xml" "$TARGET_DIR"
run_command "PHPMD" "" vendor/bin/phpmd "$TARGET_DIR" ansi phpmd.xml --reportfile "$REPORTS_DIR/tools/phpmd.html" --report-html
run_command "Rector (dry-run)" "" vendor/bin/rector process "$TARGET_DIR" --dry-run --clear-cache
run_command "Type Coverage" "" vendor/bin/type-coverage analyse "$TARGET_DIR"
run_command "Class Leak" "" vendor/bin/class-leak analyse "$TARGET_DIR"
run_command "PHP CS Fixer" "" vendor/bin/php-cs-fixer fix --dry-run --diff "$TARGET_DIR"
run_command "PHP_CodeSniffer" "" vendor/bin/phpcs "$TARGET_DIR"
run_command "PHPMetrics" "" vendor/bin/phpmetrics --report-html="$REPORTS_DIR/tools/metrics" "$TARGET_DIR"

# Run Infection for mutation testing (if not in CI)
if [ -z "${CI:-}" ]; then
    run_command "Infection" "" vendor/bin/infection --min-msi=80 --min-covered-msi=90 --threads=4 --show-mutations --log-verbosity=default --only-covered --filter="$TARGET_DIR"
fi

# Generate consolidated report
print_header "Generating Analysis Report"

# Create summary report for each level and tools
{
    echo "Static Analysis Summary"
    echo "====================="
    echo ""
    echo "Target Directory: $TARGET_DIR"
    echo ""
    echo "PHPStan Analysis Results:"
    for level in ${ANALYSIS_LEVELS//,/ }; do
        echo "Level $level:"
        level_dir="$REPORTS_DIR/level$level"
        if [ -d "$level_dir" ]; then
            error_file="$level_dir/PHPStan_Level_$level.errors"
            if [ -f "$error_file" ]; then
                error_count=$(wc -l <"$error_file")
                echo "  - $error_count files with issues"
                if [ "$error_count" -gt 0 ]; then
                    echo "  - Affected files:"
                    while IFS= read -r file; do
                        echo "    - $file"
                    done <"$error_file"
                fi
            fi
        fi
    done
    echo ""
    echo "Other Tool Results:"
    for tool_dir in "$REPORTS_DIR/tools"/*.errors; do
        if [ -f "$tool_dir" ]; then
            tool_name=$(basename "$tool_dir" .errors)
            error_count=$(wc -l <"$tool_dir")
            echo "- ${tool_name}: $error_count files with issues"
            if [ "$error_count" -gt 0 ]; then
                echo "  Affected files:"
                while IFS= read -r file; do
                    echo "  - $file"
                done <"$tool_dir"
            fi
        fi
    done
} >"$REPORTS_DIR/summary.txt"

# Create HTML report index with full file paths
cat >"$REPORTS_DIR/index.html" <<EOF
<!DOCTYPE html>
<html>
<head>
    <title>Static Analysis Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .report-link { margin: 10px 0; }
        .summary { background: #f5f5f5; padding: 15px; border-radius: 5px; }
        .issues { color: #d63939; }
        .success { color: #2fb344; }
        .level-section { margin-top: 20px; }
        .file-list { margin-left: 20px; font-family: monospace; }
    </style>
</head>
<body>
    <h1>Static Analysis Report</h1>
    <div class="summary">
        <h2>Quick Summary</h2>
        <pre>$(cat "$REPORTS_DIR/summary.txt")</pre>
    </div>

    <h2>PHPStan Analysis Reports</h2>
    $(for level in ${ANALYSIS_LEVELS//,/ }; do
    echo "<div class='level-section'>"
    echo "<h3>Level $level</h3>"
    echo "<div class='report-link'><a href='level$level/PHPStan_Level_$level.txt'>View Report</a></div>"
    error_file="$REPORTS_DIR/level$level/PHPStan_Level_$level.errors"
    if [ -f "$error_file" ] && [ -s "$error_file" ]; then
        echo "<div class='file-list'><h4>Files with Issues:</h4><ul>"
        while IFS= read -r file; do
            echo "<li>$file</li>"
        done <"$error_file"
        echo "</ul></div>"
    fi
    echo "</div>"
done)

    <h2>Other Tool Reports</h2>
    <div class="report-link"><a href="tools/metrics/index.html">PHPMetrics Report</a></div>
    <div class="report-link"><a href="tools/phpmd.html">PHP Mess Detector Report</a></div>
    <div class="report-link"><a href="tools/psalm.xml">Psalm Report</a></div>
    <div class="report-link"><a href="summary.txt">Summary Report</a></div>
</body>
</html>
EOF

if [ "$FOUND_ISSUES" -eq 1 ]; then
    echo -e "\n${YELLOW}Analysis completed with issues.${NC}"
    echo -e "Review the reports at: $REPORTS_DIR"
    echo -e "Quick summary available in: $REPORTS_DIR/summary.txt"
    echo -e "HTML report available at: $REPORTS_DIR/index.html"
    echo -e "\nTo fix issues automatically, run: ${GREEN}composer fix${NC}"

    # Create marker files for fix.sh
    echo "$ANALYSIS_LEVELS" >"$REPORTS_DIR/analyzed_levels.txt"
    echo "$TARGET_DIR" >"$REPORTS_DIR/target_dir.txt"
    exit 1
else
    echo -e "\n${GREEN}Analysis completed successfully!${NC}"
    echo -e "Reports are available in: $REPORTS_DIR"
    echo -e "Open $REPORTS_DIR/index.html to view the consolidated report"
fi
