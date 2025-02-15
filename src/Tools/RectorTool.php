<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisTool;
use Symfony\Component\Process\Process;
use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisResult;
use StandAloneComplex\EloquentModelGenerator\Tools\RectorConfigBuilder;
use StandAloneComplex\EloquentModelGenerator\Tools\RectorErrorMapper;

class RectorTool implements AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult {
        $configBuilder = new RectorConfigBuilder();
        $options = $configBuilder->getOptions();

        $command = [
            'rector',
            'process',
            '--config',
            'packages/StandAloneComplex/EloquentModelGenerator/rector.php',
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // TODO: Handle the error case.
            throw new \Exception('Rector failed: ' . $process->getErrorOutput());
        }

        $output = $process->getOutput();

        // Parse the output and create an AnalysisResult object.
        $errors = [];
        $warnings = [];
        $suggestions = [];

        $errorMapper = new RectorErrorMapper();

        // Assuming Rector outputs a list of changed files with applied rules.
        $lines = explode("\n", $output);
        foreach ($lines as $line) {
            if (strpos($line, ' [OK] ') !== false) {
                // Extract file name and applied rules.
                $parts = explode(' [OK] ', $line);
                $file = trim($parts[0]);
                $rules = trim($parts[1]);

                $suggestions[] = [
                    'message' => 'Rector applied rules: ' . $rules,
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
        return 'Rector';
    }
}