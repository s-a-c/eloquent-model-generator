<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use InvalidArgumentException;
use Throwable;

/**
 * Exception thrown when output format errors occur.
 *
 * @phpstan-type FormatContext array{
 *     format: string,
 *     message: string,
 *     code: int
 * }
 */
class OutputFormatException extends AnalysisException {
    /**
     * The format that caused the error.
     */
    private readonly string $format;

    /**
     * Create a new output format exception instance.
     *
     * @param string $format The invalid format
     * @param string $message The exception message
     * @param int $code The exception code
     * @param \Throwable|null $previous The previous throwable used for exception chaining
     */
    public function __construct(
        string $format,
        string $message = 'Invalid output format',
        int $code = self::ERROR_INVALID_FORMAT,
        ?Throwable $previous = null
    ) {
        self::validateNotEmpty($format, 'format');
        $this->format = $format;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create an exception for unsupported format.
     *
     * @param string $format The unsupported format
     * @param string $tool The tool name
     * @return self
     */
    public static function unsupportedFormat(string $format, string $tool): self {
        self::validateNotEmpty($format, 'format');
        self::validateNotEmpty($tool, 'tool name');
        return new self(
            $format,
            sprintf('Tool %s does not support output format: %s', $tool, $format),
            self::ERROR_INVALID_FORMAT
        );
    }

    /**
     * Create an exception for invalid format content.
     *
     * @param string $format The format
     * @param string $content The invalid content
     * @param string $reason The reason for invalidity
     * @return self
     */
    public static function invalidContent(string $format, string $content, string $reason): self {
        self::validateNotEmpty($format, 'format');
        self::validateNotEmpty($reason, 'reason');
        return new self(
            $format,
            sprintf('Invalid %s content: %s. %s', $format, $content, $reason),
            self::ERROR_INVALID_FORMAT
        );
    }

    /**
     * Create an exception for missing required fields.
     *
     * @param string $format The format
     * @param array<string> $fields The missing fields
     * @return self
     */
    public static function missingFields(string $format, array $fields): self {
        self::validateNotEmpty($format, 'format');
        if (empty($fields)) {
            throw new \InvalidArgumentException('Fields array cannot be empty');
        }
        return new self(
            $format,
            sprintf(
                'Missing required fields in %s output: %s',
                $format,
                implode(', ', $fields)
            ),
            self::ERROR_INVALID_FORMAT
        );
    }

    /**
     * Create an exception for parsing error.
     *
     * @param string $format The format
     * @param string $error The parsing error
     * @return self
     */
    public static function parsingError(string $format, string $error): self {
        self::validateNotEmpty($format, 'format');
        self::validateNotEmpty($error, 'error message');
        return new self(
            $format,
            sprintf('Failed to parse %s output: %s', $format, $error),
            self::ERROR_INVALID_FORMAT
        );
    }

    /**
     * Create an exception for conversion error.
     *
     * @param string $fromFormat The source format
     * @param string $toFormat The target format
     * @param string $error The conversion error
     * @return self
     */
    public static function conversionError(string $fromFormat, string $toFormat, string $error): self {
        self::validateNotEmpty($fromFormat, 'source format');
        self::validateNotEmpty($toFormat, 'target format');
        self::validateNotEmpty($error, 'error message');
        return new self(
            $fromFormat,
            sprintf('Failed to convert from %s to %s: %s', $fromFormat, $toFormat, $error),
            self::ERROR_INVALID_FORMAT
        );
    }

    /**
     * Get the format that caused the error.
     */
    public function getFormat(): string {
        return $this->format;
    }

    /**
     * Get the exception context as an array.
     *
     * @return FormatContext
     */
    public function getContext(): array {
        return [
            'format' => $this->format,
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ];
    }
}
