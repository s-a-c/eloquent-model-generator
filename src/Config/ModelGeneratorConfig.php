<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Config;

use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;

/**
 * Configuration handler for the model generator.
 */
final readonly class ModelGeneratorConfig
{
    /**
     * @param  bool  $debug  Enable debug mode
     * @param  string  $environment  Current environment
     * @param  string  $databaseDriver  Database driver (sqlite)
     * @param  string  $databasePath  Path to SQLite database
     * @param  string  $cacheDriver  Cache driver
     * @param  string  $queueConnection  Queue connection
     * @param  array<string, mixed>  $additional  Additional configuration options
     */
    public function __construct(
        public bool $debug = false,
        public string $environment = 'production',
        public string $databaseDriver = 'sqlite',
        public string $databasePath = 'database/database.sqlite',
        public string $cacheDriver = 'file',
        public string $queueConnection = 'sync',
        public array $additional = [],
    ) {
        $this->validateConfiguration();
    }

    /**
     * Create configuration from environment variables.
     */
    public static function fromEnvironment(): self
    {
        return new self(
            debug: (bool) env('EMG_DEBUG', false),
            environment: (string) env('EMG_ENVIRONMENT', 'production'),
            databaseDriver: (string) env('EMG_DATABASE_DRIVER', 'sqlite'),
            databasePath: (string) env('EMG_DATABASE_PATH', 'database/database.sqlite'),
            cacheDriver: (string) env('EMG_CACHE_DRIVER', 'file'),
            queueConnection: (string) env('EMG_QUEUE_CONNECTION', 'sync'),
            additional: [
                'namespace' => env('EMG_MODEL_NAMESPACE', 'App\\Models'),
                'path' => env('EMG_MODEL_PATH', 'app/Models'),
                'base_class' => env('EMG_MODEL_BASE_CLASS', '\\Illuminate\\Database\\Eloquent\\Model'),
                'timestamps' => (bool) env('EMG_MODEL_TIMESTAMPS', true),
                'soft_deletes' => (bool) env('EMG_MODEL_SOFT_DELETES', false),
                'fillable' => (bool) env('EMG_MODEL_FILLABLE', true),
                'guarded' => (array) explode(',', env('EMG_MODEL_GUARDED', '')),
                'dates' => (array) explode(',', env('EMG_MODEL_DATES', '')),
                'casts' => (array) json_decode(env('EMG_MODEL_CASTS', '{}'), true),
                'relations' => (bool) env('EMG_MODEL_RELATIONS', true),
                'hidden' => (array) explode(',', env('EMG_MODEL_HIDDEN', '')),
                'visible' => (array) explode(',', env('EMG_MODEL_VISIBLE', '')),
                'appends' => (array) explode(',', env('EMG_MODEL_APPENDS', '')),
                'with' => (array) explode(',', env('EMG_MODEL_WITH', '')),
                'table_prefix' => env('EMG_TABLE_PREFIX', ''),
                'ignore_tables' => (array) explode(',', env('EMG_IGNORE_TABLES', '')),
                'ignore_columns' => (array) explode(',', env('EMG_IGNORE_COLUMNS', '')),
                'custom_casts' => (array) json_decode(env('EMG_CUSTOM_CASTS', '{}'), true),
                'custom_mutators' => (array) json_decode(env('EMG_CUSTOM_MUTATORS', '{}'), true),
                'custom_accessors' => (array) json_decode(env('EMG_CUSTOM_ACCESSORS', '{}'), true),
            ],
        );
    }

    /**
     * Get an additional configuration value.
     *
     * @template T
     *
     * @param  T  $default
     * @return T
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->additional[$key] ?? $default;
    }

    /**
     * Check if an additional configuration value exists.
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->additional);
    }

    /**
     * Get all configuration as array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'debug' => $this->debug,
            'environment' => $this->environment,
            'database_driver' => $this->databaseDriver,
            'database_path' => $this->databasePath,
            'cache_driver' => $this->cacheDriver,
            'queue_connection' => $this->queueConnection,
            ...$this->additional,
        ];
    }

    /**
     * Validate the configuration.
     *
     * @throws InvalidConfigurationException
     */
    private function validateConfiguration(): void
    {
        // Validate database driver
        if ($this->databaseDriver !== 'sqlite') {
            throw InvalidConfigurationException::forInvalidConfig(
                ['database_driver' => $this->databaseDriver],
                'Only SQLite database driver is supported'
            );
        }

        // Validate database path
        if (! file_exists($this->databasePath) && $this->environment !== 'testing') {
            throw InvalidConfigurationException::forInvalidConfig(
                ['database_path' => $this->databasePath],
                'SQLite database file does not exist'
            );
        }

        // Validate environment
        if (! in_array($this->environment, ['local', 'testing', 'staging', 'production'], true)) {
            throw InvalidConfigurationException::forInvalidConfig(
                ['environment' => $this->environment],
                'Invalid environment specified'
            );
        }

        // Validate additional configuration
        $this->validateAdditionalConfig();
    }

    /**
     * Validate additional configuration options.
     *
     * @throws InvalidConfigurationException
     */
    private function validateAdditionalConfig(): void
    {
        // Validate namespace
        if (! preg_match('/^[A-Za-z0-9\\\\]+$/', $this->additional['namespace'] ?? '')) {
            throw InvalidConfigurationException::forInvalidConfig(
                ['namespace' => $this->additional['namespace'] ?? ''],
                'Invalid namespace format'
            );
        }

        // Validate base class
        if (! class_exists($this->additional['base_class'] ?? '')) {
            throw InvalidConfigurationException::forInvalidConfig(
                ['base_class' => $this->additional['base_class'] ?? ''],
                'Base class does not exist'
            );
        }

        // Validate JSON configurations
        foreach (['casts', 'custom_casts', 'custom_mutators', 'custom_accessors'] as $jsonConfig) {
            if (isset($this->additional[$jsonConfig]) && ! is_array($this->additional[$jsonConfig])) {
                throw InvalidConfigurationException::forInvalidConfig(
                    [$jsonConfig => $this->additional[$jsonConfig]],
                    "Invalid JSON format for {$jsonConfig}"
                );
            }
        }
    }
}
