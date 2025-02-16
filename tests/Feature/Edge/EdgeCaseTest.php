<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Edge;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;

class EdgeCaseTest extends TestCase {
    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testHandlesTableWithAllColumnTypes(): void {
        // Create a test table with all possible column types
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:generate', [
            'table' => 'all_types',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/AllType.php'));

        // Verify all column types are properly mapped
        $this->assertStringContainsString('@property int $id', $content);
        $this->assertStringContainsString('@property string $char_col', $content);
        $this->assertStringContainsString('@property string $varchar_col', $content);
        $this->assertStringContainsString('@property string $text_col', $content);
        $this->assertStringContainsString('@property float $decimal_col', $content);
        $this->assertStringContainsString('@property bool $boolean_col', $content);
        $this->assertStringContainsString('@property \Carbon\Carbon $date_col', $content);
        $this->assertStringContainsString('@property \Carbon\Carbon $datetime_col', $content);
        $this->assertStringContainsString('@property array $json_col', $content);
    }

    public function testHandlesTableWithAllRelationshipTypes(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:generate', [
            'table' => 'users',
            '--namespace' => 'App\\Models',
            '--with-relationships' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/User.php'));

        // Verify all relationship types
        $this->assertStringContainsString('public function profile()', $content);
        $this->assertStringContainsString('return $this->hasOne(', $content);
        $this->assertStringContainsString('public function posts()', $content);
        $this->assertStringContainsString('return $this->hasMany(', $content);
        $this->assertStringContainsString('public function roles()', $content);
        $this->assertStringContainsString('return $this->belongsToMany(', $content);
        $this->assertStringContainsString('public function images()', $content);
        $this->assertStringContainsString('return $this->morphMany(', $content);
    }

    public function testHandlesTableWithLongNames(): void {
        $this->artisan('model:generate', [
            'table' => 'very_long_table_name_that_exceeds_normal_length_limits_but_should_still_work',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $this->assertFileExists($this->app->basePath('app/Models/VeryLongTableNameThatExceedsNormalLengthLimitsButShouldStillWork.php'));
    }

    public function testHandlesTableWithSpecialCharacters(): void {
        $this->artisan('model:generate', [
            'table' => 'table_with_special_characters_$#@!',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $this->assertFileExists($this->app->basePath('app/Models/TableWithSpecialCharacters.php'));
    }

    public function testHandlesTableWithReservedWords(): void {
        $this->artisan('model:generate', [
            'table' => 'class',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/ClassModel.php'));
        $this->assertStringContainsString('protected $table = \'class\';', $content);
    }

    public function testHandlesTableWithCircularReferences(): void {
        $this->artisan('model:generate', [
            'table' => 'parent',
            '--namespace' => 'App\\Models',
            '--with-relationships' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/Parent.php'));
        $this->assertStringContainsString('public function children()', $content);
        $this->assertStringContainsString('public function parent()', $content);
    }

    public function testHandlesTableWithSelfReferences(): void {
        $this->artisan('model:generate', [
            'table' => 'employees',
            '--namespace' => 'App\\Models',
            '--with-relationships' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/Employee.php'));
        $this->assertStringContainsString('public function manager()', $content);
        $this->assertStringContainsString('public function subordinates()', $content);
    }

    public function testHandlesTableWithPolymorphicRelations(): void {
        $this->artisan('model:generate', [
            'table' => 'images',
            '--namespace' => 'App\\Models',
            '--with-relationships' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/Image.php'));
        $this->assertStringContainsString('public function imageable()', $content);
        $this->assertStringContainsString('return $this->morphTo();', $content);
    }

    public function testHandlesTableWithCustomPrimaryKey(): void {
        $this->artisan('model:generate', [
            'table' => 'custom_primary',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/CustomPrimary.php'));
        $this->assertStringContainsString('protected $primaryKey = \'custom_id\';', $content);
    }

    public function testHandlesTableWithCompositePrimaryKey(): void {
        $this->artisan('model:generate', [
            'table' => 'composite_primary',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/CompositePrimary.php'));
        $this->assertStringContainsString('protected $primaryKey = [\'id_1\', \'id_2\'];', $content);
    }

    public function testHandlesTableWithoutPrimaryKey(): void {
        $this->artisan('model:generate', [
            'table' => 'no_primary',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/NoPrimary.php'));
        $this->assertStringContainsString('public $incrementing = false;', $content);
    }

    public function testHandlesTableWithAllNullableColumns(): void {
        $this->artisan('model:generate', [
            'table' => 'nullable_columns',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/NullableColumn.php'));
        $this->assertStringContainsString('@property string|null $name', $content);
        $this->assertStringContainsString('@property int|null $age', $content);
    }

    public function testHandlesTableWithCustomCasts(): void {
        $this->artisan('model:generate', [
            'table' => 'custom_casts',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/CustomCast.php'));
        $this->assertStringContainsString('protected $casts = [', $content);
        $this->assertStringContainsString('\'options\' => \'array\'', $content);
        $this->assertStringContainsString('\'settings\' => \'json\'', $content);
    }

    public function testHandlesTableWithEnumColumns(): void {
        $this->artisan('model:generate', [
            'table' => 'enum_columns',
            '--namespace' => 'App\\Models',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/EnumColumn.php'));
        $this->assertStringContainsString('const STATUS_ACTIVE = \'active\';', $content);
        $this->assertStringContainsString('const STATUS_INACTIVE = \'inactive\';', $content);
    }
}