<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Models;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\{DB, Validator};
use Illuminate\Validation\ValidationException;

class ValidationTest extends TestCase {
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
                name TEXT NOT NULL,
                email TEXT UNIQUE NOT NULL,
                age INTEGER CHECK (age >= 18),
                password TEXT NOT NULL,
                phone TEXT,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )
        ');

        // Generate model with validation rules
        $this->artisan('model:generate', [
            'table' => 'users',
            '--with-validation' => true,
        ]);
    }

    public function testRequiredValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'email' => 'john@example.com',
            'age' => 25,
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('name'));
        $this->assertTrue($validator->errors()->has('password'));
    }

    public function testEmailValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'password123',
            'age' => 25,
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('email'));
    }

    public function testUniqueValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        // Create first user
        $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 25,
        ]);

        // Try to create another user with same email
        $data = [
            'name' => 'Jane Doe',
            'email' => 'john@example.com',
            'password' => 'password456',
            'age' => 30,
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('email'));
    }

    public function testNumericValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 'not-a-number',
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('age'));
    }

    public function testMinValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 17,
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('age'));
    }

    public function testPasswordValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => '123', // Too short
            'age' => 25,
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('password'));
    }

    public function testOptionalValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 25,
            // phone is optional
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertTrue($validator->passes());
    }

    public function testPhoneValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 25,
            'phone' => 'invalid-phone',
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('phone'));
    }

    public function testCustomValidationRules(): void {
        $userModel = $this->app->make('App\\Models\\User');

        // Add custom validation rule
        $userModel::addRule('name', 'regex:/^[a-zA-Z\s]+$/');

        $data = [
            'name' => 'John123', // Contains numbers
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 25,
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('name'));
    }

    public function testValidationMessages(): void {
        $userModel = $this->app->make('App\\Models\\User');

        // Add custom validation message
        $userModel::setMessage('name.required', 'The name field is mandatory.');

        $data = [
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 25,
        ];

        $validator = Validator::make(
            $data,
            $userModel::rules(),
            $userModel::messages()
        );

        $this->assertFalse($validator->passes());
        $this->assertEquals(
            'The name field is mandatory.',
            $validator->errors()->first('name')
        );
    }

    public function testConditionalValidation(): void {
        $userModel = $this->app->make('App\\Models\\User');

        // Add conditional validation rule
        $userModel::addRule('phone', 'required_if:age,>=,60');

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'age' => 65,
            // Missing phone number for senior user
        ];

        $validator = Validator::make($data, $userModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('phone'));
    }

    public function testValidationWithRelationships(): void {
        // Create posts table
        DB::statement('
            CREATE TABLE posts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                title TEXT NOT NULL,
                content TEXT NOT NULL,
                FOREIGN KEY (user_id) REFERENCES users(id)
            )
        ');

        $this->artisan('model:generate', [
            'table' => 'posts',
            '--with-validation' => true,
        ]);

        $postModel = $this->app->make('App\\Models\\Post');

        $data = [
            'title' => 'Test Post',
            'content' => 'Test Content',
            'user_id' => 999, // Non-existent user
        ];

        $validator = Validator::make($data, $postModel::rules());

        $this->assertFalse($validator->passes());
        $this->assertTrue($validator->errors()->has('user_id'));
    }
}