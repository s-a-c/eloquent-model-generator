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

        if (strpos($error['message'], 'UnusedFormalParameter') !== false) {
            $error['fix_suggestions'][] = [
                'message' => 'Remove the unused parameter or use it within the method.',
                'code' => '// TODO: Remove the unused parameter or use it',
            ];
        }

        // TODO: Implement the logic to map the PHPMD error to a common format and add fix suggestions.
        return $error;
    }
}