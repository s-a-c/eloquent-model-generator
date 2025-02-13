<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class AnalysisToolManager {
    private array $tools = [];
    private array $configs = [];
    private array $results = [];

    public function registerTool(string $name, array $command, ?string $configTemplate = null): self {
        $this->tools[$name] = $command;
        if ($configTemplate) {
            $this->configs[$name] = $configTemplate;
        }
        return $this;
    }

    public function getAvailableTools(): array {
        return array_keys($this->tools);
    }

    public function runTool(string $name, string $targetDir, array $options = []): array {
        if (!isset($this->tools[$name])) {
            throw new \InvalidArgumentException("Tool not found: {$name}");
        }

        $command = $this->buildCommand($name, $targetDir, $options);
        $process = new Process($command);
        $process->setTimeout(null);

        $output = '';
        $process->run(function ($type, $buffer) use (&$output) {
            $output .= $buffer;
        });

        $this->results[$name] = [
            'success' => $process->isSuccessful(),
            'output' => $output,
            'files' => $this->extractAffectedFiles($output, $targetDir),
        ];

        return $this->results[$name];
    }

    public function runToolsInParallel(array $tools, string $targetDir, array $options = []): array {
        $processes = [];
        foreach ($tools as $name) {
            if (!isset($this->tools[$name])) {
                continue;
            }

            $command = $this->buildCommand($name, $targetDir, $options);
            $processes[$name] = new Process($command);
            $processes[$name]->start();
        }

        foreach ($processes as $name => $process) {
            $output = '';
            $process->wait(function ($type, $buffer) use (&$output) {
                $output .= $buffer;
            });

            $this->results[$name] = [
                'success' => $process->isSuccessful(),
                'output' => $output,
                'files' => $this->extractAffectedFiles($output, $targetDir),
            ];
        }

        return $this->results;
    }

    public function getResults(?string $tool = null): array {
        if ($tool) {
            return $this->results[$tool] ?? [];
        }

        return $this->results;
    }

    public function hasIssues(?string $tool = null): bool {
        if ($tool) {
            return isset($this->results[$tool]) && !$this->results[$tool]['success'];
        }

        return collect($this->results)->contains('success', false);
    }

    public function getAffectedFiles(?string $tool = null): array {
        if ($tool) {
            return $this->results[$tool]['files'] ?? [];
        }

        return collect($this->results)
            ->pluck('files')
            ->flatten()
            ->unique()
            ->values()
            ->toArray();
    }

    public function ensureConfig(string $tool, string $targetDir): void {
        if (!isset($this->configs[$tool])) {
            return;
        }

        $configFile = $this->getConfigPath($tool);
        if (File::exists($configFile)) {
            return;
        }

        $content = str_replace(
            ['%paths%'],
            [$targetDir],
            $this->configs[$tool]
        );

        File::put($configFile, $content);
    }

    private function buildCommand(string $tool, string $targetDir, array $options = []): array {
        $command = $this->tools[$tool];

        // Replace placeholders in command
        $command = array_map(function ($part) use ($targetDir, $options) {
            return str_replace(
                ['%target%', '%level%'],
                [$targetDir, $options['level'] ?? ''],
                $part
            );
        }, $command);

        // Add any additional options
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                if ($value === true) {
                    $command[] = "--{$key}";
                } elseif ($value !== false) {
                    $command[] = "--{$key}={$value}";
                }
            }
        }

        return $command;
    }

    private function extractAffectedFiles(string $output, string $targetDir): array {
        $escapedDir = preg_quote($targetDir, '/');
        preg_match_all("/{$escapedDir}\/[^:]+/", $output, $matches);
        return array_unique($matches[0] ?? []);
    }

    private function getConfigPath(string $tool): string {
        return match ($tool) {
            'phpstan' => base_path('.phpstan.neon'),
            'psalm' => base_path('psalm.xml'),
            'php-cs-fixer' => base_path('.php-cs-fixer.php'),
            'phpcs' => base_path('phpcs.xml'),
            default => base_path("{$tool}.php"),
        };
    }
}
