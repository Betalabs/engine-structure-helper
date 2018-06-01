<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Structures\Structure;

class Selectable extends Structure
{
    /**
     * @var string
     */
    private $exhibition;

    /**
     * Selectable constructor.
     *
     * @param string $exhibition
     */
    public function __construct(string $exhibition)
    {
        $this->exhibition = $exhibition;
    }

    /**
     * Set the exhibition property.
     *
     * @return string
     */
    public function getExhibition(): string
    {
        return $this->exhibition;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return ['exhibition' => $this->getExhibition()];
    }
}