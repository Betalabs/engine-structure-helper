<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class ColumnTest extends TestCase
{

    public function testStructure()
    {
        $column = new Column(
            'test',
            true,
            false,
            true,
            false
        );
        $this->assertEquals([
            'field' => 'test',
            'creatable' => true,
            'editable' => false,
            'filterable' => true,
            'sortable' => false,
        ], $column->toArray());
    }
}
