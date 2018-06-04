<?php

namespace Betalabs\StructureHelper\Tests\Utils;

use Betalabs\StructureHelper\Structures\Menu\Structure;

class MenuModel extends Structure
{
    /**
     * Menu label
     *
     * @return string
     */
    public function label(): string
    {
        return 'Test menu';
    }

    /**
     * App endpoint
     *
     * @return string
     */
    public function endpoint(): string
    {
        return '/api/test/menu';
    }
}