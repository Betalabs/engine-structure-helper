<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Contracts\Structurable;

class Format implements Structurable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var string
     */
    private $format;

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
     * Set the format property.
     *
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * Format constructor.
     *
     * @param string $field
     * @param string $format
     */
    public function __construct(string $field, string $format)
    {
        $this->field = $field;
        $this->format = $format;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [$this->getField() => $this->getFormat()];
    }
}