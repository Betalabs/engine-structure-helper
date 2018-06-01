<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class SelectableTest extends TestCase
{

    public function testStructure()
    {
        $selectable = new Selectable('{test}');
        $this->assertEquals(
            ['exhibition' => '{test}'],
            $selectable->structure()
        );
    }
}
