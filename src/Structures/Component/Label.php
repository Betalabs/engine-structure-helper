<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Interfaces\Structurable;

class Label implements Structurable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var string
     */
    private $label;

    /**
     * Return the index property.
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Return the label property.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Label constructor.
     *
     * @param string $field
     * @param string $label
     */
    public function __construct(string $field, string $label)
    {
        $this->field = $field;
        $this->label = $label;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [$this->getField() => $this->getLabel()];
    }
}