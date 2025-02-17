<?php

namespace SAC\EloquentModelGenerator\Contracts;

interface ResultFormatter {
    /**
     * Formats the analysis result.
     *
     * @param AnalysisResult $result
     * @return string
     */
    public function format(AnalysisResult $result): string;
}