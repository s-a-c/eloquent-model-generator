<?php

namespace SAC\EloquentModelGenerator\Exceptions;

use Exception;

class ModelGeneratorException extends Exception {
    /**
     * Create a new model generator exception instance.
     *
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        string $message = "",
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
