<?php

namespace Betalabs\StructureHelper\Tests\Structures\ActionMenu\Action;

use Betalabs\StructureHelper\Structures\ActionMenu\Action\Structure;
use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase
{
    public function testStructure()
    {
        $actionMenu = $this->getMockForAbstractClass(Structure::class);
        $actionMenu->expects($this->once())
            ->method('label')
            ->willReturn('test action-menu');
        $actionMenu->expects($this->once())
            ->method('completeEndpoint')
            ->willReturn('/api/test/endpoint');
        $actionMenu->expects($this->once())
            ->method('endpoint')
            ->willReturn('http://engine.local/api/test/endpoint');

        $this->assertEquals(json_encode([
            'data' => [
                'label' => 'test action-menu',
                'complete_endpoint' => '/api/test/endpoint',
                'endpoint' => 'http://engine.local/api/test/endpoint',
                'http_method' => 'GET',
                'type' => 'ajax',
                'listing_url' => null
            ]
        ]), $actionMenu->toJson());
    }
}
