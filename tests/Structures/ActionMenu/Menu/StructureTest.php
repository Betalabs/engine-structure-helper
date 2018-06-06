<?php

namespace Betalabs\StructureHelper\Tests\Structures\ActionMenu\Menu;

use Betalabs\StructureHelper\Structures\ActionMenu\Menu\Structure;
use Betalabs\StructureHelper\Structures\ActionMenu\Action\Structure as ActionStructure;
use Betalabs\StructureHelper\Tests\Utils\ActionMenuModel;
use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase
{
    public function testStructure()
    {
        $menu = $this->getMockForAbstractClass(Structure::class);
        $menu->expects($this->once())
            ->method('entityType')
            ->willReturn(ActionStructure::class);

        $menu->add(new ActionMenuModel());
        $this->assertInstanceOf(ActionMenuModel::class, $menu->toArray()[0]);
    }
}
