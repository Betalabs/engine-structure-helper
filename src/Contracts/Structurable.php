<?php

namespace Betalabs\StructureHelper\Contracts;

interface Structurable
{
    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array;
}