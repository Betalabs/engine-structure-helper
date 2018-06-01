<?php

namespace Betalabs\StructureHelper\Tests\Structures\Component;

use Betalabs\StructureHelper\Structures\Component\Box;
use Betalabs\StructureHelper\Structures\Component\Tab;
use PHPUnit\Framework\TestCase;

class BoxTest extends TestCase
{

    public function testStructureWithoutTabs()
    {
        $box = new Box('test-box', 'Test Box', ['test']);

        $this->assertEquals([
            'fields' => ['test'],
            'identification' => 'test-box',
            'label' => 'Test Box',
            'tabs' => []
        ], $box->structure());
    }

    public function testStructureWithTabs()
    {
        $tab = new Tab('tab', 'Tab', ['test']);
        $box = new Box(
            'test-box',
            'Test Box',
            ['test'],
            [$tab]
        );
        $this->assertEquals([
            'fields' => ['test'],
            'identification' => 'test-box',
            'label' => 'Test Box',
            'tabs' => [
                [
                    'identification' => 'tab',
                    'label' => 'Tab',
                    'fields' => ['test'],
                ]
            ]
        ], $box->structure());
    }
}
