<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use RuntimeException;

trait MeasurePerformance {
    /**
     * Store query execution times.
     */
    protected array $queryTimes = [];

    /**
     * Store memory usage snapshots.
     */
    protected array $memorySnapshots = [];

    /**
     * Store performance history for trend analysis.
     */
    protected Collection $performanceHistory;

    /**
     * Initialize performance measurement.
     */
    protected function initializePerformanceMeasurement(): void {
        $this->performanceHistory = collect();
    }

    /**
     * Start measuring query execution time.
     *
     * @param string|null $label Optional label for this measurement
     * @throws RuntimeException If measurement is already in progress
     */
    protected function startQueryMeasurement(?string $label = null): void {
        if (!empty($this->queryTimes)) {
            throw new RuntimeException('Query measurement already in progress');
        }

        try {
            DB::enableQueryLog();
            $this->queryTimes = [];
            $this->memorySnapshots = [];
            $this->takeMemorySnapshot($label ?? 'start');
        } catch (\Exception $e) {
            Log::error('Failed to start query measurement', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Stop measuring query execution time.
     *
     * @param string|null $label Optional label for this measurement
     * @return array Performance metrics
     * @throws RuntimeException If no measurement is in progress
     */
    protected function stopQueryMeasurement(?string $label = null): array {
        if (empty($this->queryTimes)) {
            throw new RuntimeException('No query measurement in progress');
        }

        try {
            $queryLog = DB::getQueryLog();
            DB::disableQueryLog();
            $this->takeMemorySnapshot($label ?? 'end');

            $summary = [
                'total_queries' => count($queryLog),
                'total_time' => 0,
                'average_time' => 0,
                'slowest_query' => null,
                'slowest_time' => 0,
                'fastest_query' => null,
                'fastest_time' => PHP_FLOAT_MAX,
                'memory_usage' => [
                    'start' => $this->memorySnapshots['start'] ?? 0,
                    'end' => $this->memorySnapshots[$label ?? 'end'] ?? 0,
                    'peak' => memory_get_peak_usage(true),
                    'growth' => ($this->memorySnapshots[$label ?? 'end'] ?? 0) - ($this->memorySnapshots['start'] ?? 0)
                ],
                'query_patterns' => $this->analyzeQueryPatterns($queryLog)
            ];

            foreach ($queryLog as $query) {
                $time = $query['time'];
                $summary['total_time'] += $time;

                if ($time > $summary['slowest_time']) {
                    $summary['slowest_time'] = $time;
                    $summary['slowest_query'] = $query['query'];
                }

                if ($time < $summary['fastest_time']) {
                    $summary['fastest_time'] = $time;
                    $summary['fastest_query'] = $query['query'];
                }
            }

            if ($summary['total_queries'] > 0) {
                $summary['average_time'] = $summary['total_time'] / $summary['total_queries'];
            }

            // Store in history for trend analysis
            $this->performanceHistory->push([
                'timestamp' => microtime(true),
                'metrics' => $summary
            ]);

            $this->logPerformanceMetrics($summary);

            return $summary;
        } catch (\Exception $e) {
            Log::error('Failed to stop query measurement', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Take a memory usage snapshot.
     *
     * @param string $key Snapshot identifier
     * @return int Memory usage in bytes
     */
    protected function takeMemorySnapshot(string $key): int {
        $usage = memory_get_usage(true);
        $this->memorySnapshots[$key] = $usage;
        return $usage;
    }

    /**
     * Assert that the number of queries executed is within limits.
     *
     * @param int $expectedCount Expected query count
     * @param float|null $maxTime Maximum total time in milliseconds
     * @param float|null $maxAverageTime Maximum average time per query
     * @throws RuntimeException If assertions fail
     */
    protected function assertQueryCount(
        int $expectedCount,
        ?float $maxTime = null,
        ?float $maxAverageTime = null
    ): void {
        $queryLog = DB::getQueryLog();
        $actualCount = count($queryLog);
        $totalTime = 0;

        foreach ($queryLog as $query) {
            $totalTime += $query['time'];
        }

        $averageTime = $actualCount > 0 ? $totalTime / $actualCount : 0;

        $errors = [];

        if ($actualCount !== $expectedCount) {
            $errors[] = "Expected {$expectedCount} queries but got {$actualCount}";
        }

        if ($maxTime !== null && $totalTime > $maxTime) {
            $errors[] = "Total query time {$totalTime}ms exceeds maximum {$maxTime}ms";
        }

        if ($maxAverageTime !== null && $averageTime > $maxAverageTime) {
            $errors[] = "Average query time {$averageTime}ms exceeds maximum {$maxAverageTime}ms";
        }

        if (!empty($errors)) {
            throw new RuntimeException(implode(PHP_EOL, $errors));
        }
    }

    /**
     * Assert that memory usage is within limits.
     *
     * @param int $maxMemoryUsage Maximum memory usage in bytes
     * @param bool $includePeak Whether to check peak memory usage
     * @throws RuntimeException If memory usage exceeds limit
     */
    protected function assertMemoryUsage(int $maxMemoryUsage, bool $includePeak = false): void {
        $currentUsage = memory_get_usage(true);
        $peakUsage = memory_get_peak_usage(true);

        $errors = [];

        if ($currentUsage > $maxMemoryUsage) {
            $errors[] = sprintf(
                'Current memory usage %s exceeds maximum %s',
                $this->formatMemoryUsage($currentUsage),
                $this->formatMemoryUsage($maxMemoryUsage)
            );
        }

        if ($includePeak && $peakUsage > $maxMemoryUsage) {
            $errors[] = sprintf(
                'Peak memory usage %s exceeds maximum %s',
                $this->formatMemoryUsage($peakUsage),
                $this->formatMemoryUsage($maxMemoryUsage)
            );
        }

        if (!empty($errors)) {
            throw new RuntimeException(implode(PHP_EOL, $errors));
        }
    }

    /**
     * Analyze query patterns to identify potential issues.
     *
     * @param array $queryLog Query log from DB::getQueryLog()
     * @return array Analysis results
     */
    protected function analyzeQueryPatterns(array $queryLog): array {
        $patterns = [
            'select_count' => 0,
            'insert_count' => 0,
            'update_count' => 0,
            'delete_count' => 0,
            'table_scans' => 0,
            'joins' => 0,
            'subqueries' => 0,
            'repeated_queries' => [],
        ];

        $seenQueries = [];

        foreach ($queryLog as $entry) {
            $query = strtolower($entry['query']);

            // Count query types
            if (str_starts_with($query, 'select')) $patterns['select_count']++;
            if (str_starts_with($query, 'insert')) $patterns['insert_count']++;
            if (str_starts_with($query, 'update')) $patterns['update_count']++;
            if (str_starts_with($query, 'delete')) $patterns['delete_count']++;

            // Detect table scans
            if (strpos($query, 'where') === false) {
                $patterns['table_scans']++;
            }

            // Count joins
            $patterns['joins'] += substr_count($query, 'join');

            // Count subqueries
            $patterns['subqueries'] += substr_count($query, 'select', 1);

            // Track repeated queries
            $queryHash = md5($query);
            if (!isset($seenQueries[$queryHash])) {
                $seenQueries[$queryHash] = 1;
            } else {
                $seenQueries[$queryHash]++;
                if ($seenQueries[$queryHash] === 2) {
                    $patterns['repeated_queries'][] = $query;
                }
            }
        }

        return $patterns;
    }

    /**
     * Get performance history for trend analysis.
     *
     * @return Collection Performance history
     */
    protected function getPerformanceHistory(): Collection {
        return $this->performanceHistory;
    }

    /**
     * Analyze performance trends.
     *
     * @return array Trend analysis results
     */
    protected function analyzePerformanceTrends(): array {
        if ($this->performanceHistory->isEmpty()) {
            return [];
        }

        $trends = [
            'query_count_trend' => [],
            'execution_time_trend' => [],
            'memory_usage_trend' => [],
        ];

        $this->performanceHistory->each(function ($entry) use (&$trends) {
            $trends['query_count_trend'][] = $entry['metrics']['total_queries'];
            $trends['execution_time_trend'][] = $entry['metrics']['total_time'];
            $trends['memory_usage_trend'][] = $entry['metrics']['memory_usage']['growth'];
        });

        return [
            'query_count' => [
                'min' => min($trends['query_count_trend']),
                'max' => max($trends['query_count_trend']),
                'avg' => array_sum($trends['query_count_trend']) / count($trends['query_count_trend']),
                'trend' => $this->calculateTrend($trends['query_count_trend'])
            ],
            'execution_time' => [
                'min' => min($trends['execution_time_trend']),
                'max' => max($trends['execution_time_trend']),
                'avg' => array_sum($trends['execution_time_trend']) / count($trends['execution_time_trend']),
                'trend' => $this->calculateTrend($trends['execution_time_trend'])
            ],
            'memory_usage' => [
                'min' => min($trends['memory_usage_trend']),
                'max' => max($trends['memory_usage_trend']),
                'avg' => array_sum($trends['memory_usage_trend']) / count($trends['memory_usage_trend']),
                'trend' => $this->calculateTrend($trends['memory_usage_trend'])
            ]
        ];
    }

    /**
     * Calculate trend direction and magnitude.
     *
     * @param array $values Series of values
     * @return array Trend analysis
     */
    private function calculateTrend(array $values): array {
        if (count($values) < 2) {
            return ['direction' => 'stable', 'magnitude' => 0];
        }

        $first = $values[0];
        $last = end($values);
        $change = $last - $first;
        $percentChange = $first !== 0 ? ($change / $first) * 100 : 0;

        return [
            'direction' => $change > 0 ? 'increasing' : ($change < 0 ? 'decreasing' : 'stable'),
            'magnitude' => abs($percentChange)
        ];
    }

    /**
     * Log performance metrics.
     *
     * @param array $metrics Performance metrics to log
     */
    protected function logPerformanceMetrics(array $metrics): void {
        Log::info('Performance Metrics', [
            'total_queries' => $metrics['total_queries'],
            'total_time' => $metrics['total_time'],
            'average_time' => $metrics['average_time'],
            'slowest_query' => $metrics['slowest_query'],
            'slowest_time' => $metrics['slowest_time'],
            'fastest_query' => $metrics['fastest_query'],
            'fastest_time' => $metrics['fastest_time'],
            'memory_usage' => $metrics['memory_usage'],
            'query_patterns' => $metrics['query_patterns']
        ]);

        if ($metrics['query_patterns']['repeated_queries']) {
            Log::warning('Repeated queries detected', [
                'queries' => $metrics['query_patterns']['repeated_queries']
            ]);
        }

        if ($metrics['query_patterns']['table_scans'] > 0) {
            Log::warning('Table scans detected', [
                'count' => $metrics['query_patterns']['table_scans']
            ]);
        }
    }

    /**
     * Get memory usage in a human-readable format.
     *
     * @param int $bytes Memory usage in bytes
     * @return string Formatted memory usage
     */
    protected function formatMemoryUsage(int $bytes): string {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
