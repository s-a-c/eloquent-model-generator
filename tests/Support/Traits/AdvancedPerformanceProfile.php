<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Stopwatch\Stopwatch;

trait AdvancedPerformanceProfile
{
    private Stopwatch $stopwatch;

    private Collection $profileData;

    private array $checkpoints = [];

    private ?float $baselineMemory = null;

    /**
     * Initialize the performance profiler.
     */
    protected function initializeProfiler(): void
    {
        $this->stopwatch = new Stopwatch(true);
        $this->profileData = collect();
        $this->baselineMemory = memory_get_usage(true);
    }

    /**
     * Start profiling a section.
     *
     * @param  string  $section  Section identifier
     * @param  string  $category  Optional category for grouping
     */
    protected function startProfile(string $section, string $category = 'default'): void
    {
        $this->stopwatch->start("{$category}:{$section}");
        $this->checkpoints[$section] = [
            'memory_start' => memory_get_usage(true),
            'peak_start' => memory_get_peak_usage(true),
            'time_start' => microtime(true),
            'category' => $category,
        ];
    }

    /**
     * Stop profiling a section and collect metrics.
     *
     * @param  string  $section  Section identifier
     * @return array Profile data for the section
     */
    protected function stopProfile(string $section): array
    {
        if (! isset($this->checkpoints[$section])) {
            throw new \RuntimeException("No profile started for section: {$section}");
        }

        $checkpoint = $this->checkpoints[$section];
        $category = $checkpoint['category'];
        $event = $this->stopwatch->stop("{$category}:{$section}");

        $metrics = [
            'section' => $section,
            'category' => $category,
            'duration' => [
                'wall_time' => (microtime(true) - $checkpoint['time_start']) * 1000,
                'cpu_time' => $event->getDuration(),
                'periods' => $event->getPeriods(),
            ],
            'memory' => [
                'start' => $checkpoint['memory_start'],
                'end' => memory_get_usage(true),
                'peak' => memory_get_peak_usage(true),
                'peak_increase' => memory_get_peak_usage(true) - $checkpoint['peak_start'],
                'net_increase' => memory_get_usage(true) - $checkpoint['memory_start'],
            ],
            'relative_to_baseline' => [
                'memory_increase' => memory_get_usage(true) - $this->baselineMemory,
                'peak_increase' => memory_get_peak_usage(true) - $this->baselineMemory,
            ],
            'system' => [
                'load_average' => sys_getloadavg(),
                'memory_info' => $this->getSystemMemoryInfo(),
            ],
        ];

        $this->profileData->push($metrics);
        unset($this->checkpoints[$section]);

        $this->logProfileMetrics($section, $metrics);

        return $metrics;
    }

    /**
     * Get aggregated profile statistics.
     */
    protected function getProfileStats(): array
    {
        return [
            'by_category' => $this->profileData->groupBy('category')->map(function ($items) {
                return [
                    'count' => $items->count(),
                    'total_duration' => $items->sum('duration.wall_time'),
                    'avg_duration' => $items->average('duration.wall_time'),
                    'max_duration' => $items->max('duration.wall_time'),
                    'total_memory_increase' => $items->sum('memory.net_increase'),
                    'avg_memory_increase' => $items->average('memory.net_increase'),
                    'max_memory_increase' => $items->max('memory.net_increase'),
                ];
            })->toArray(),
            'overall' => [
                'total_sections' => $this->profileData->count(),
                'total_duration' => $this->profileData->sum('duration.wall_time'),
                'peak_memory' => $this->profileData->max('memory.peak'),
                'total_memory_growth' => memory_get_usage(true) - $this->baselineMemory,
            ],
            'performance_score' => $this->calculatePerformanceScore(),
        ];
    }

    /**
     * Calculate a performance score based on metrics.
     *
     * @return float Score between 0 and 100
     */
    protected function calculatePerformanceScore(): float
    {
        $stats = $this->profileData->map(function ($metrics) {
            $durationScore = min(100, 1000 / max(1, $metrics['duration']['wall_time'])) * 0.4;
            $memoryScore = min(100, (50 * 1024 * 1024) / max(1, $metrics['memory']['net_increase'])) * 0.4;
            $peakScore = min(100, (100 * 1024 * 1024) / max(1, $metrics['memory']['peak'])) * 0.2;

            return $durationScore + $memoryScore + $peakScore;
        });

        return round($stats->average(), 2);
    }

    /**
     * Get detailed system memory information.
     */
    private function getSystemMemoryInfo(): array
    {
        if (PHP_OS_FAMILY === 'Darwin') {
            // macOS memory info
            $output = shell_exec('vm_stat');
            $lines = explode("\n", $output);
            $stats = [];

            foreach ($lines as $line) {
                if (preg_match('/^(.+):\s+(\d+)/', $line, $matches)) {
                    $stats[trim($matches[1])] = (int) $matches[2] * 4096; // Convert to bytes
                }
            }

            return $stats;
        } elseif (PHP_OS_FAMILY === 'Linux') {
            // Linux memory info
            $output = shell_exec('free -b');
            $lines = explode("\n", $output);
            $stats = [];

            if (isset($lines[1])) {
                $values = preg_split('/\s+/', trim($lines[1]));
                $stats = [
                    'total' => (int) $values[1],
                    'used' => (int) $values[2],
                    'free' => (int) $values[3],
                    'available' => (int) $values[6] ?? null,
                ];
            }

            return $stats;
        }

        return [];
    }

    /**
     * Log profile metrics with detailed analysis.
     */
    private function logProfileMetrics(string $section, array $metrics): void
    {
        $analysis = [
            'performance_rating' => $this->getRatingForMetrics($metrics),
            'warnings' => $this->analyzeForWarnings($metrics),
            'recommendations' => $this->generateRecommendations($metrics),
        ];

        Log::info("Profile metrics for {$section}", [
            'metrics' => $metrics,
            'analysis' => $analysis,
        ]);

        if (! empty($analysis['warnings'])) {
            Log::warning("Performance warnings for {$section}", [
                'warnings' => $analysis['warnings'],
            ]);
        }
    }

    /**
     * Get performance rating based on metrics.
     *
     * @return string excellent|good|fair|poor
     */
    private function getRatingForMetrics(array $metrics): string
    {
        $score = $this->calculateMetricScore($metrics);

        return match (true) {
            $score >= 90 => 'excellent',
            $score >= 75 => 'good',
            $score >= 60 => 'fair',
            default => 'poor'
        };
    }

    /**
     * Analyze metrics for potential warnings.
     */
    private function analyzeForWarnings(array $metrics): array
    {
        $warnings = [];

        if ($metrics['duration']['wall_time'] > 1000) {
            $warnings[] = 'Execution time exceeds 1 second';
        }

        if ($metrics['memory']['net_increase'] > 50 * 1024 * 1024) {
            $warnings[] = 'Memory usage increased by more than 50MB';
        }

        if ($metrics['memory']['peak_increase'] > 100 * 1024 * 1024) {
            $warnings[] = 'Peak memory increased by more than 100MB';
        }

        return $warnings;
    }

    /**
     * Generate performance improvement recommendations.
     */
    private function generateRecommendations(array $metrics): array
    {
        $recommendations = [];

        if ($metrics['duration']['wall_time'] > $metrics['duration']['cpu_time'] * 1.5) {
            $recommendations[] = 'Consider optimizing I/O operations';
        }

        if ($metrics['memory']['net_increase'] > 0.5 * $metrics['memory']['start']) {
            $recommendations[] = 'Consider implementing memory cleanup';
        }

        if (count($metrics['duration']['periods']) > 1) {
            $recommendations[] = 'Consider reducing the number of processing cycles';
        }

        return $recommendations;
    }

    /**
     * Calculate a score for specific metrics.
     */
    private function calculateMetricScore(array $metrics): float
    {
        $timeScore = min(100, 1000 / max(1, $metrics['duration']['wall_time'])) * 0.4;
        $memoryScore = min(100, (50 * 1024 * 1024) / max(1, $metrics['memory']['net_increase'])) * 0.4;
        $peakScore = min(100, (100 * 1024 * 1024) / max(1, $metrics['memory']['peak'])) * 0.2;

        return round($timeScore + $memoryScore + $peakScore, 2);
    }
}
