<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Policies;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\PolicyGenerator as PolicyGeneratorContract;
use SAC\EloquentModelGenerator\Exceptions\PolicyGeneratorException;

/**
 * Policy Generator
 *
 * Generates model policies with CRUD methods and custom rules.
 */
class PolicyGenerator implements PolicyGeneratorContract {
    /**
     * Generate a policy class for a model.
     *
     * @param string $modelClass The fully qualified model class name
     * @param array<string> $abilities The policy abilities to generate
     * @param array<string, array<string>> $rules Custom authorization rules
     * @return string The policy class definition
     * @throws PolicyGeneratorException
     */
    public function generate(string $modelClass, array $abilities = [], array $rules = []): string {
        try {
            $namespace = $this->getPolicyNamespace($modelClass);
            $className = $this->getPolicyClassName($modelClass);
            $modelName = class_basename($modelClass);

            return $this->buildPolicyClass(
                namespace: $namespace,
                className: $className,
                modelClass: $modelClass,
                modelName: $modelName,
                abilities: $abilities ?: $this->getDefaultAbilities(),
                rules: $rules
            );
        } catch (\Exception $e) {
            throw PolicyGeneratorException::generationFailed($modelClass, $e->getMessage());
        }
    }

    /**
     * Build the policy class content.
     *
     * @param string $namespace The policy namespace
     * @param string $className The policy class name
     * @param string $modelClass The model class
     * @param string $modelName The model name
     * @param array<string> $abilities The policy abilities
     * @param array<string, array<string>> $rules Custom authorization rules
     * @return string The policy class content
     */
    private function buildPolicyClass(
        string $namespace,
        string $className,
        string $modelClass,
        string $modelName,
        array $abilities,
        array $rules
    ): string {
        $methods = array_merge(
            $this->buildAbilityMethods($modelName, $abilities),
            $this->buildCustomRuleMethods($modelName, $rules)
        );

        return <<<PHP
        <?php

        declare(strict_types=1);

        namespace {$namespace};

        use {$modelClass};
        use Illuminate\\Auth\\Access\\HandlesAuthorization;
        use App\\Models\\User;

        class {$className}
        {
            use HandlesAuthorization;

            {$methods}
        }
        PHP;
    }

    /**
     * Build ability methods for the policy.
     *
     * @param string $modelName The model name
     * @param array<string> $abilities The abilities to generate
     * @return string The ability methods
     */
    private function buildAbilityMethods(string $modelName, array $abilities): string {
        $methods = [];

        foreach ($abilities as $ability) {
            $methods[] = $this->buildAbilityMethod($modelName, $ability);
        }

        return implode("\n\n    ", $methods);
    }

    /**
     * Build a single ability method.
     *
     * @param string $modelName The model name
     * @param string $ability The ability name
     * @return string The method definition
     */
    private function buildAbilityMethod(string $modelName, string $ability): string {
        $modelParam = lcfirst($modelName);
        $docBlock = $this->getAbilityDocBlock($ability, $modelName);
        $conditions = $this->getAbilityConditions($ability);

        return <<<PHP
        {$docBlock}
        public function {$ability}(User \$user, {$modelName} \${$modelParam}): bool
        {
            {$conditions}
        }
        PHP;
    }

    /**
     * Build custom rule methods.
     *
     * @param string $modelName The model name
     * @param array<string, array<string>> $rules The custom rules
     * @return string The custom rule methods
     */
    private function buildCustomRuleMethods(string $modelName, array $rules): string {
        $methods = [];

        foreach ($rules as $name => $conditions) {
            $methods[] = $this->buildCustomRuleMethod($modelName, $name, $conditions);
        }

        return $methods ? "\n\n    " . implode("\n\n    ", $methods) : '';
    }

    /**
     * Build a custom rule method.
     *
     * @param string $modelName The model name
     * @param string $name The rule name
     * @param array<string> $conditions The rule conditions
     * @return string The method definition
     */
    private function buildCustomRuleMethod(string $modelName, string $name, array $conditions): string {
        $modelParam = lcfirst($modelName);
        $methodName = Str::camel($name);
        $conditionsString = implode(" && ", array_map(fn($c) => "({$c})", $conditions));

        return <<<PHP
        /**
         * Determine if the user can {$name} the {$modelName}.
         *
         * @param User \$user
         * @param {$modelName} \${$modelParam}
         * @return bool
         */
        public function {$methodName}(User \$user, {$modelName} \${$modelParam}): bool
        {
            return {$conditionsString};
        }
        PHP;
    }

    /**
     * Get the policy namespace from model class.
     *
     * @param string $modelClass The model class
     * @return string The policy namespace
     */
    private function getPolicyNamespace(string $modelClass): string {
        $parts = explode('\\', $modelClass);
        array_pop($parts); // Remove model name
        return implode('\\', array_slice($parts, 0, -1)) . '\\Policies';
    }

    /**
     * Get the policy class name from model class.
     *
     * @param string $modelClass The model class
     * @return string The policy class name
     */
    private function getPolicyClassName(string $modelClass): string {
        return class_basename($modelClass) . 'Policy';
    }

    /**
     * Get default CRUD abilities.
     *
     * @return array<string>
     */
    private function getDefaultAbilities(): array {
        return ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
    }

    /**
     * Get the doc block for an ability.
     *
     * @param string $ability The ability name
     * @param string $modelName The model name
     * @return string The doc block
     */
    private function getAbilityDocBlock(string $ability, string $modelName): string {
        $description = match ($ability) {
            'viewAny' => "Determine if the user can view any {$modelName}s.",
            'view' => "Determine if the user can view the {$modelName}.",
            'create' => "Determine if the user can create {$modelName}s.",
            'update' => "Determine if the user can update the {$modelName}.",
            'delete' => "Determine if the user can delete the {$modelName}.",
            'restore' => "Determine if the user can restore the {$modelName}.",
            'forceDelete' => "Determine if the user can permanently delete the {$modelName}.",
            default => "Determine if the user can {$ability} the {$modelName}.",
        };

        return <<<PHP
        /**
         * {$description}
         *
         * @param User \$user
         * @param {$modelName} \${$modelName}
         * @return bool
         */
        PHP;
    }

    /**
     * Get the conditions for an ability.
     *
     * @param string $ability The ability name
     * @return string The conditions
     */
    private function getAbilityConditions(string $ability): string {
        return match ($ability) {
            'viewAny' => 'return true;',
            'view' => 'return true;',
            'create' => 'return $user->can(\'create\');',
            'update' => 'return $user->can(\'update\');',
            'delete' => 'return $user->can(\'delete\');',
            'restore' => 'return $user->can(\'restore\');',
            'forceDelete' => 'return $user->can(\'forceDelete\');',
            default => 'return false;',
        };
    }
}