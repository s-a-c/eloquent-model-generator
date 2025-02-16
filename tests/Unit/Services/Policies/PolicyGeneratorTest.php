<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Policies;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Policies\PolicyGenerator;
use SAC\EloquentModelGenerator\Exceptions\PolicyGeneratorException;

/**
 * Policy Generator Test
 *
 * Tests the policy generator functionality for model policies.
 */
class PolicyGeneratorTest extends TestCase {
    private PolicyGenerator $generator;

    protected function setUp(): void {
        parent::setUp();
        $this->generator = new PolicyGenerator();
    }

    /**
     * @test
     */
    public function testGeneratesBasicPolicy(): void {
        $policy = $this->generator->generate('App\\Models\\User');

        $this->assertStringContainsString('namespace App\\Policies;', $policy);
        $this->assertStringContainsString('class UserPolicy', $policy);
        $this->assertStringContainsString('use HandlesAuthorization;', $policy);
        $this->assertStringContainsString('public function viewAny(User $user)', $policy);
        $this->assertStringContainsString('public function view(User $user, User $model)', $policy);
    }

    /**
     * @test
     */
    public function testGeneratesPolicyWithCustomAbilities(): void {
        $abilities = ['publish', 'archive', 'feature'];

        $policy = $this->generator->generate('App\\Models\\Post', $abilities);

        $this->assertStringContainsString('public function publish(User $user, Post $post)', $policy);
        $this->assertStringContainsString('public function archive(User $user, Post $post)', $policy);
        $this->assertStringContainsString('public function feature(User $user, Post $post)', $policy);
    }

    /**
     * @test
     */
    public function testGeneratesPolicyWithCustomRules(): void {
        $rules = [
            'adminOnly' => ['$user->isAdmin()'],
            'ownerOnly' => ['$user->id === $post->user_id'],
        ];

        $policy = $this->generator->generate('App\\Models\\Post', [], $rules);

        $this->assertStringContainsString('public function adminOnly(User $user, Post $post)', $policy);
        $this->assertStringContainsString('return $user->isAdmin();', $policy);
        $this->assertStringContainsString('public function ownerOnly(User $user, Post $post)', $policy);
        $this->assertStringContainsString('return $user->id === $post->user_id;', $policy);
    }

    /**
     * @test
     */
    public function testGeneratesDefaultCrudAbilities(): void {
        $policy = $this->generator->generate('App\\Models\\Post');

        $this->assertStringContainsString('public function viewAny(', $policy);
        $this->assertStringContainsString('public function view(', $policy);
        $this->assertStringContainsString('public function create(', $policy);
        $this->assertStringContainsString('public function update(', $policy);
        $this->assertStringContainsString('public function delete(', $policy);
        $this->assertStringContainsString('public function restore(', $policy);
        $this->assertStringContainsString('public function forceDelete(', $policy);
    }

    /**
     * @test
     */
    public function testGeneratesDocBlocks(): void {
        $policy = $this->generator->generate('App\\Models\\Post');

        $this->assertStringContainsString('* Determine if the user can view any Posts.', $policy);
        $this->assertStringContainsString('* Determine if the user can view the Post.', $policy);
        $this->assertStringContainsString('* @param User $user', $policy);
        $this->assertStringContainsString('* @param Post $post', $policy);
        $this->assertStringContainsString('* @return bool', $policy);
    }

    /**
     * @test
     */
    public function testHandlesInvalidModelClass(): void {
        $this->expectException(PolicyGeneratorException::class);
        $this->expectExceptionMessage('Invalid model class: InvalidModel');

        $this->generator->generate('InvalidModel');
    }

    /**
     * @test
     */
    public function testHandlesInvalidAbility(): void {
        $this->expectException(PolicyGeneratorException::class);
        $this->expectExceptionMessage('Invalid ability invalid-ability');

        $this->generator->generate('App\\Models\\Post', ['invalid-ability']);
    }

    /**
     * @test
     */
    public function testHandlesDuplicateAbilities(): void {
        $this->expectException(PolicyGeneratorException::class);
        $this->expectExceptionMessage('Duplicate ability view');

        $this->generator->generate('App\\Models\\Post', ['view', 'view']);
    }

    /**
     * @test
     */
    public function testGeneratesCompletePolicy(): void {
        $abilities = ['publish', 'archive'];
        $rules = [
            'adminOnly' => ['$user->isAdmin()'],
            'ownerOnly' => ['$user->id === $post->user_id'],
        ];

        $policy = $this->generator->generate('App\\Models\\Post', $abilities, $rules);

        // Check namespace and class definition
        $this->assertStringContainsString('namespace App\\Policies;', $policy);
        $this->assertStringContainsString('class PostPolicy', $policy);
        $this->assertStringContainsString('use App\\Models\\Post;', $policy);

        // Check trait usage
        $this->assertStringContainsString('use HandlesAuthorization;', $policy);

        // Check default CRUD methods
        $this->assertStringContainsString('public function viewAny(', $policy);
        $this->assertStringContainsString('public function view(', $policy);
        $this->assertStringContainsString('public function create(', $policy);
        $this->assertStringContainsString('public function update(', $policy);
        $this->assertStringContainsString('public function delete(', $policy);

        // Check custom abilities
        $this->assertStringContainsString('public function publish(', $policy);
        $this->assertStringContainsString('public function archive(', $policy);

        // Check custom rules
        $this->assertStringContainsString('public function adminOnly(', $policy);
        $this->assertStringContainsString('return $user->isAdmin();', $policy);
        $this->assertStringContainsString('public function ownerOnly(', $policy);
        $this->assertStringContainsString('return $user->id === $post->user_id;', $policy);

        // Check doc blocks
        $this->assertStringContainsString('* Determine if the user can publish the Post.', $policy);
        $this->assertStringContainsString('* @param User $user', $policy);
        $this->assertStringContainsString('* @param Post $post', $policy);
        $this->assertStringContainsString('* @return bool', $policy);
    }
}