<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use InvalidArgumentException;
use Throwable;

/**
 * Exception thrown when configuration errors occur.
 */
class ConfigurationException extends AnalysisException
{
    /**
     * Create a new configuration exception instance.
     *
     * @param  string  $message  The exception message
     * @param  int  $code  The exception code
     * @param  \Throwable|null  $previous  The previous throwable used for exception chaining
     */
    public function __construct(
        string $message = 'Invalid configuration',
        int $code = self::ERROR_INVALID_CONFIG,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create an exception for missing configuration.
     *
     * @param  string  $configName  The name of the missing configuration
     */
    public static function missingConfig(string $configName): self
    {
        self::validateNotEmpty($configName, 'configuration name');

        return new self(
            sprintf('Missing required configuration: %s', $configName),
            self::ERROR_MISSING_CONFIG
        );
    }

    /**
     * Create an exception for invalid configuration.
     *
     * @param  string  $configName  The name of the invalid configuration
     * @param  string  $reason  The reason for invalidity
     */
    public static function invalidConfig(string $configName, string $reason): self
    {
        self::validateNotEmpty($configName, 'configuration name');
        self::validateNotEmpty($reason, 'reason');

        return new self(
            sprintf('Invalid configuration %s: %s', $configName, $reason),
            self::ERROR_INVALID_CONFIG
        );
    }

    /**
     * Create an exception for invalid configuration value.
     *
     * @param  string  $configName  The name of the configuration
     * @param  string  $value  The invalid value
     * @param  string  $expected  The expected value or format
     */
    public static function invalidValue(string $configName, string $value, string $expected): self
    {
        self::validateNotEmpty($configName, 'configuration name');
        self::validateNotEmpty($expected, 'expected value');

        return new self(
            sprintf(
                'Invalid value for configuration %s: got "%s", expected %s',
                $configName,
                $value,
                $expected
            ),
            self::ERROR_INVALID_CONFIG
        );
    }

    /**
     * Create an exception for missing required value.
     *
     * @param  string  $configName  The name of the configuration
     * @param  string  $value  The name of the missing value
     */
    public static function missingRequiredValue(string $configName, string $value): self
    {
        self::validateNotEmpty($configName, 'configuration name');
        self::validateNotEmpty($value, 'value name');

        return new self(
            sprintf(
                'Missing required value "%s" in configuration %s',
                $value,
                $configName
            ),
            self::ERROR_MISSING_CONFIG
        );
    }

    /**
     * Create an exception for incompatible configuration.
     *
     * @param  string  $configName  The name of the configuration
     * @param  string  $otherConfig  The name of the incompatible configuration
     * @param  string  $reason  The reason for incompatibility
     */
    public static function incompatibleConfig(
        string $configName,
        string $otherConfig,
        string $reason
    ): self {
        self::validateNotEmpty($configName, 'configuration name');
        self::validateNotEmpty($otherConfig, 'other configuration name');
        self::validateNotEmpty($reason, 'reason');

        return new self(
            sprintf(
                'Configuration %s is incompatible with %s: %s',
                $configName,
                $otherConfig,
                $reason
            ),
            self::ERROR_INVALID_CONFIG
        );
    }

    /**
     * Validate configuration name.
     *
     * @param  string  $configName  The configuration name to validate
     * @param  string  $type  The type of configuration
     *
     * @throws \InvalidArgumentException If config name is empty
     */
    private static function validateNotEmpty(string $configName, string $type): void
    {
        if (empty($configName)) {
            throw new InvalidArgumentException("{$type} cannot be empty");
        }
    }
}
