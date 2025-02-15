<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisTool;
use Symfony\Component\Process\Process;
use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisResult;
use StandAloneComplex\EloquentModelGenerator\Tools\PsalmConfigBuilder;
use StandAloneComplex\EloquentModelGenerator\Tools\PsalmErrorMapper;

class PsalmTool implements AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult {
        $configBuilder = new PsalmConfigBuilder();
        $options = $configBuilder->getOptions();

        $command = [
            'psalm',
            '--config=packages/StandAloneComplex/EloquentModelGenerator/psalm.xml',
            '--output-format=json',
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // TODO: Handle the error case.
            throw new \Exception('Psalm failed: ' . $process->getErrorOutput());
        }

        $output = $process->getOutput();

        // Parse the output and create an AnalysisResult object.
        $errors = [];
        $warnings = [];
        $suggestions = [];

        $errorMapper = new PsalmErrorMapper();

        $result = json_decode($output, true);

        if (is_array($result)) {
            foreach ($result as $issue) {
                $mappedError = $errorMapper->mapError($issue);
                $errors[] = $mappedError;
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
        return 'Psalm';
    }
}