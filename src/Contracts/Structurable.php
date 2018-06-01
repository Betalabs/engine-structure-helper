<?php

namespace Betalabs\StructureHelper\Interfaces;

interface Structurable
{
    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array;
}