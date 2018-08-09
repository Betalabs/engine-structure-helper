<?php

namespace Betalabs\StructureHelper\Structures\ActionMenu\Menu;

use Betalabs\StructureHelper\Structures\ActionMenu\Action\Structure as Action;
use Betalabs\StructureHelper\Entities\EntityCollection;

abstract class Structure extends EntityCollection
{
    /**
     * Return the entity type string
     *
     * @return string
     */
    protected function entityType(): string
    {
        return Action::class;
    }

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