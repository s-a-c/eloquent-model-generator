<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Models;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\DB;

class RelationshipTest extends TestCase {
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
                email TEXT UNIQUE NOT NULL
            )
        ');

        DB::statement('
            CREATE TABLE posts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                title TEXT NOT NULL,
                content TEXT NOT NULL,
                FOREIGN KEY (user_id) REFERENCES users(id)
            )
        ');

        DB::statement('
            CREATE TABLE comments (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                post_id INTEGER NOT NULL,
                user_id INTEGER NOT NULL,
                content TEXT NOT NULL,
                FOREIGN KEY (post_id) REFERENCES posts(id),
                FOREIGN KEY (user_id) REFERENCES users(id)
            )
        ');

        DB::statement('
            CREATE TABLE roles (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL
            )
        ');

        DB::statement('
            CREATE TABLE role_user (
                user_id INTEGER NOT NULL,
                role_id INTEGER NOT NULL,
                PRIMARY KEY (user_id, role_id),
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (role_id) REFERENCES roles(id)
            )
        ');

        DB::statement('
            CREATE TABLE profiles (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER UNIQUE NOT NULL,
                bio TEXT,
                FOREIGN KEY (user_id) REFERENCES users(id)
            )
        ');

        DB::statement('
            CREATE TABLE images (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                imageable_id INTEGER NOT NULL,
                imageable_type TEXT NOT NULL,
                url TEXT NOT NULL
            )
        ');

        // Generate models
        $this->artisan('model:generate', ['table' => 'users']);
        $this->artisan('model:generate', ['table' => 'posts']);
        $this->artisan('model:generate', ['table' => 'comments']);
        $this->artisan('model:generate', ['table' => 'roles']);
        $this->artisan('model:generate', ['table' => 'profiles']);
        $this->artisan('model:generate', ['table' => 'images']);
    }

    public function testHasOneRelationship(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $profileModel = $this->app->make('App\\Models\\Profile');

        // Create test data
        $user = $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $profile = $profileModel::create([
            'user_id' => $user->id,
            'bio' => 'Test bio',
        ]);

        // Test relationship
        $this->assertInstanceOf($profileModel, $user->profile);
        $this->assertEquals($profile->id, $user->profile->id);
        $this->assertEquals($user->id, $profile->user->id);
    }

    public function testHasManyRelationship(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $postModel = $this->app->make('App\\Models\\Post');

        // Create test data
        $user = $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $posts = [
            ['title' => 'Post 1', 'content' => 'Content 1'],
            ['title' => 'Post 2', 'content' => 'Content 2'],
        ];

        foreach ($posts as $post) {
            $postModel::create([
                'user_id' => $user->id,
                'title' => $post['title'],
                'content' => $post['content'],
            ]);
        }

        // Test relationship
        $this->assertCount(2, $user->posts);
        $this->assertEquals('Post 1', $user->posts->first()->title);
        $this->assertEquals($user->id, $user->posts->first()->user->id);
    }

    public function testBelongsToManyRelationship(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $roleModel = $this->app->make('App\\Models\\Role');

        // Create test data
        $user = $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $roles = [
            ['name' => 'admin'],
            ['name' => 'editor'],
        ];

        $roleIds = [];
        foreach ($roles as $role) {
            $roleIds[] = $roleModel::create($role)->id;
        }

        $user->roles()->attach($roleIds);

        // Test relationship
        $this->assertCount(2, $user->roles);
        $this->assertEquals('admin', $user->roles->first()->name);
        $this->assertTrue($user->roles->contains('name', 'editor'));
    }

    public function testMorphToRelationship(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $postModel = $this->app->make('App\\Models\\Post');
        $imageModel = $this->app->make('App\\Models\\Image');

        // Create test data
        $user = $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $post = $postModel::create([
            'user_id' => $user->id,
            'title' => 'Test Post',
            'content' => 'Test Content',
        ]);

        $userImage = $imageModel::create([
            'imageable_id' => $user->id,
            'imageable_type' => get_class($user),
            'url' => 'user.jpg',
        ]);

        $postImage = $imageModel::create([
            'imageable_id' => $post->id,
            'imageable_type' => get_class($post),
            'url' => 'post.jpg',
        ]);

        // Test relationships
        $this->assertInstanceOf($userModel, $userImage->imageable);
        $this->assertInstanceOf($postModel, $postImage->imageable);
        $this->assertCount(1, $user->images);
        $this->assertCount(1, $post->images);
    }

    public function testHasManyThroughRelationship(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $postModel = $this->app->make('App\\Models\\Post');
        $commentModel = $this->app->make('App\\Models\\Comment');

        // Create test data
        $user = $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $post = $postModel::create([
            'user_id' => $user->id,
            'title' => 'Test Post',
            'content' => 'Test Content',
        ]);

        $comment = $commentModel::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'content' => 'Test Comment',
        ]);

        // Test relationship
        $this->assertCount(1, $user->comments);
        $this->assertEquals('Test Comment', $user->comments->first()->content);
    }

    public function testPolymorphicManyToManyRelationship(): void {
        $userModel = $this->app->make('App\\Models\\User');
        $postModel = $this->app->make('App\\Models\\Post');
        $tagModel = $this->app->make('App\\Models\\Tag');

        // Create test data
        $user = $userModel::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $post = $postModel::create([
            'user_id' => $user->id,
            'title' => 'Test Post',
            'content' => 'Test Content',
        ]);

        $tag = $tagModel::create(['name' => 'test']);

        DB::table('taggables')->insert([
            ['tag_id' => $tag->id, 'taggable_id' => $user->id, 'taggable_type' => get_class($user)],
            ['tag_id' => $tag->id, 'taggable_id' => $post->id, 'taggable_type' => get_class($post)],
        ]);

        // Test relationships
        $this->assertCount(1, $user->tags);
        $this->assertCount(1, $post->tags);
        $this->assertEquals('test', $user->tags->first()->name);
        $this->assertEquals('test', $post->tags->first()->name);
    }
}