<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Enums\ExhibitionType;
use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{

    public function testStructure()
    {
        $format = new ExhibitionType(ExhibitionType::DOCUMENT1);
        $format = new Format('test', $format);
        $this->assertEquals(['test' => 'document1'], $format->structure());
    }
}
