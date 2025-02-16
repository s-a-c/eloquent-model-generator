<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Config;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Config\Configuration;
use SAC\EloquentModelGenerator\Exceptions\ConfigurationException;

class ConfigurationErrorTest extends TestCase {
    private Configuration $config;

    protected function setUp(): void {
        parent::setUp();
        $this->config = new Configuration();
    }

    public function testLoadConfigThrowsExceptionForNonExistentFile(): void {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Configuration file not found');

        $this->config->load('non-existent-config.php');
    }

    public function testLoadConfigThrowsExceptionForInvalidFormat(): void {
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

    public function testValidateThrowsExceptionForInvalidNamespace(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'namespace' => '123Invalid\\Namespace',
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Invalid namespace format');

        $this->config->load($configPath);
        $this->config->validate();

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testValidateThrowsExceptionForAbsolutePath(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'path' => '/absolute/path/models',
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Path must be relative');

        $this->config->load($configPath);
        $this->config->validate();

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testValidateThrowsExceptionForNonExistentBaseClass(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'base_class' => 'NonExistent\\BaseModel',
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Base class does not exist');

        $this->config->load($configPath);
        $this->config->validate();

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testValidateThrowsExceptionForInvalidTypes(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'with_soft_deletes' => 'yes',
                'with_timestamps' => 1,
                'with_validation' => 'true',
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

    public function testValidateThrowsExceptionForEmptyValues(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'namespace' => '',
                'path' => '',
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Configuration key cannot be empty');

        $this->config->load($configPath);
        $this->config->validate();

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testValidateThrowsExceptionForInvalidArrayValues(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = <<<'PHP'
            <?php
            return [
                'custom_casts' => ['invalid', 123, false],
            ];
            PHP;

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('Invalid array configuration value');

        $this->config->load($configPath);
        $this->config->validate();

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }
}