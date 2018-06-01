<?php

namespace Betalabs\StructureHelper\Structures\ActionMenu\Menu;

use Betalabs\StructureHelper\Entities\EntityCollection;

abstract class Structure extends EntityCollection
{
    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return \json_encode(['data' => $this->toArray()], $options);
    }
}