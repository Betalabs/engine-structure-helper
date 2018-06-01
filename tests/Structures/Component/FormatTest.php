<?php

namespace Betalabs\StructureHelper\Structures\Component;


use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{

    public function testStructure()
    {
        $format = new Format('test', 'document1');
        $this->assertEquals(['test' => 'document1'], $format->structure());
    }
}
