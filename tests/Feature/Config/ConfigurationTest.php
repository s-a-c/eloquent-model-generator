<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Config;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Config\Configuration;
use SAC\EloquentModelGenerator\Exceptions\ConfigurationException;

class ConfigurationTest extends TestCase {
    private Configuration $config;

    protected function setUp(): void {
        parent::setUp();
        $this->config = new Configuration();
    }

    public function testLoadConfigFromFile(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'namespace' => 'App\\Domain\\Models',
                'path' => 'app/Domain/Models',
                'base_class' => 'App\\Domain\\Models\\BaseModel',
                'with_soft_deletes' => true,
                'with_timestamps' => true,
                'with_validation' => true,
                'with_relationships' => true,
                'with_fillable' => true,
                'with_casts' => true,
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->config->load($configPath);

        $this->assertEquals('App\\Domain\\Models', $this->config->getNamespace());
        $this->assertEquals('app/Domain/Models', $this->config->getPath());
        $this->assertEquals('App\\Domain\\Models\\BaseModel', $this->config->getBaseClass());
        $this->assertTrue($this->config->withSoftDeletes());
        $this->assertTrue($this->config->withTimestamps());
        $this->assertTrue($this->config->withValidation());
        $this->assertTrue($this->config->withRelationships());
        $this->assertTrue($this->config->withFillable());
        $this->assertTrue($this->config->withCasts());

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testLoadConfigWithEnvironmentOverrides(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'namespace' => env('MODEL_NAMESPACE', 'App\\Models'),
                'path' => env('MODEL_PATH', 'app/Models'),
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        putenv('MODEL_NAMESPACE=App\\Custom\\Models');
        putenv('MODEL_PATH=app/Custom/Models');

        $this->config->load($configPath);

        $this->assertEquals('App\\Custom\\Models', $this->config->getNamespace());
        $this->assertEquals('app/Custom/Models', $this->config->getPath());

        // Clean up
        putenv('MODEL_NAMESPACE');
        putenv('MODEL_PATH');
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testLoadConfigWithInvalidFile(): void {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Configuration file not found');

        $this->config->load('non-existent-config.php');
    }

    public function testLoadConfigWithInvalidFormat(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = '<?php return "invalid";';

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Configuration must be an array');

        $this->config->load($configPath);

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testLoadConfigWithInvalidValues(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'namespace' => 123, // Should be string
                'with_soft_deletes' => 'yes', // Should be boolean
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Invalid configuration values');

        $this->config->load($configPath);

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testMergeConfigs(): void {
        $baseConfig = [
            'namespace' => 'App\\Models',
            'path' => 'app/Models',
            'with_soft_deletes' => false,
        ];

        $overrideConfig = [
            'namespace' => 'App\\Custom\\Models',
            'with_timestamps' => true,
        ];

        $this->config->merge($baseConfig);
        $this->config->merge($overrideConfig);

        $this->assertEquals('App\\Custom\\Models', $this->config->getNamespace());
        $this->assertEquals('app/Models', $this->config->getPath());
        $this->assertFalse($this->config->withSoftDeletes());
        $this->assertTrue($this->config->withTimestamps());
    }

    public function testValidateConfig(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'namespace' => 'App\\Models',
                'path' => '/invalid/absolute/path',
                'base_class' => 'NonExistentClass',
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Invalid configuration: Path must be relative');

        $this->config->load($configPath);
        $this->config->validate();

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testGetDefaultConfig(): void {
        $defaults = $this->config->getDefaults();

        $this->assertIsArray($defaults);
        $this->assertEquals('App\\Models', $defaults['namespace']);
        $this->assertEquals('app/Models', $defaults['path']);
        $this->assertEquals('Illuminate\\Database\\Eloquent\\Model', $defaults['base_class']);
        $this->assertFalse($defaults['with_soft_deletes']);
        $this->assertTrue($defaults['with_timestamps']);
        $this->assertTrue($defaults['with_fillable']);
        $this->assertTrue($defaults['with_casts']);
    }
}