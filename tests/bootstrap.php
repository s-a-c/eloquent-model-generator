<?php

require_once __DIR__.'/../vendor/autoload.php';

// Set up error handler to suppress only thecodingmachine/safe deprecation notices
set_error_handler(function ($errno, $errstr, $errfile) {
    // Only handle deprecation notices
    if ($errno !== E_DEPRECATED) {
        return false; // Let PHP handle other errors
    }

    // Only suppress if the error is from thecodingmachine/safe package
    if (str_contains($errfile, 'thecodingmachine/safe')) {
        return true; // Suppress the error
    }

    return false; // Let PHP handle other deprecation notices
});
