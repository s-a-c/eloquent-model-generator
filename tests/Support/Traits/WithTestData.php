<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;
use InvalidArgumentException;

trait WithTestData {
    /**
     * The base path for test fixtures.
     */
    protected string $fixturesPath;

    /**
     * Initialize the test data trait.
     */
    protected function initializeTestData(): void {
        $this->fixturesPath = __DIR__ . '/../../Fixtures';
        $this->createFixturesDirectory();
    }

    /**
     * Create a test fixture from an array.
     *
     * @param string $name
     * @param array $data
     * @return string The fixture path
     */
    protected function createFixture(string $name, array $data): string {
        $path = $this->getFixturePath($name);
        File::put($path, json_encode($data, JSON_PRETTY_PRINT));
        return $path;
    }

    /**
     * Load a test fixture.
     *
     * @param string $name
     * @return array
     */
    protected function loadFixture(string $name): array {
        $path = $this->getFixturePath($name);
        if (!File::exists($path)) {
            throw new \RuntimeException("Fixture {$name} not found at {$path}");
        }
        return json_decode(File::get($path), true);
    }

    /**
     * Create a test schema fixture.
     *
     * @param string $name
     * @param array $columns
     * @param array $indexes
     * @param array $relations
     * @return string The fixture path
     */
    protected function createSchemaFixture(
        string $name,
        array $columns = [],
        array $indexes = [],
        array $relations = []
    ): string {
        return $this->createFixture($name, [
            'columns' => $columns,
            'indexes' => $indexes,
            'relations' => $relations
        ]);
    }

    /**
     * Create a test model fixture.
     *
     * @param string $name
     * @param string $namespace
     * @param string $tableName
     * @param array $attributes
     * @return string The fixture path
     */
    protected function createModelFixture(
        string $name,
        string $namespace,
        string $tableName,
        array $attributes = []
    ): string {
        return $this->createFixture($name, [
            'className' => $name,
            'namespace' => $namespace,
            'tableName' => $tableName,
            'attributes' => $attributes
        ]);
    }

    /**
     * Get the path for a fixture.
     *
     * @param string $name
     * @return string
     */
    protected function getFixturePath(string $name): string {
        return $this->fixturesPath . '/' . $name . '.json';
    }

    /**
     * Create the fixtures directory if it doesn't exist.
     */
    protected function createFixturesDirectory(): void {
        if (!File::exists($this->fixturesPath)) {
            File::makeDirectory($this->fixturesPath, 0777, true);
        }
    }

    /**
     * Clean up test fixtures.
     */
    protected function cleanupTestData(): void {
        if (File::exists($this->fixturesPath)) {
            File::deleteDirectory($this->fixturesPath);
        }
    }

    /**
     * Load test data from a JSON file.
     *
     * @param string $path Relative path to the JSON file from the datasets directory
     * @param string|null $key Optional key to retrieve specific data from the JSON
     * @return mixed
     * @throws \InvalidArgumentException
     */
    protected function loadJsonTestData(string $path, ?string $key = null): mixed {
        $fullPath = $this->getTestDataPath($path);

        if (!File::exists($fullPath)) {
            throw new InvalidArgumentException("Test data file not found: {$path}");
        }

        $data = json_decode(File::get($fullPath), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException("Invalid JSON in test data file: {$path}");
        }

        return $key ? Arr::get($data, $key) : $data;
    }

    /**
     * Load test data from a YAML file.
     *
     * @param string $path Relative path to the YAML file from the datasets directory
     * @param string|null $key Optional key to retrieve specific data from the YAML
     * @return mixed
     * @throws \InvalidArgumentException
     */
    protected function loadYamlTestData(string $path, ?string $key = null): mixed {
        $fullPath = $this->getTestDataPath($path);

        if (!File::exists($fullPath)) {
            throw new InvalidArgumentException("Test data file not found: {$path}");
        }

        try {
            $data = Yaml::parseFile($fullPath);
        } catch (\Exception $e) {
            throw new InvalidArgumentException("Invalid YAML in test data file: {$path}");
        }

        return $key ? Arr::get($data, $key) : $data;
    }

    /**
     * Get the full path to a test data file.
     *
     * @param string $path Relative path from the datasets directory
     * @return string
     */
    protected function getTestDataPath(string $path): string {
        return __DIR__ . '/../../datasets/' . ltrim($path, '/');
    }

    /**
     * Load test data from either JSON or YAML based on file extension.
     *
     * @param string $path Relative path to the data file from the datasets directory
     * @param string|null $key Optional key to retrieve specific data
     * @return mixed
     * @throws \InvalidArgumentException
     */
    protected function loadTestData(string $path, ?string $key = null): mixed {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return match ($extension) {
            'json' => $this->loadJsonTestData($path, $key),
            'yml', 'yaml' => $this->loadYamlTestData($path, $key),
            default => throw new InvalidArgumentException("Unsupported file extension: {$extension}")
        };
    }
}
