<?php

namespace SAC\EloquentModelGenerator\Support\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait HasValidation {
    /**
     * The validation rules that apply to the model.
     *
     * @var array<string, string|array>
     */
    protected array $rules = [];

    /**
     * The validation error messages.
     *
     * @var array<string, string>
     */
    protected array $messages = [];

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
    public function getRules(): array {
        return $this->rules;
    }

    /**
     * Set the validation rules.
     *
     * @param array<string, string|array> $rules
     * @return self
     */
    public function setRules(array $rules): self {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */
    public function getMessages(): array {
        return $this->messages;
    }

    /**
     * Set the validation error messages.
     *
     * @param array<string, string> $messages
     * @return self
     */
    public function setMessages(array $messages): self {
        $this->messages = $messages;
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
            $this->getRules(),
            $this->getMessages()
        );

        if ($this->validator->fails()) {
            throw new ValidationException($this->validator);
        }

        return true;
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
     * @return array<string, array>
     */
    public function getErrors(): array {
        if (!$this->validator) {
            $this->isValid();
        }

        return $this->validator ? $this->validator->errors()->toArray() : [];
    }
}
