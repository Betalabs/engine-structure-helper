<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Interfaces\Structurable;

class Importable implements Structurable
{
    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [];
    }
}