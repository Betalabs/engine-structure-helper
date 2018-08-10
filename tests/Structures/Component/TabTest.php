<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class TabTest extends TestCase
{

    public function testStructure()
    {
        $tab = new Tab('test-tab', 'Test Tab', ['test']);
        $this->assertEquals([
            'identification' => 'test-tab',
            'label' => 'Test Tab',
            'fields' => ['test']
        ], $tab->toArray());
    }
}
