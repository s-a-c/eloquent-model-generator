<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use Throwable;

/**
 * Exception thrown when tool execution errors occur.
 *
 * @phpstan-type ToolContext array{
 *     tool: string,
 *     command: string,
 *     message: string,
 *     code: int
 * }
 */
class ToolExecutionException extends AnalysisException
{
    /**
     * The name of the tool that failed.
     */
    private readonly string $toolName;

    /**
     * The command that was executed.
     */
    private readonly string $command;

    /**
     * Create a new tool execution exception instance.
     *
     * @param  string  $toolName  The name of the tool that failed
     * @param  string  $command  The command that was executed
     * @param  string  $message  The exception message
     * @param  int  $code  The exception code
     * @param  \Throwable|null  $previous  The previous throwable used for exception chaining
     */
    public function __construct(
        string $toolName,
        string $command,
        string $message = '',
        int $code = self::ERROR_EXECUTION_FAILED,
        ?Throwable $previous = null
    ) {
        self::validateNotEmpty($toolName, 'tool name');
        self::validateNotEmpty($command, 'command');

        $this->toolName = $toolName;
        $this->command = $command;

        $message = $message ?: sprintf('Failed to execute tool %s', $toolName);
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create an exception for command execution failure.
     *
     * @param  string  $toolName  The name of the tool
     * @param  string  $command  The command that failed
     * @param  string  $error  The error message
     * @param  int  $exitCode  The command exit code
     */
    public static function commandFailed(
        string $toolName,
        string $command,
        string $error,
        int $exitCode = 1
    ): self {
        self::validateNotEmpty($toolName, 'tool name');
        self::validateNotEmpty($command, 'command');
        self::validateNotEmpty($error, 'error message');
        self::validateRange($exitCode, 0, 255, 'exit code');

        return new self(
            $toolName,
            $command,
            sprintf('Command failed for %s (exit code %d): %s', $toolName, $exitCode, $error),
            self::ERROR_EXECUTION_FAILED
        );
    }

    /**
     * Create an exception for missing tool binary.
     *
     * @param  string  $toolName  The name of the tool
     * @param  string  $binary  The missing binary name
     */
    public static function missingBinary(string $toolName, string $binary): self
    {
        self::validateNotEmpty($toolName, 'tool name');
        self::validateNotEmpty($binary, 'binary name');

        return new self(
            $toolName,
            $binary,
            sprintf('Tool %s binary not found: %s', $toolName, $binary),
            self::ERROR_EXECUTION_FAILED
        );
    }

    /**
     * Create an exception for tool timeout.
     *
     * @param  string  $toolName  The name of the tool
     * @param  string  $command  The command that timed out
     * @param  int  $timeout  The timeout in seconds
     */
    public static function timeout(string $toolName, string $command, int $timeout): self
    {
        self::validateNotEmpty($toolName, 'tool name');
        self::validateNotEmpty($command, 'command');
        self::validateRange($timeout, 1, 3600, 'timeout');

        return new self(
            $toolName,
            $command,
            sprintf('Tool %s execution timed out after %d seconds', $toolName, $timeout),
            self::ERROR_EXECUTION_FAILED
        );
    }

    /**
     * Create an exception for invalid tool output.
     *
     * @param  string  $toolName  The name of the tool
     * @param  string  $command  The executed command
     * @param  string  $output  The invalid output
     * @param  string  $reason  The reason for invalidity
     */
    public static function invalidOutput(
        string $toolName,
        string $command,
        string $output,
        string $reason
    ): self {
        self::validateNotEmpty($toolName, 'tool name');
        self::validateNotEmpty($command, 'command');
        self::validateNotEmpty($reason, 'reason');

        return new self(
            $toolName,
            $command,
            sprintf('Invalid output from %s: %s. Output: %s', $toolName, $reason, $output),
            self::ERROR_EXECUTION_FAILED
        );
    }

    /**
     * Create an exception for tool configuration error.
     *
     * @param  string  $toolName  The name of the tool
     * @param  string  $command  The command with invalid configuration
     * @param  string  $error  The configuration error
     */
    public static function configurationError(string $toolName, string $command, string $error): self
    {
        self::validateNotEmpty($toolName, 'tool name');
        self::validateNotEmpty($command, 'command');
        self::validateNotEmpty($error, 'error message');

        return new self(
            $toolName,
            $command,
            sprintf('Tool %s configuration error: %s', $toolName, $error),
            self::ERROR_INVALID_CONFIG
        );
    }

    /**
     * Get the name of the tool that failed.
     */
    public function getToolName(): string
    {
        return $this->toolName;
    }

    /**
     * Get the command that was executed.
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * Get the exception context as an array.
     *
     * @return ToolContext
     */
    public function getContext(): array
    {
        return [
            'tool' => $this->toolName,
            'command' => $this->command,
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ];
    }
}
