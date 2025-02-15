<?php

namespace StandAloneComplex\EloquentModelGenerator\Contracts;

interface AnalysisResult {
    /**
     * Gets the errors.
     *
     * @return array
     */
    public function getErrors(): array;

    /**
     * Gets the warnings.
     *
     * @return array
     */
    public function getWarnings(): array;

    /**
     * Gets the suggestions.
     *
     * @return array
     */
    public function getSuggestions(): array;
}