<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Illuminate\Contracts\Support\Arrayable;

class Selectable implements Arrayable
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
    public function toArray(): array
    {
        return ['exhibition' => $this->getExhibition()];
    }
}