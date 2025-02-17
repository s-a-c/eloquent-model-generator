<?php

namespace SAC\EloquentModelGenerator\Contracts;

interface AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array;
}