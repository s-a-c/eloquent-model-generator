#!/bin/bash

# Find all test files and rename test methods
cd /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator
find ./tests -type f -name "*Test.php" -exec sed -i '' 's/public function it_\([^(]*\)/public function test\u\1/g' {} \;

# Find all test files and rename test methods with should prefix
cd /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator
find ./tests -type f -name "*Test.php" -exec sed -i '' 's/public function should_\([^(]*\)/public function test\u\1/g' {} \;

echo "Test method names have been updated across all test files"
