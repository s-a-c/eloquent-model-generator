<?php

namespace SAC\EloquentModelGenerator\Exceptions;

use Exception;
use Throwable;

class ModelGeneratorException extends Exception
{
    /**
     * Create a new model generator exception instance.
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
