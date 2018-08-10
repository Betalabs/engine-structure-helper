<?php

namespace Betalabs\StructureHelper\Structures\Component;


use Illuminate\Contracts\Support\Arrayable;

class Importable implements Arrayable
{
    /**
     * Build a structure
     *
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}