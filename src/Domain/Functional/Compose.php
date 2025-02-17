<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Functional;

/**
 * Function composition utilities for creating pipelines of operations.
 * These utilities help create more readable and maintainable code by
 * enabling functional programming patterns.
 */
final class Compose
{
    /**
     * Compose multiple functions into a single function, applying them right to left.
     * compose(f, g, h)(x) is equivalent to f(g(h(x)))
     *
     * @param callable ...$functions Functions to compose
     * @return callable The composed function
     */
    public static function of(callable ...$functions): callable
    {
        return array_reduce(
            array_reverse($functions),
            fn(callable $carry, callable $function): callable =>
                fn(mixed $value): mixed => $function($carry($value)),
            fn(mixed $value): mixed => $value
        );
    }

    /**
     * Pipe multiple functions into a single function, applying them left to right.
     * pipe(f, g, h)(x) is equivalent to h(g(f(x)))
     *
     * @param callable ...$functions Functions to pipe
     * @return callable The piped function
     */
    public static function pipe(callable ...$functions): callable
    {
        return array_reduce(
            $functions,
            fn(callable $carry, callable $function): callable =>
                fn(mixed $value): mixed => $function($carry($value)),
            fn(mixed $value): mixed => $value
        );
    }

    /**
     * Create a function that applies a function to each element of an array.
     *
     * @param callable $function Function to apply
     * @return callable Function that takes an array and returns a new array
     */
    public static function map(callable $function): callable
    {
        return fn(array $array): array => array_map($function, $array);
    }

    /**
     * Create a function that filters an array using a predicate.
     *
     * @param callable $predicate Function returning bool
     * @return callable Function that takes an array and returns a new filtered array
     */
    public static function filter(callable $predicate): callable
    {
        return fn(array $array): array => array_filter($array, $predicate);
    }

    /**
     * Create a function that reduces an array using an accumulator function.
     *
     * @param callable $function Reducer function
     * @param mixed $initial Initial value
     * @return callable Function that takes an array and returns the reduced value
     */
    public static function reduce(callable $function, mixed $initial = null): callable
    {
        return fn(array $array): mixed => array_reduce($array, $function, $initial);
    }

    /**
     * Create a function that returns a property from an object or array.
     *
     * @param string $property Property name
     * @return callable Function that takes an object/array and returns the property value
     */
    public static function prop(string $property): callable
    {
        return function (mixed $target) use ($property): mixed {
            if (is_array($target)) {
                return $target[$property] ?? null;
            }

            if (is_object($target)) {
                return $target->$property ?? null;
            }

            return null;
        };
    }

    /**
     * Create a function that checks if a value matches a predicate.
     *
     * @param callable $predicate Function returning bool
     * @return callable Function that returns bool
     */
    public static function where(callable $predicate): callable
    {
        return fn(mixed $value): bool => $predicate($value);
    }

    /**
     * Create a function that groups array elements by a key.
     *
     * @param callable|string $key Key function or property name
     * @return callable Function that takes an array and returns grouped array
     */
    public static function groupBy(callable|string $key): callable
    {
        $keyFn = is_callable($key) ? $key : self::prop($key);

        return function (array $array) use ($keyFn): array {
            $result = [];
            foreach ($array as $item) {
                $groupKey = $keyFn($item);
                if (!isset($result[$groupKey])) {
                    $result[$groupKey] = [];
                }
                $result[$groupKey][] = $item;
            }
            return $result;
        };
    }
}
