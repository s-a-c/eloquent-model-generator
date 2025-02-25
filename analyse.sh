#!/usr/bin/env bash

# Exit on error
set -e

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${YELLOW}Running PHPStan Analysis...${NC}\n"

# Clear cache
rm -rf .phpstan

# Run analysis and save output
./vendor/bin/phpstan analyse \
    --level=10 \
    --memory-limit=2G \
    --xdebug \
    --debug \
    --no-progress \
    --error-format=prettyJson \
    --autoload-file=vendor/autoload.php \
    --configuration=phpstan.neon \
    --fail-without-result-cache \
    --generate-baseline \
    --allow-empty-baseline \
    src tests >phpstan-output.json 2>&1

# Check exit code
RESULT=$?

# Display output
cat phpstan-output.json

if [ $RESULT -eq 0 ]; then
    echo -e "\n${GREEN}Analysis completed successfully!${NC}"
    exit 0
else
    echo -e "\n${RED}Analysis failed. Please check the errors above.${NC}"
    exit 1
fi
