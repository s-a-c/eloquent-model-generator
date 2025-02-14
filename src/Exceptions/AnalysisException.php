<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use InvalidArgumentException;
use RuntimeException;
use Throwable;

/**
 * Base exception class for analysis-related errors.
 */
class AnalysisException extends RuntimeException {
    /**
     * Error codes for analysis exceptions.
     */
    public const ERROR_INVALID_CONFIG = 1;
    public const ERROR_MISSING_CONFIG = 2;
    public const ERROR_INVALID_FORMAT = 3;
    public const ERROR_EXECUTION_FAILED = 4;

    /**
     * Create a new analysis exception instance.
     *
     * @param string $message The exception message
     * @param int $code The exception code
     * @param \Throwable|null $previous The previous throwable used for exception chaining
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the exception context as an array.
     *
     * @return array{message: string, code: int}
     */
    public function getContext(): array {
        return [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ];
    }

    /**
     * Validate that a string is not empty.
     *
     * @param string $value The value to validate
     * @param string $name The name of the value for error messages
     * @throws \InvalidArgumentException If value is empty
     */
    protected static function validateNotEmpty(string $value, string $name): void {
        if (empty(trim($value))) {
            throw new InvalidArgumentException(sprintf('%s cannot be empty', ucfirst($name)));
        }
    }

    /**
     * Validate that a value is within a range.
     *
     * @param int $value The value to validate
     * @param int $min The minimum allowed value
     * @param int $max The maximum allowed value
     * @param string $name The name of the value for error messages
     * @throws \InvalidArgumentException If value is out of range
     */
    protected static function validateRange(int $value, int $min, int $max, string $name): void {
        if ($value < $min || $value > $max) {
            throw new InvalidArgumentException(
                sprintf('%s must be between %d and %d', ucfirst($name), $min, $max)
            );
        }
    }

    /**
     * Validate that a value is one of the allowed values.
     *
     * @param mixed $value The value to validate
     * @param array<mixed> $allowed The allowed values
     * @param string $name The name of the value for error messages
     * @throws \InvalidArgumentException If value is not allowed
     */
    protected static function validateAllowed(mixed $value, array $allowed, string $name): void {
        if (!in_array($value, $allowed, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    '%s must be one of: %s',
                    ucfirst($name),
                    implode(', ', array_map('strval', $allowed))
                )
            );
        }
    }

    /**
     * Validate that an array has required keys.
     *
     * @param array<mixed> $array The array to validate
     * @param array<string> $required The required keys
     * @param string $name The name of the array for error messages
     * @throws \InvalidArgumentException If required keys are missing
     */
    protected static function validateRequiredKeys(array $array, array $required, string $name): void {
        $missing = array_diff($required, array_keys($array));
        if (!empty($missing)) {
            throw new InvalidArgumentException(
                sprintf(
                    '%s is missing required keys: %s',
                    ucfirst($name),
                    implode(', ', $missing)
                )
            );
        }
    }

    /**
     * Validate that a path exists and is readable.
     *
     * @param string $path The path to validate
     * @param string $name The name of the path for error messages
     * @throws \InvalidArgumentException If path is invalid
     */
    protected static function validatePath(string $path, string $name): void {
        if (!file_exists($path)) {
            throw new InvalidArgumentException(
                sprintf('%s does not exist: %s', ucfirst($name), $path)
            );
        }
        if (!is_readable($path)) {
            throw new InvalidArgumentException(
                sprintf('%s is not readable: %s', ucfirst($name), $path)
            );
        }
    }
}
