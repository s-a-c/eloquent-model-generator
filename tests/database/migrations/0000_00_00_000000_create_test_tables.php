<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Basic table with standard columns
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // Table with various column types
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(false);
            $table->integer('view_count')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // Table for testing polymorphic relationships
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->morphs('commentable');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
        });

        // Pivot table for many-to-many relationship
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['post_id', 'tag_id']);
        });

        // Table with custom primary key
        Schema::create('tags', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('name');
            $table->timestamps();
        });

        // Table with composite primary key
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->json('permissions')->nullable();
            $table->timestamps();

            $table->primary(['role_id', 'user_id']);
        });

        // Table with enum and check constraints
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('plan_type');
            $table->decimal('amount', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->check('amount > 0');
            $table->check('end_date > start_date');
        });

        // Table for testing soft deletes and timestamps
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->nestedSet();
            $table->timestamps();
            $table->softDeletes();
        });

        // Table for testing polymorphic many-to-many
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->string('tag_slug');
            $table->morphs('taggable');
            $table->timestamps();

            $table->foreign('tag_slug')
                ->references('slug')
                ->on('tags')
                ->onDelete('cascade');

            $table->unique(['tag_slug', 'taggable_type', 'taggable_id']);
        });

        // Table for testing custom column types and defaults
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('group')->index();
            $table->json('value');
            $table->string('type')->default('string');
            $table->boolean('is_system')->default(false);
            $table->json('validation_rules')->nullable();
            $table->timestamps();

            $table->unique(['group', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('taggables');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('users');
    }
};
