<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

class RectorErrorMapper {
    /**
     * Maps the Rector error to a common format.
     *
     * @param array $error
     * @return array
     */
    public function mapError(array $error): array {
        $error['fix_suggestions'] = [];

        if (strpos($error['message'], 'Replace new DateTime with DateTimeImmutable') !== false) {
            $error['fix_suggestions'][] = [
                'message' => 'Replace new DateTime with DateTimeImmutable',
                'code' => 'new DateTimeImmutable',
            ];
        }

        // TODO: Implement the logic to map the Rector error to a common format and add fix suggestions.
        return $error;
    }
}