<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{

    public function testStructure()
    {
        $rule = new Rule('test', ['string']);
        $this->assertEquals(['test' => ['string']], $rule->structure());
    }
}
