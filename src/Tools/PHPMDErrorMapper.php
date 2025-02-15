<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

class PHPMDErrorMapper {
    /**
     * Maps the PHPMD error to a common format.
     *
     * @param array $error
     * @return array
     */
    public function mapError(array $error): array {
        $error['fix_suggestions'] = [];

        if (strpos($error['message'], 'LongMethod') !== false) {
            $error['fix_suggestions'][] = [
                'message' => 'Break this method into smaller, more manageable methods.',
                'code' => '// TODO: Break this method into smaller methods',
            ];
        }

        // TODO: Implement the logic to map the PHPMD error to a common format and add fix suggestions.
        return $error;
    }
}