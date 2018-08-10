<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{

    public function testStructure()
    {
        $route = new Route('test', '/api/test');
        $this->assertEquals(['test' => '/api/test'], $route->toArray());
    }
}
