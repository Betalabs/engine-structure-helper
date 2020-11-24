<?php

namespace Betalabs\StructureHelper\Entities;

use Illuminate\Support\Arr;
use InvalidArgumentException;
use Illuminate\Support\Collection;

abstract class EntityCollection extends Collection
{
    /**
     * Create a new collection.
     *
     * @param  mixed $items
     */
    public function __construct($items = [])
    {
        $this->removeEmptyItems($items);
        $this->validateCollectionType($items);
        parent::__construct($items ?? []);
    }

    /**
     * Push an item onto the end of the collection.
     *
     * @param  mixed $value
     *
     * @return void
     */
    public function push($value)
    {
        $this->validateType($value);
        parent::push($value);
    }

    /**
     * Add an item to the collection.
     *
     * @param  mixed $item
     *
     * @return \Betalabs\StructureHelper\Entities\EntityCollection
     */
    public function add($item): EntityCollection
    {
        $this->validateType($item);
        $this->items[] = $item;
        return $this;
    }

    /**
     * Create a collection by using this collection for keys and another for
     * its values.
     *
     * @param  mixed $values
     *
     * @return \Illuminate\Support\Collection
     */
    public function combine($values): Collection
    {
        $this->validateCollectionType($values);
        return parent::combine($values);
    }

    /**
     * Merge the collection with the given items.
     *
     * @param  array $items
     *
     * @return \Illuminate\Support\Collection
     */
    public function merge($items): Collection
    {
        $this->validateCollectionType($items);
        return parent::merge($items);
    }

    /**
     * Get the values of a given key.
     *
     * @param  string|array $value
     * @param  string|null $key
     *
     * @return \Illuminate\Support\Collection
     */
    public function pluck($value, $key = null): Collection
    {
        return new parent(Arr::pluck($this->items, $value, $key));
    }

    /**
     * Set the item at a given offset.
     *
     * @param  mixed $key
     * @param  mixed $value
     *
     * @return void
     */
    public function offsetSet($key, $value): void
    {
        $this->validateType($value);
        parent::offsetSet($key, $value);
    }

    /**
     * Run a map over each of the items.
     *
     * @param  callable $callback
     *
     * @return \Illuminate\Support\Collection
     */
    public function map(callable $callback): Collection
    {
        $keys = array_keys($this->items);
        $items = array_map($callback, $this->items, $keys);
        return new parent(array_combine($keys, $items));
    }

    /**
     * Validate if type value is entity type
     *
     * @param $value
     */
    protected function validateType($value): void
    {
        $entityType = $this->entityType();
        if (!$value instanceof $entityType) {
            $valueType = is_object($value) ? get_class($value) : gettype($value);
            $errorMessage = "A $entityType instance should be passed.";
            $errorMessage .= " $valueType was given.";
            throw new InvalidArgumentException($errorMessage);
        }
    }

    /**
     * Validate if collection's type is entity type
     *
     * @param array $items
     */
    protected function validateCollectionType(&$items): void
    {
        foreach ($items as $item) {
            $this->validateType($item);
        }
    }

    /**
     * Remove all null items from array
     *
     * @param $items
     */
    protected function removeEmptyItems(&$items): void
    {
        $items = array_filter($items, function ($item) {
            return null != $item;
        });
    }

    /**
     * Return the entity type string
     *
     * @return string
     */
    abstract protected function entityType(): string;
}