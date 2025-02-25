<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Config;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class EnvironmentConfigurationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Clear environment variables before each test
        foreach (array_keys($_ENV) as $key) {
            if (str_starts_with($key, 'EMG_')) {
                unset($_ENV[$key]);
            }
        }
    }

    #[Test]
    public function it_loads_configuration_from_environment(): void
    {
        // Arrange
        $_ENV['EMG_DEBUG'] = 'true';
        $_ENV['EMG_ENVIRONMENT'] = 'testing';
        $_ENV['EMG_DATABASE_DRIVER'] = 'sqlite';
        $_ENV['EMG_DATABASE_PATH'] = ':memory:';
        $_ENV['EMG_MODEL_NAMESPACE'] = 'App\\Domain\\Models';
        $_ENV['EMG_MODEL_PATH'] = 'app/Domain/Models';
        $_ENV['EMG_MODEL_TRAITS'] = 'App\\Traits\\HasUuid,App\\Traits\\Searchable';
        $_ENV['EMG_IGNORE_TABLES'] = 'migrations,failed_jobs';
        $_ENV['EMG_CUSTOM_CASTS'] = '{"point":"App\\Casts\\PointCast"}';

        // Act
        $config = ModelGeneratorConfig::fromEnvironment();

        // Assert
        expect($config->debug)->toBeTrue()
            ->and($config->environment)->toBe('testing')
            ->and($config->databaseDriver)->toBe('sqlite')
            ->and($config->databasePath)->toBe(':memory:')
            ->and($config->get('namespace'))->toBe('App\\Domain\\Models')
            ->and($config->get('path'))->toBe('app/Domain/Models')
            ->and($config->get('traits'))->toBe(['App\\Traits\\HasUuid', 'App\\Traits\\Searchable'])
            ->and($config->get('schema.exclude_tables'))->toBe(['migrations', 'failed_jobs'])
            ->and($config->get('type_mappings.custom_casts'))->toBe(['point' => 'App\\Casts\\PointCast']);
    }

    #[Test]
    public function it_provides_default_values(): void
    {
        // Act
        $config = ModelGeneratorConfig::fromEnvironment();

        // Assert
        expect($config->debug)->toBeFalse()
            ->and($config->environment)->toBe('production')
            ->and($config->databaseDriver)->toBe('sqlite')
            ->and($config->databasePath)->toBe('database/database.sqlite')
            ->and($config->cacheDriver)->toBe('file')
            ->and($config->queueConnection)->toBe('sync')
            ->and($config->get('namespace'))->toBe('App\\Models')
            ->and($config->get('generate_phpdoc'))->toBeTrue()
            ->and($config->get('generate_type_hints'))->toBeTrue();
    }

    #[Test]
    public function it_validates_boolean_values(): void
    {
        // Arrange
        $_ENV['EMG_DEBUG'] = 'invalid';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Invalid boolean value');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_json_values(): void
    {
        // Arrange
        $_ENV['EMG_CUSTOM_CASTS'] = 'invalid json';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Invalid JSON format');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_array_values(): void
    {
        // Arrange
        $_ENV['EMG_MODEL_TRAITS'] = 'invalid,array,with,spaces in it';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Invalid array value');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_namespace_format(): void
    {
        // Arrange
        $_ENV['EMG_MODEL_NAMESPACE'] = 'Invalid Namespace';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Invalid namespace format');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_path_format(): void
    {
        // Arrange
        $_ENV['EMG_MODEL_PATH'] = '../invalid/path';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Invalid path format');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_environment_value(): void
    {
        // Arrange
        $_ENV['EMG_ENVIRONMENT'] = 'invalid';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Invalid environment');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_database_driver(): void
    {
        // Arrange
        $_ENV['EMG_DATABASE_DRIVER'] = 'mysql';

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Only SQLite database driver is supported');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_handles_empty_optional_values(): void
    {
        // Arrange
        $_ENV['EMG_MODEL_TRAITS'] = '';
        $_ENV['EMG_IGNORE_TABLES'] = '';
        $_ENV['EMG_CUSTOM_CASTS'] = '';

        // Act
        $config = ModelGeneratorConfig::fromEnvironment();

        // Assert
        expect($config->get('traits'))->toBeArray()->toBeEmpty()
            ->and($config->get('schema.exclude_tables'))->toBeArray()->toBeEmpty()
            ->and($config->get('type_mappings.custom_casts'))->toBeArray()->toBeEmpty();
    }

    #[Test]
    public function it_handles_type_casting(): void
    {
        // Arrange
        $_ENV['EMG_DEBUG'] = '1';
        $_ENV['EMG_CHUNK_SIZE'] = '100';
        $_ENV['EMG_ANALYZE_INDEXES'] = 'true';

        // Act
        $config = ModelGeneratorConfig::fromEnvironment();

        // Assert
        expect($config->debug)->toBeTrue()
            ->and($config->get('schema.chunk_size'))->toBe(100)
            ->and($config->get('schema.analyze_indexes'))->toBeTrue();
    }

    #[Test]
    public function it_validates_required_options(): void
    {
        // Arrange
        $_ENV['EMG_DATABASE_DRIVER'] = 'sqlite';
        unset($_ENV['EMG_DATABASE_PATH']);

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Missing required option: database_path');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }

    #[Test]
    public function it_validates_option_dependencies(): void
    {
        // Arrange
        $_ENV['EMG_GENERATE_DIAGRAMS'] = 'true';
        unset($_ENV['EMG_DOCS_PATH']);

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Documentation path is required when diagrams are enabled');

        // Act
        ModelGeneratorConfig::fromEnvironment();
    }
}
