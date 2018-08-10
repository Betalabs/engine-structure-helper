<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Contracts\Structurable;
use Betalabs\StructureHelper\Enums\ExhibitionType;

class Format implements Structurable
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
    public function structure(): array
    {
        return [$this->getField() => $this->getFormat()->getValue()];
    }
}