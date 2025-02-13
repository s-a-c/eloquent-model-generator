#!/bin/bash

# Set strict error handling
set -euo pipefail

# Define paths
PACKAGE_ROOT="/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator"

# Remove all backup directories
echo "Cleaning up backup directories..."
find "$PACKAGE_ROOT" -type d -name "backup_*" -exec rm -rf {} +

# Remove any remaining empty directories in src
echo "Removing empty directories..."
find "${PACKAGE_ROOT}/src" -type d -empty -delete

echo "Cleanup complete!"
