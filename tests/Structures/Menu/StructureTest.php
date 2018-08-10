<?php

namespace Betalabs\StructureHelper\Tests\Structures\Menu;

use Betalabs\StructureHelper\Structures\Menu\Structure;
use Betalabs\StructureHelper\Tests\Utils\MenuModel;
use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase
{
    public function testStructureWithoutSubMenu()
    {
        $menu = $this->getMockForAbstractClass(Structure::class);
        $menu->expects($this->once())
            ->method('label')
            ->willReturn('Test menu');
        $menu->expects($this->once())
            ->method('endpoint')
            ->willReturn('/api/test/menu');

        $this->assertEquals([
            'label' => 'Test menu',
            'endpoint' => '/api/test/menu',
            'submenu' => []
        ], $menu->toArray());
    }

    public function testStructureWithSubMenu()
    {
        $subMenu = $this->getMockForAbstractClass(Structure::class);
        $subMenu->expects($this->once())
            ->method('label')
            ->willReturn('Test sub-menu');
        $subMenu->expects($this->once())
            ->method('endpoint')
            ->willReturn('/api/test/sub-menu');

        $menu = $this->getMockBuilder(MenuModel::class)
            ->disableOriginalConstructor()
            ->setMethods(['submenu'])
            ->getMock();
        $menu->expects($this->once())
            ->method('submenu')
            ->willReturn([$subMenu]);

        $this->assertEquals($menu->toArray(), [
            'label' => 'Test menu',
            'endpoint' => '/api/test/menu',
            'submenu' => [
                [
                    'label' => 'Test sub-menu',
                    'endpoint' => '/api/test/sub-menu',
                    'submenu' => []
                ]
            ]

        ]);
    }
}
