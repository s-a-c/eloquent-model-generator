<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisTool;
use Symfony\Component\Process\Process;
use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Contracts\AnalysisResult;
use SAC\EloquentModelGenerator\Tools\PHPMDErrorMapper;

class PHPMDTool implements AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult {
        $command = [
            'phpmd',
            'packages/StandAloneComplex/EloquentModelGenerator/src',
            'xml',
            'packages/StandAloneComplex/EloquentModelGenerator/phpmd.xml',
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            // TODO: Handle the error case.
            throw new \Exception('PHPMD failed: ' . $process->getErrorOutput());
        }

        $output = $process->getOutput();

        // Parse the output and create an AnalysisResult object.
        $errors = [];
        $warnings = [];
        $suggestions = [];

        $errorMapper = new PHPMDErrorMapper();

        $xml = simplexml_load_string($output);

        if ($xml) {
            foreach ($xml->file as $fileNode) {
                $file = (string) $fileNode['name'];
                foreach ($fileNode->violation as $violationNode) {
                    $message = (string) $violationNode;
                    $line = (int) $violationNode['beginline'];
                    $rule = (string) $violationNode['rule'];

                    $mappedError = $errorMapper->mapError([
                        'message' => $message,
                        'line' => $line,
                        'file' => $file,
                        'rule' => $rule,
                    ]);

                    $errors[] = $mappedError;
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
        return 'PHPMD';
    }
}