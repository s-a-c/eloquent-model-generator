<?php

namespace SAC\EloquentModelGenerator\Tools;

class PintErrorMapper {
    /**
     * Maps the Pint error to a common format.
     *
     * @param array $error
     * @return array
     */
    public function mapError(array $error): array {
        $error['fix_suggestions'] = [];

        if (strpos($error['message'], 'File needs to be formatted') !== false) {
            $error['fix_suggestions'][] = [
                'message' => 'Run Pint to fix the formatting issues in this file.',
                'code' => 'pint ' . $error['file'],
            ];
        }

        // TODO: Implement the logic to map the Pint error to a common format and add fix suggestions.
        return $error;
    }
}