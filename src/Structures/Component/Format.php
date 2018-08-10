<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Enums\ExhibitionType;
use Illuminate\Contracts\Support\Arrayable;

class Format implements Arrayable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var \Betalabs\StructureHelper\Enums\ExhibitionType
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
     * @return \Betalabs\StructureHelper\Enums\ExhibitionType
     */
    public function getFormat(): ExhibitionType
    {
        return $this->format;
    }

    /**
     * Format constructor.
     *
     * @param string $field
     * @param \Betalabs\StructureHelper\Enums\ExhibitionType $format
     */
    public function __construct(string $field, ExhibitionType $format)
    {
        $this->field = $field;
        $this->format = $format;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function toArray(): array
    {
        return [$this->getField() => $this->getFormat()->getValue()];
    }
}