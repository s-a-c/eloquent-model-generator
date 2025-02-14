<?php

namespace SAC\EloquentModelGenerator\Support\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait HasValidation {
    /**
     * @var array<string, array<string>>
     */
    protected $errors = [];

    /**
     * @var array<string, array<string>|string>
     */
    protected $rules = [];

    /**
     * @var array<string, string>
     */
    protected $messages = [];

    /**
     * Get the validation rules.
     *
     * @return array<string, array<string>|string>
     */
    public function getRules(): array {
        return $this->rules;
    }

    /**
     * Set the validation rules.
     *
     * @param array<string, array<string>|string> $rules
     * @return $this
     */
    public function setRules(array $rules): static {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function getMessages(): array {
        return $this->messages;
    }

    /**
     * Set the validation messages.
     *
     * @param array<string, string> $messages
     * @return $this
     */
    public function setMessages(array $messages): static {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Validate the model.
     *
     * @throws ValidationException
     */
    public function validate(): bool {
        $validator = Validator::make(
            $this->getAttributes(),
            $this->getRules(),
            $this->getMessages()
        );

        if ($validator->fails()) {
            /** @var array<string, array<string>> */
            $errors = $validator->errors()->toArray();
            $this->errors = $errors;
            throw new ValidationException($validator);
        }

        return true;
    }

    /**
     * Get the validation errors.
     *
     * @return array<string, array<string>>
     */
    public function getErrors(): array {
        return $this->errors;
    }

    /**
     * Clear the validation errors.
     *
     * @return $this
     */
    public function clearErrors(): static {
        $this->errors = [];
        return $this;
    }
}
