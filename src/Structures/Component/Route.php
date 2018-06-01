<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Interfaces\Structurable;

class Route implements Structurable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var string
     */
    private $route;

    /**
     * Set the field property.
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Set the route property.
     *
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * Route constructor.
     *
     * @param string $field
     * @param string $route
     */
    public function __construct(string $field, string $route)
    {
        $this->field = $field;
        $this->route = $route;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [$this->getField() => $this->getRoute()];
    }
}