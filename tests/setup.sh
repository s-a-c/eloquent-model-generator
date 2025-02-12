#!/bin/bash

# Create test directories
mkdir -p tests/tmp/bootstrap/cache
mkdir -p tests/tmp/storage/framework/cache
mkdir -p tests/tmp/storage/framework/sessions
mkdir -p tests/tmp/storage/framework/views
mkdir -p tests/tmp/storage/logs

# Set permissions
chmod -R 777 tests/tmp/bootstrap/cache
chmod -R 777 tests/tmp/storage

# Create SQLite database directory
mkdir -p tests/database
touch tests/database/database.sqlite

# Create test environment file if it doesn't exist
if [ ! -f tests/.env.testing ]; then
    cp tests/.env.example tests/.env.testing 2>/dev/null || :
fi
