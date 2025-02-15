<?php

namespace SAC\EloquentModelGenerator\Exceptions;

use Exception;

class ModelGeneratorSchemaAnalyzerException extends Exception
{
    /**
     * Create a new schema analyzer exception.
     */
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
