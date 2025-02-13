#!/bin/bash

# Set strict error handling
set -euo pipefail

# Define paths
PACKAGE_ROOT="/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator"
SOURCE_DIR="${PACKAGE_ROOT}/packages/StandAlonecomplex/EloquentModelGenerator/src"
TARGET_DIR="${PACKAGE_ROOT}/src"

# Create backup
echo "Creating backup..."
timestamp=$(date +%Y%m%d_%H%M%S)
backup_dir="${PACKAGE_ROOT}/backup_${timestamp}"
mkdir -p "$backup_dir"
cp -r "${PACKAGE_ROOT}/src" "$backup_dir/" 2>/dev/null || true
cp -r "${SOURCE_DIR}" "$backup_dir/packages_src" 2>/dev/null || true

# Ensure target directory exists
mkdir -p "$TARGET_DIR"

# Function to check if a file exists in target
check_conflict() {
    local source_file="$1"
    local target_file="$2"

    if [ -f "$target_file" ]; then
        echo "CONFLICT: File already exists: $target_file"
        return 1
    fi
    return 0
}

# Move files from nested structure to main src directory
echo "Moving files..."
if [ -d "$SOURCE_DIR" ]; then
    # First, check for conflicts
    conflicts=0
    while IFS= read -r -d '' file; do
        rel_path="${file#$SOURCE_DIR/}"
        target_file="${TARGET_DIR}/${rel_path}"

        if ! check_conflict "$file" "$target_file"; then
            conflicts=$((conflicts + 1))
        fi
    done < <(find "$SOURCE_DIR" -type f -print0)

    if [ $conflicts -gt 0 ]; then
        echo "Error: Found $conflicts file(s) that would be overwritten."
        echo "Please resolve conflicts manually or remove existing files before proceeding."
        echo "Backup of current state is available at: $backup_dir"
        exit 1
    fi

    # If no conflicts, proceed with copy
    while IFS= read -r -d '' file; do
        rel_path="${file#$SOURCE_DIR/}"
        target_file="${TARGET_DIR}/${rel_path}"
        target_dir=$(dirname "$target_file")

        mkdir -p "$target_dir"
        cp "$file" "$target_file"
    done < <(find "$SOURCE_DIR" -type f -print0)

    echo "Successfully moved files without any conflicts."
    echo "You can now safely remove the old packages directory by running:"
    echo "rm -rf \"${PACKAGE_ROOT}/packages\""
fi

# Fix any potential permission issues
find "$TARGET_DIR" -type d -exec chmod 755 {} \;
find "$TARGET_DIR" -type f -exec chmod 644 {} \;

echo "Refactoring complete!"
echo "Backup created at: $backup_dir"
echo "Please verify the changes and run ./scripts/cleanup.sh if everything looks correct"
