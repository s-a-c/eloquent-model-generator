<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait AssertModelValidation
{
    /**
     * Assert that the model has the expected validation rules.
     *
     * @param  object  $model  The model instance to test
     * @param  array<string, string|array>  $expectedRules  Expected validation rules
     */
    public function assertModelHasValidationRules(object $model, array $expectedRules): void
    {
        expect($model)->toHaveProperty('validationRules');
        expect($model->getValidationRules())->toBe($expectedRules);
    }

    /**
     * Assert that the model validation passes with given data.
     *
     * @param  object  $model  The model instance to test
     * @param  array<string, mixed>  $data  Data to validate
     */
    public function assertValidationPasses(object $model, array $data): void
    {
        try {
            $validator = Validator::make($data, $model->getValidationRules());
            expect($validator->passes())->toBeTrue();
        } catch (ValidationException $e) {
            $this->fail('Validation failed unexpectedly: '.json_encode($e->errors()));
        }
    }

    /**
     * Assert that the model validation fails with given data.
     *
     * @param  object  $model  The model instance to test
     * @param  array<string, mixed>  $data  Data to validate
     * @param  array<string>  $expectedErrors  Expected validation error messages
     */
    public function assertValidationFails(object $model, array $data, array $expectedErrors = []): void
    {
        $validator = Validator::make(
            $data,
            $model->getValidationRules(),
            $model->getValidationMessages()
        );
        expect($validator->fails())->toBeTrue();

        if (! empty($expectedErrors)) {
            $errors = $validator->errors()->all();
            foreach ($expectedErrors as $expectedError) {
                expect($errors)->toContain($expectedError);
            }
        }
    }

    /**
     * Assert that the model has specific validation rule for an attribute.
     *
     * @param  object  $model  The model instance to test
     * @param  string  $attribute  The attribute name
     * @param  string  $rule  The expected validation rule
     */
    public function assertHasValidationRule(object $model, string $attribute, string $rule): void
    {
        $rules = $model->getValidationRules();
        expect($rules)->toHaveKey($attribute);

        $attributeRules = is_array($rules[$attribute])
            ? $rules[$attribute]
            : explode('|', $rules[$attribute]);

        expect($attributeRules)->toContain($rule);
    }

    /**
     * Assert that model validation messages are correct.
     *
     * @param  object  $model  The model instance to test
     * @param  array<string, string>  $expectedMessages  Expected validation messages
     */
    public function assertValidationMessages(object $model, array $expectedMessages): void
    {
        expect($model)->toHaveProperty('validationMessages');
        expect($model->getValidationMessages())->toBe($expectedMessages);
    }

    /**
     * Assert that a specific validation rule is properly enforced.
     *
     * @param  object  $model  The model instance to test
     * @param  string  $attribute  The attribute name
     * @param  mixed  $validValue  A value that should pass validation
     * @param  mixed  $invalidValue  A value that should fail validation
     * @param  string|null  $expectedError  Expected error message for invalid value
     */
    public function assertValidationRuleEnforced(
        object $model,
        string $attribute,
        mixed $validValue,
        mixed $invalidValue,
        ?string $expectedError = null
    ): void {
        // Test valid value
        $this->assertValidationPasses($model, [$attribute => $validValue]);

        // Test invalid value
        $this->assertValidationFails(
            $model,
            [$attribute => $invalidValue],
            $expectedError ? [$expectedError] : []
        );
    }
}
