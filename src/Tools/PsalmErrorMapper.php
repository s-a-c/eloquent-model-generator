<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

class PsalmErrorMapper {
    /**
     * Maps the Psalm error to a common format.
     *
     * @param array $error
     * @return array
     */
    public function mapError(array $error): array {
        $error['fix_suggestions'] = [];

        if (strpos($error['message'], 'MissingReturnType') !== false) {
            $error['fix_suggestions'][] = [
                'message' => 'Add a return type declaration to the function.',
                'code' => ': void',
            ];
        }

        // TODO: Implement the logic to map the Psalm error to a common format and add fix suggestions.
        return $error;
    }
}