<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisTool;
use Symfony\Component\Process\Process;
use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Contracts\AnalysisResult;
use SAC\EloquentModelGenerator\Tools\PHPStanConfigBuilder;
use SAC\EloquentModelGenerator\Tools\PHPStanErrorMapper;

class PHPStanTool implements AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult {
        $configBuilder = new PHPStanConfigBuilder();
        $options = $configBuilder->getOptions();

        $command = [
            'phpstan',
            'analyze',
            '--configuration',
            'packages/StandAloneComplex/EloquentModelGenerator/phpstan.neon',
            'packages/StandAloneComplex/EloquentModelGenerator/src',
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // TODO: Handle the error case.
            throw new \Exception('PHPStan failed: ' . $process->getErrorOutput());
        }

        $output = $process->getOutput();

        // Parse the output and create an AnalysisResult object.
        $errors = [];
        $warnings = [];
        $suggestions = [];

        $errorMapper = new PHPStanErrorMapper();

        $result = json_decode($output, true);

        if (is_array($result) && array_key_exists('files', $result)) {
            foreach ($result['files'] as $file => $fileData) {
                if (is_array($fileData) && array_key_exists('errors', $fileData)) {
                    foreach ($fileData['errors'] as $error) {
                        $mappedError = $errorMapper->mapError($error);
                        $errors[] = $mappedError;
                    }
                }
            }
        }

        return new class($errors, $warnings, $suggestions) implements AnalysisResult {
            private $errors;
            private $warnings;
            private $suggestions;

            public function __construct(array $errors, array $warnings, array $suggestions) {
                $this->errors = $errors;
                $this->warnings = $warnings;
                $this->suggestions = $suggestions;
            }

            public function getErrors(): array {
                return $this->errors;
            }
            public function getWarnings(): array {
                return $this->warnings;
            }
            public function getSuggestions(): array {
                return $this->suggestions;
            }
        };
    }

    /**
     * Gets the name of the tool.
     *
     * @return string
     */
    public function getName(): string {
        return 'PHPStan';
    }
}