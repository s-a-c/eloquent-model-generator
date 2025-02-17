<?php

namespace SAC\EloquentModelGenerator\Contracts;

interface AnalysisTool {
    /**
     * Runs the analysis tool.
     *
     * @param AnalysisConfig $config
     * @return AnalysisResult
     */
    public function run(AnalysisConfig $config): AnalysisResult;

    /**
     * Gets the name of the tool.
     *
     * @return string
     */
    public function getName(): string;
}