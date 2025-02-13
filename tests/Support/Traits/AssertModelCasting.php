<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\AsEncryptedArrayObject;
use Illuminate\Database\Eloquent\Casts\AsEncryptedCollection;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use InvalidArgumentException;

trait AssertModelCasting {
    /**
     * Assert that a model has the expected cast type for an attribute.
     *
     * @param Model|string $model Model instance or class name
     * @param string $attribute The attribute to check
     * @param string $expectedCastType The expected cast type
     * @param string|null $message Custom assertion message
     * @throws InvalidArgumentException
     */
    protected function assertHasCast(Model|string $model, string $attribute, string $expectedCastType, ?string $message = null): void {
        $casts = $this->getModelCasts($model);

        $message = $message ?? "Failed asserting that '{$attribute}' is cast as '{$expectedCastType}'";

        expect($casts)->toHaveKey($attribute);
        expect($casts[$attribute])->toBe($expectedCastType);
    }

    /**
     * Assert that a model has multiple casts.
     *
     * @param Model|string $model Model instance or class name
     * @param array<string, string> $expectedCasts Array of attribute => cast type pairs
     * @throws InvalidArgumentException
     */
    protected function assertHasCasts(Model|string $model, array $expectedCasts): void {
        $casts = $this->getModelCasts($model);

        foreach ($expectedCasts as $attribute => $expectedCastType) {
            $this->assertHasCast($model, $attribute, $expectedCastType);
        }
    }

    /**
     * Assert that a model has a date/datetime cast.
     *
     * @param Model|string $model Model instance or class name
     * @param string $attribute The attribute to check
     * @param string|null $format Optional specific datetime format
     */
    protected function assertHasDateCast(Model|string $model, string $attribute, ?string $format = null): void {
        $casts = $this->getModelCasts($model);

        expect($casts)->toHaveKey($attribute);

        $castType = $casts[$attribute];
        $validDateCasts = ['date', 'datetime', 'timestamp', 'immutable_date', 'immutable_datetime'];

        if ($format) {
            expect($castType)->toBe($format);
        } else {
            expect($castType)->toBeIn($validDateCasts);
        }
    }

    /**
     * Assert that a model has a JSON cast.
     *
     * @param Model|string $model Model instance or class name
     * @param string $attribute The attribute to check
     * @param string|null $expectedClass Optional specific class for object casting
     */
    protected function assertHasJsonCast(Model|string $model, string $attribute, ?string $expectedClass = null): void {
        $casts = $this->getModelCasts($model);

        expect($casts)->toHaveKey($attribute);

        $castType = $casts[$attribute];
        $validJsonCasts = ['array', 'json', 'object', 'collection'];

        if ($expectedClass) {
            expect($castType)->toBe($expectedClass);
        } else {
            expect($castType)->toBeIn($validJsonCasts);
        }
    }

    /**
     * Assert that a model has an encrypted cast.
     *
     * @param Model|string $model Model instance or class name
     * @param string $attribute The attribute to check
     * @param string|null $expectedClass Optional specific class for encrypted casting
     */
    protected function assertHasEncryptedCast(Model|string $model, string $attribute, ?string $expectedClass = null): void {
        $casts = $this->getModelCasts($model);

        expect($casts)->toHaveKey($attribute);

        $castType = $casts[$attribute];
        $validEncryptedCasts = [
            'encrypted',
            'encrypted:array',
            'encrypted:collection',
            'encrypted:object',
            AsEncryptedArrayObject::class,
            AsEncryptedCollection::class
        ];

        if ($expectedClass) {
            expect($castType)->toBe($expectedClass);
        } else {
            expect($castType)->toBeIn($validEncryptedCasts);
        }
    }

    /**
     * Assert that a model has specific custom cast class.
     *
     * @param Model|string $model Model instance or class name
     * @param string $attribute The attribute to check
     * @param string $expectedClass The expected cast class
     */
    protected function assertHasCustomCast(Model|string $model, string $attribute, string $expectedClass): void {
        $casts = $this->getModelCasts($model);

        expect($casts)->toHaveKey($attribute);
        expect($casts[$attribute])->toBe($expectedClass);
    }

    /**
     * Get the casts array from a model.
     *
     * @param mixed $model Model instance or class name
     * @return array<string, string>
     * @throws InvalidArgumentException
     */
    protected function getModelCasts($model): array {
        if (!($model instanceof Model) && !is_string($model)) {
            throw new InvalidArgumentException('Invalid model provided');
        }

        if (is_string($model)) {
            if (!class_exists($model)) {
                throw new InvalidArgumentException("Model class {$model} does not exist");
            }

            $model = new $model;

            if (!$model instanceof Model) {
                throw new InvalidArgumentException('Invalid model provided');
            }
        }

        return $model->getCasts();
    }
}
