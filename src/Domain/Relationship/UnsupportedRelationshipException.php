<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Relationship;

use RuntimeException;

/**
 * Exception thrown when an unsupported relationship type is encountered
 */
final class UnsupportedRelationshipException extends RuntimeException
{
}
