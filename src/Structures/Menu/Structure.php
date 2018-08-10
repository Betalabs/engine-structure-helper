<?php

namespace Betalabs\StructureHelper\Structures\Menu;

use Betalabs\StructureHelper\Traits\Jsonable as JsonableTrait;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

abstract class Structure implements Jsonable, Arrayable
{
    use JsonableTrait;

    /**
     * Menu label
     *
     * @return string
     */
    abstract public function label(): string;

    /**
     * App endpoint
     *
     * @return string
     */
    abstract public function endpoint(): string;

    /**
     * Submenu
     *
     * @return \Betalabs\StructureHelper\Structures\Menu\Structure[]
     */
    public function submenu(): array
    {
        return [];
    }

    /**
     * Make a submenu
     *
     * @return array
     */
    private function makeSubmenu()
    {
        return array_map(function (Structure $menu) {
            return $menu->toArray();
        }, $this->submenu());
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label(),
            'endpoint' => $this->endpoint(),
            'submenu' => $this->makeSubmenu()
        ];
    }
}