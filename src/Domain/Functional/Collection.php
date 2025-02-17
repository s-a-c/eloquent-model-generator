<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Functional;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

/**
 * Immutable collection implementation that provides functional programming
 * operations while maintaining immutability and type safety.
 *
 * @template T
 * @implements ArrayAccess<int|string, T>
 * @implements IteratorAggregate<int|string, T>
 */
final class Collection implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    /**
     * @param array<int|string, T> $items
     */
    private function __construct(
        private readonly array $items
    ) {
    }

    /**
     * Create a new collection instance.
     *
     * @template TNew
     * @param array<int|string, TNew> $items
     * @return self<TNew>
     */
    public static function of(array $items): self
    {
        return new self($items);
    }

    /**
     * Create an empty collection.
     *
     * @template TNew
     * @return self<TNew>
     */
    public static function empty(): self
    {
        return new self([]);
    }

    /**
     * Map over the collection's items.
     *
     * @template TReturn
     * @param callable(T): TReturn $callback
     * @return self<TReturn>
     */
    public function map(callable $callback): self
    {
        return new self(array_map($callback, $this->items));
    }

    /**
     * Filter the collection's items.
     *
     * @param callable(T): bool $callback
     * @return self<T>
     */
    public function filter(callable $callback): self
    {
        return new self(array_filter($this->items, $callback));
    }

    /**
     * Reduce the collection to a single value.
     *
     * @template TReturn
     * @param callable(TReturn, T): TReturn $callback
     * @param TReturn $initial
     * @return TReturn
     */
    public function reduce(callable $callback, mixed $initial = null): mixed
    {
        return array_reduce($this->items, $callback, $initial);
    }

    /**
     * Get the first item in the collection.
     *
     * @return T|null
     */
    public function first(): mixed
    {
        if (empty($this->items)) {
            return null;
        }

        return reset($this->items);
    }

    /**
     * Get the last item in the collection.
     *
     * @return T|null
     */
    public function last(): mixed
    {
        if (empty($this->items)) {
            return null;
        }

        return end($this->items);
    }

    /**
     * Get all items as an array.
     *
     * @return array<int|string, T>
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * Check if the collection contains an item.
     *
     * @param callable(T): bool|T $value
     */
    public function contains(mixed $value): bool
    {
        if (is_callable($value)) {
            return !empty(array_filter($this->items, $value));
        }

        return in_array($value, $this->items, true);
    }

    /**
     * Get the collection size.
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Check if the collection is empty.
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * Get an item at the specified offset.
     *
     * @param int|string $offset
     * @return T|null
     */
    public function get(int|string $offset): mixed
    {
        return $this->items[$offset] ?? null;
    }

    /**
     * Create a new collection with the item added.
     *
     * @param T $item
     * @param int|string|null $key
     * @return self<T>
     */
    public function with(mixed $item, int|string|null $key = null): self
    {
        if ($key === null) {
            return new self([...$this->items, $item]);
        }

        return new self([...$this->items, $key => $item]);
    }

    /**
     * Create a new collection without the specified key.
     *
     * @param int|string $key
     * @return self<T>
     */
    public function without(int|string $key): self
    {
        $items = $this->items;
        unset($items[$key]);
        return new self($items);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    /**
     * {@inheritDoc}
     *
     * @return T|null
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset] ?? null;
    }

    /**
     * {@inheritDoc}
     * @throws \RuntimeException Collections are immutable
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * {@inheritDoc}
     * @throws \RuntimeException Collections are immutable
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * {@inheritDoc}
     *
     * @return array<int|string, T>
     */
    public function jsonSerialize(): array
    {
        return $this->items;
    }
}
