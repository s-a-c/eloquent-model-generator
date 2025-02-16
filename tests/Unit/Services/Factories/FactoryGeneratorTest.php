<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Factories;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Factories\FactoryGenerator;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\Exceptions\FactoryGeneratorException;

/**
 * Factory Generator Test
 *
 * Tests the factory generator functionality for model factories.
 */
class FactoryGeneratorTest extends TestCase {
    private FactoryGenerator $generator;

    protected function setUp(): void {
        parent::setUp();
        $this->generator = new FactoryGenerator();
    }

    /**
     * @test
     */
    public function testGeneratesBasicFactory(): void {
        $columns = [
            new Column('name', 'string'),
            new Column('email', 'string'),
            new Column('age', 'integer'),
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString('namespace Database\\Factories;', $factory);
        $this->assertStringContainsString('class UserFactory extends Factory', $factory);
        $this->assertStringContainsString('protected $model = User::class;', $factory);
        $this->assertStringContainsString('public function definition(): array', $factory);
        $this->assertStringContainsString('\'name\' => $this->faker->name', $factory);
        $this->assertStringContainsString('\'email\' => $this->faker->unique()->safeEmail', $factory);
        $this->assertStringContainsString('\'age\' => $this->faker->numberBetween', $factory);
    }

    /**
     * @test
     */
    public function testGeneratesFactoryWithStates(): void {
        $columns = [
            new Column('name', 'string'),
            new Column('is_active', 'boolean', default: true),
            new Column('status', 'string', default: 'pending'),
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString('public function active(): static', $factory);
        $this->assertStringContainsString('public function inactive(): static', $factory);
        $this->assertStringContainsString('public function withDefaultStatus(): static', $factory);
    }

    /**
     * @test
     */
    public function testGeneratesFactoryWithRelationships(): void {
        $columns = [
            new Column('name', 'string'),
        ];

        $relationships = [
            'hasMany' => ['posts', 'comments'],
            'belongsTo' => ['team'],
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns, $relationships);

        $this->assertStringContainsString('public function withPosts(): static', $factory);
        $this->assertStringContainsString('public function withComments(): static', $factory);
        $this->assertStringContainsString('public function withTeam(): static', $factory);
    }

    /**
     * @test
     */
    public function testHandlesSpecialColumnTypes(): void {
        $columns = [
            new Column('password', 'string'),
            new Column('settings', 'json'),
            new Column('created_at', 'datetime'),
            new Column('data', 'text'),
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString('\'password\' => bcrypt($this->faker->password)', $factory);
        $this->assertStringContainsString('\'settings\' => []', $factory);
        $this->assertStringContainsString('\'created_at\' => $this->faker->dateTime', $factory);
        $this->assertStringContainsString('\'data\' => $this->faker->paragraph', $factory);
    }

    /**
     * @test
     */
    public function testExcludesTimestampColumns(): void {
        $columns = [
            new Column('name', 'string'),
            new Column('created_at', 'datetime'),
            new Column('updated_at', 'datetime'),
            new Column('deleted_at', 'datetime'),
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString('\'name\' =>', $factory);
        $this->assertStringNotContainsString('\'created_at\' =>', $factory);
        $this->assertStringNotContainsString('\'updated_at\' =>', $factory);
        $this->assertStringNotContainsString('\'deleted_at\' =>', $factory);
    }

    /**
     * @test
     */
    public function testGeneratesFactoryWithCustomStates(): void {
        $columns = [
            new Column('role', 'string', default: 'user'),
            new Column('points', 'integer', default: 0),
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString('public function withDefaultRole(): static', $factory);
        $this->assertStringContainsString('public function withDefaultPoints(): static', $factory);
        $this->assertStringContainsString('\'role\' => \'user\'', $factory);
        $this->assertStringContainsString('\'points\' => 0', $factory);
    }

    /**
     * @test
     */
    public function testHandlesInvalidModelClass(): void {
        $this->expectException(FactoryGeneratorException::class);
        $this->expectExceptionMessage('Invalid model class: InvalidModel');

        $this->generator->generate('InvalidModel', []);
    }

    /**
     * @test
     */
    public function testHandlesInvalidColumnType(): void {
        $columns = [
            new Column('test', 'invalid_type'),
        ];

        $this->expectException(FactoryGeneratorException::class);
        $this->expectExceptionMessage('Invalid column type invalid_type');

        $this->generator->generate('App\\Models\\Test', $columns);
    }

    /**
     * @test
     */
    public function testGeneratesCompleteFactory(): void {
        $columns = [
            new Column('name', 'string'),
            new Column('email', 'string'),
            new Column('age', 'integer'),
            new Column('is_active', 'boolean', default: true),
            new Column('role', 'string', default: 'user'),
            new Column('settings', 'json'),
        ];

        $relationships = [
            'hasMany' => ['posts'],
            'belongsTo' => ['team'],
        ];

        $factory = $this->generator->generate('App\\Models\\User', $columns, $relationships);

        // Check namespace and class definition
        $this->assertStringContainsString('namespace Database\\Factories;', $factory);
        $this->assertStringContainsString('class UserFactory extends Factory', $factory);

        // Check model property
        $this->assertStringContainsString('protected $model = User::class;', $factory);

        // Check definition method
        $this->assertStringContainsString('public function definition(): array', $factory);
        $this->assertStringContainsString('\'name\' => $this->faker->name', $factory);
        $this->assertStringContainsString('\'email\' => $this->faker->unique()->safeEmail', $factory);
        $this->assertStringContainsString('\'age\' => $this->faker->numberBetween', $factory);
        $this->assertStringContainsString('\'settings\' => []', $factory);

        // Check state methods
        $this->assertStringContainsString('public function active(): static', $factory);
        $this->assertStringContainsString('public function inactive(): static', $factory);
        $this->assertStringContainsString('public function withDefaultRole(): static', $factory);

        // Check relationship methods
        $this->assertStringContainsString('public function withPosts(): static', $factory);
        $this->assertStringContainsString('public function withTeam(): static', $factory);
    }
}