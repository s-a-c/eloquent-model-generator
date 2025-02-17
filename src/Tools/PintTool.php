<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisTool;
use Symfony\Component\Process\Process;
use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Contracts\AnalysisResult;
use SAC\EloquentModelGenerator\Tools\PintConfigBuilder;
use SAC\EloquentModelGenerator\Tools\PintErrorMapper;

class PintTool implements AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult {
        $configBuilder = new PintConfigBuilder();
        $options = $configBuilder->getOptions();

        $command = [
            'pint',
            'packages/StandAloneComplex/EloquentModelGenerator/src',
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // TODO: Handle the error case.
            throw new \Exception('Pint failed: ' . $process->getErrorOutput());
        }

        $output = $process->getOutput();

        // Parse the output and create an AnalysisResult object.
        $errors = [];
        $warnings = [];
        $suggestions = [];

        $pintErrorMapper = new PintErrorMapper();

        $lines = explode("\n", $output);
        foreach ($lines as $line) {
            if (strpos($line, 'Needs to be formatted:') !== false) {
                $file = trim(str_replace('Needs to be formatted:', '', $line));
                $suggestions[] = [
                    'message' => 'File needs to be formatted',
                    'file' => $file,
                ];
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
        return 'Pint';
    }
}