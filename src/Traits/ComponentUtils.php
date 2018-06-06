<?php

namespace Betalabs\StructureHelper\Traits;

use Betalabs\StructureHelper\Contracts\Structurable;

trait ComponentUtils
{
    /**
     * Make a component structure
     *
     * @param array $component
     *
     * @return array
     */
    private function component(array $component): array
    {
        return empty($component) ? []
            : array_merge(...$this->componentCollection($component));
    }

    /**
     * Make a component collection structure
     *
     * @param array $structure
     *
     * @return array
     */
    private function componentCollection(array $structure): array
    {
        return array_map(function (Structurable $arrayable) {
            return $arrayable->structure();
        }, $structure);
    }
}