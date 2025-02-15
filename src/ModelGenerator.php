<?php

namespace SAC\EloquentModelGenerator;

use SAC\EloquentModelGenerator\Contracts\ModelGenerator as ModelGeneratorContract;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ValidationRuleGenerator;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

class ModelGenerator implements ModelGeneratorContract
{
    /**
     * Create a new model generator instance.
     */
    public function __construct(private readonly ModelGeneratorService $service, protected ValidationRuleGenerator $validationGenerator = new ValidationRuleGenerator) {}

    /**
     * Generate a model from the given schema.
     *
     * @param  array<string, mixed>  $schema
     *
     * @throws ModelGeneratorException
     */
    public function generate(ModelDefinition $definition, array $schema): GeneratedModel
    {
        $baseContent = $this->service->generate($definition, $schema);

        if ($definition->withValidation()) {
            // Add table name to schema for validation rules
            $schema['table_name'] = $definition->getTableName();

            $content = $baseContent->getContent();
            $rules = $this->validationGenerator->generateRules($schema);
            $messages = $this->validationGenerator->generateMessages($schema);

            // Set validation rules and messages on the model
            $baseContent->setValidationRules($rules);
            $baseContent->setValidationMessages($messages);

            // Update the content with validation traits and properties
            $content = $this->injectValidationTraits($content);
            $content = $this->injectValidationRules($content, $rules);
            $content = $this->injectValidationMessages($content, $messages);

            $baseContent->setContent($content);
        }

        return $baseContent;
    }

    /**
     * Generate multiple models in batch.
     *
     * @param  array<ModelDefinition>  $definitions
     * @param  array<string, array<string, mixed>>  $schemas
     * @return array<GeneratedModel>
     *
     * @throws ModelGeneratorException
     */
    public function generateBatch(array $definitions, array $schemas): array
    {
        return array_map(
            fn ($definition, $schema): GeneratedModel => $this->generate($definition, $schema),
            $definitions,
            $schemas
        );
    }

    /**
     * Check if a model already exists.
     */
    public function modelExists(string $className, string $namespace): bool
    {
        $class = $namespace.'\\'.$className;

        return class_exists($class);
    }

    /**
     * Inject validation traits into the model content.
     */
    protected function injectValidationTraits(string $content): string
    {
        $useStatements = "use SAC\EloquentModelGenerator\Support\Traits\HasModelValidation;\n";
        $traitUse = "    use HasModelValidation;\n";

        // Add use statement after the last use statement or after namespace
        if (preg_match('/^(.*?use[^;]+;)(?!.*use)/ms', $content, $matches)) {
            $content = str_replace(
                $matches[1],
                $matches[1]."\n".$useStatements,
                $content
            );
        } else {
            $content = preg_replace(
                '/(namespace[^;]+;)/',
                "$1\n\n".$useStatements,
                $content
            );
        }

        // Add trait use after class declaration
        $content = preg_replace(
            '/(class\s+[^{]+{)/',
            "$1\n".$traitUse,
            (string) $content
        );

        return $content;
    }

    /**
     * Inject validation rules into the model content.
     *
     * @param  array<string, string|array>  $rules
     */
    protected function injectValidationRules(string $content, array $rules): string
    {
        $rulesContent = "\n    /**\n";
        $rulesContent .= "     * The validation rules that apply to the model.\n";
        $rulesContent .= "     *\n";
        $rulesContent .= "     * @var array<string, string|array>\n";
        $rulesContent .= "     */\n";
        $rulesContent .= "    protected array \$validationRules = [\n";

        foreach ($rules as $attribute => $rule) {
            if (is_array($rule)) {
                $rulesContent .= sprintf("        '%s' => ['", $attribute).implode("', '", $rule)."'],\n";
            } else {
                $rulesContent .= "        '{$attribute}' => '{$rule}',\n";
            }
        }

        $rulesContent .= "    ];\n";

        // Insert rules before the last closing brace
        return preg_replace('/}(?=[^}]*$)/', $rulesContent.'}', $content);
    }

    /**
     * Inject validation messages into the model content.
     *
     * @param  array<string, string>  $messages
     */
    protected function injectValidationMessages(string $content, array $messages): string
    {
        $messagesContent = "\n    /**\n";
        $messagesContent .= "     * The validation error messages.\n";
        $messagesContent .= "     *\n";
        $messagesContent .= "     * @var array<string, string>\n";
        $messagesContent .= "     */\n";
        $messagesContent .= "    protected array \$validationMessages = [\n";

        foreach ($messages as $rule => $message) {
            $messagesContent .= "        '{$rule}' => '{$message}',\n";
        }

        $messagesContent .= "    ];\n";

        // Insert messages before the last closing brace
        return preg_replace('/}(?=[^}]*$)/', $messagesContent.'}', $content);
    }
}
