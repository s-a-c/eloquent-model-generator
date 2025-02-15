<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

class MetricsErrorMapper {
    /**
     * Maps the Metrics error to a common format.
     *
     * @param array $error
     * @return array
     */
    public function mapError(array $error): array {
        $error['fix_suggestions'] = [];

        if (strpos($error['message'], 'High Cyclomatic Complexity') !== false) {
            $error['fix_suggestions'][] = [
                'message' => 'Refactor this method to reduce its complexity.',
                'code' => '// TODO: Refactor this method to reduce its complexity',
            ];
        }

        // TODO: Implement the logic to map the Metrics error to a common format and add fix suggestions.
        return $error;
    }
}