<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
}
