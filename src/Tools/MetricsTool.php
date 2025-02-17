<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisTool;
use Symfony\Component\Process\Process;
use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Contracts\AnalysisResult;
use SAC\EloquentModelGenerator\Tools\MetricsErrorMapper;

class MetricsTool implements AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult {
        $command = [
            'phpmetrics',
            '--json',
            'packages/StandAloneComplex/EloquentModelGenerator/src',
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // TODO: Handle the error case.
            throw new \Exception('Metrics failed: ' . $process->getErrorOutput());
        }

        $output = $process->getOutput();

        // Parse the output and create an AnalysisResult object.
        $errors = [];
        $warnings = [];
        $suggestions = [];

        $metricsErrorMapper = new MetricsErrorMapper();

        $metrics = json_decode($output, true);

        if (is_array($metrics)) {
            // Extract metrics and create suggestions based on thresholds.
            foreach ($metrics['loc'] as $file => $loc) {
                if ($loc > 500) {
                    $suggestions[] = [
                        'message' => "File {$file} has a high number of lines of code: {$loc}",
                        'file' => $file,
                    ];
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
        return 'Metrics';
    }
}