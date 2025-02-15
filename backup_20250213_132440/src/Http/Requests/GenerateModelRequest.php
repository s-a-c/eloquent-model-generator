<?php

namespace SAC\EloquentModelGenerator\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>
     */
    public function rules(): array
    {
        return [
            'table' => ['required', 'string', 'regex:/^[a-zA-Z0-9_]+$/'],
            'config' => ['sometimes', 'array'],
            'config.namespace' => ['sometimes', 'string', 'regex:/^[a-zA-Z0-9\\\\]+$/'],
            'config.output_path' => ['sometimes', 'string'],
            'config.base_class' => ['sometimes', 'string'],
        ];
    }
}
