<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{

    public function testStructure()
    {
        $translation = new Translation('test', ['Test']);
        $this->assertEquals(['test' => ['Test']], $translation->structure());
    }
}
