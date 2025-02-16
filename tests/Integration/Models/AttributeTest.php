<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Models;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttributeTest extends TestCase {
    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    protected function setUp(): void {
        parent::setUp();

        // Set up test database
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        // Create test tables
        DB::statement('
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                first_name TEXT NOT NULL,
                last_name TEXT NOT NULL,
                email TEXT NOT NULL,
                settings TEXT,
                preferences TEXT,
                meta TEXT,
                status TEXT DEFAULT \'active\',
                points INTEGER DEFAULT 0,
                last_login_at TIMESTAMP,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                deleted_at TIMESTAMP
            )
        ');

        // Generate model
        $this->artisan('model:generate', [
            'table' => 'users',
            '--with-casts' => true,
            '--with-attributes' => true,
            '--with-soft-deletes' => true,
        ]);
    }

    public function testFillableAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = new $userModel();

        $this->assertTrue(in_array('first_name', $user->getFillable()));
        $this->assertTrue(in_array('last_name', $user->getFillable()));
        $this->assertTrue(in_array('email', $user->getFillable()));
        $this->assertFalse(in_array('id', $user->getFillable()));
    }

    public function testGuardedAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = new $userModel();

        $this->assertTrue(in_array('id', $user->getGuarded()));
        $this->assertTrue(in_array('created_at', $user->getGuarded()));
        $this->assertTrue(in_array('updated_at', $user->getGuarded()));
        $this->assertTrue(in_array('deleted_at', $user->getGuarded()));
    }

    public function testAttributeCasting(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'settings' => json_encode(['theme' => 'dark']),
            'preferences' => json_encode(['notifications' => true]),
            'meta' => json_encode(['visits' => 10]),
            'last_login_at' => '2025-01-01 12:00:00',
        ]);

        $this->assertIsArray($user->settings);
        $this->assertEquals('dark', $user->settings['theme']);

        $this->assertIsArray($user->preferences);
        $this->assertTrue($user->preferences['notifications']);

        $this->assertIsArray($user->meta);
        $this->assertEquals(10, $user->meta['visits']);

        $this->assertInstanceOf(Carbon::class, $user->last_login_at);
    }

    public function testAccessorMutator(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        // Test accessor
        $this->assertEquals('John Doe', $user->full_name);

        // Test mutator
        $user->email = 'JOHN@EXAMPLE.COM';
        $this->assertEquals('john@example.com', $user->email);
    }

    public function testDefaultAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertEquals('active', $user->status);
        $this->assertEquals(0, $user->points);
    }

    public function testTimestampAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertInstanceOf(Carbon::class, $user->created_at);
        $this->assertInstanceOf(Carbon::class, $user->updated_at);
    }

    public function testSoftDeleteAttribute(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $user->delete();

        $this->assertInstanceOf(Carbon::class, $user->deleted_at);
        $this->assertTrue($user->trashed());
    }

    public function testAppendedAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertArrayHasKey('full_name', $user->toArray());
        $this->assertEquals('John Doe', $user->toArray()['full_name']);
    }

    public function testHiddenAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'settings' => json_encode(['api_key' => 'secret']),
        ]);

        $array = $user->toArray();

        $this->assertArrayNotHasKey('settings', $array);
        $this->assertArrayNotHasKey('preferences', $array);
        $this->assertArrayNotHasKey('meta', $array);
    }

    public function testVisibleAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $array = $user->toArray();

        $this->assertArrayHasKey('first_name', $array);
        $this->assertArrayHasKey('last_name', $array);
        $this->assertArrayHasKey('email', $array);
    }

    public function testDateAttributes(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'last_login_at' => '2025-01-01',
        ]);

        $this->assertContains('last_login_at', $user->getDates());
        $this->assertInstanceOf(Carbon::class, $user->last_login_at);
    }

    public function testAttributeEncryption(): void {
        config(['app.key' => str_repeat('a', 32)]); // Set encryption key

        $userModel = $this->app->make('App\\Models\\User');
        $user = $userModel::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'settings' => json_encode(['secret' => 'value']),
        ]);

        // Verify the encrypted value in the database is different from the original
        $dbValue = DB::table('users')
            ->where('id', $user->id)
            ->value('settings');

        $this->assertNotEquals(json_encode(['secret' => 'value']), $dbValue);

        // But the decrypted value matches
        $this->assertEquals(['secret' => 'value'], $user->settings);
    }
}