<?php

namespace Betalabs\StructureHelper\Tests\Structures\Component;

use Betalabs\StructureHelper\Structures\Component\Label;
use PHPUnit\Framework\TestCase;

class LabelTest extends TestCase
{

    public function testStructure()
    {
        $label = new Label('test', 'Test');
        $this->assertEquals(['test' => 'Test'], $label->structure());
    }
}
