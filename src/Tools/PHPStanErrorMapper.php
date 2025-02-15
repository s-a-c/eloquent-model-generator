<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

class PHPStanErrorMapper {
    /**
     * Maps the PHPStan error to a common format.
     *
     * @param array $error
     * @return array
     */
    public function mapError(array $error): array {
        $error['fix_suggestions'] = [];

        if (strpos($error['message'], 'Undefined variable') !== false) {
            $variableName = str_replace('Undefined variable: ', '', $error['message']);
            $error['fix_suggestions'][] = [
                'message' => 'Initialize variable $' . $variableName . ' with a default value.',
                'code' => '$' . $variableName . ' = null;',
            ];
        }

        // TODO: Implement the logic to map the PHPStan error to a common format and add fix suggestions.
        return $error;
    }
}