<?php

namespace Betalabs\StructureHelper\Structures\Component;

use PHPUnit\Framework\TestCase;

class ExtraFormTest extends TestCase
{

    public function testStructure()
    {
        $extraForm = new ExtraForm(
            'test',
            'Test',
            'action-menu',
            '/api/test-extra-forms/structure'
        );
        $this->assertEquals([
            'identification' => 'test',
            'label' => 'Test',
            'type' => 'action-menu',
            'structure' => '/api/test-extra-forms/structure',
            'action' => null,
            'redirect' => null,
        ], $extraForm->toArray());
    }
}
