<?php

namespace SAC\EloquentModelGenerator\Support\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait HasModelValidation {
    /**
     * The validation rules that apply to the model.
     *
     * @var array<string, string|array>
     */
    protected array $validationRules = [];

    /**
     * The validation error messages.
     *
     * @var array<string, string>
     */
    protected array $validationMessages = [];

    /**
     * The validator instance.
     *
     * @var \Illuminate\Validation\Validator|null
     */
    protected $validator = null;

    /**
     * Get the validation rules.
     *
     * @return array<string, string|array>
     */
    public function getValidationRules(): array {
        return $this->validationRules;
    }

    /**
     * Set the validation rules.
     *
     * @param array<string, string|array> $rules
     * @return self
     */
    public function setValidationRules(array $rules): self {
        $this->validationRules = $rules;
        return $this;
    }

    /**
     * Add a validation rule.
     *
     * @param string $attribute
     * @param string|array $rules
     * @return self
     */
    public function addValidationRule(string $attribute, string|array $rules): self {
        $this->validationRules[$attribute] = $rules;
        return $this;
    }

    /**
     * Remove a validation rule.
     *
     * @param string $attribute
     * @return self
     */
    public function removeValidationRule(string $attribute): self {
        unset($this->validationRules[$attribute]);
        return $this;
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function getValidationMessages(): array {
        return $this->validationMessages;
    }

    /**
     * Set the validation messages.
     *
     * @param array<string, string> $messages
     * @return self
     */
    public function setValidationMessages(array $messages): self {
        $this->validationMessages = $messages;
        return $this;
    }

    /**
     * Add a validation message.
     *
     * @param string $rule
     * @param string $message
     * @return self
     */
    public function addValidationMessage(string $rule, string $message): self {
        $this->validationMessages[$rule] = $message;
        return $this;
    }

    /**
     * Remove a validation message.
     *
     * @param string $rule
     * @return self
     */
    public function removeValidationMessage(string $rule): self {
        unset($this->validationMessages[$rule]);
        return $this;
    }

    /**
     * Validate the model.
     *
     * @return bool
     * @throws ValidationException
     */
    public function validate(): bool {
        $this->validator = Validator::make(
            $this->getAttributes(),
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if ($this->validator->fails()) {
            throw new ValidationException($this->validator);
        }

        return true;
    }

    /**
     * Get the validator instance.
     *
     * @return \Illuminate\Validation\Validator|null
     */
    public function getValidator() {
        return $this->validator;
    }

    /**
     * Determine if the model is valid.
     *
     * @return bool
     */
    public function isValid(): bool {
        try {
            return $this->validate();
        } catch (ValidationException $e) {
            return false;
        }
    }

    /**
     * Get the validation errors.
     *
     * @return array
     */
    public function getValidationErrors(): array {
        if ($this->validator === null) {
            $this->isValid();
        }

        return $this->validator ? $this->validator->errors()->toArray() : [];
    }
}
