<?php

namespace Betalabs\StructureHelper\Tests\Structures;

use Betalabs\StructureHelper\Enums\ExhibitionType;
use Betalabs\StructureHelper\Structures\Component\Column;
use Betalabs\StructureHelper\Structures\Component\ExtraForm;
use Betalabs\StructureHelper\Structures\Component\Format;
use Betalabs\StructureHelper\Structures\Component\Label;
use Betalabs\StructureHelper\Structures\Component\Route;
use Betalabs\StructureHelper\Structures\Component\Rule;
use Betalabs\StructureHelper\Structures\Component\Selectable;
use Betalabs\StructureHelper\Structures\Component\Translation;
use Betalabs\StructureHelper\Tests\Utils\StructureModel;
use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase
{
    public function testStructure()
    {
        $structureArray = [
            'labels' => [
                'test' => 'Test',
                'test2' => 'Test 2',
            ],
            'translations' => [
                'test' => ['Teste'],
                'test2' => ['Teste 2'],
            ],
            'rules' => [
                'test' => ['string', 'required'],
                'test2' => ['string'],
            ],
            'validations' => [
                'test' => [
                    'string' => 'The test must be a string.',
                    'required' => 'The test field is required.',
                ],
                'test2' => [
                    'string' => 'The test2 must be a string.',
                ],
            ],
            'routes' => [
                'test' => '/api/test',
                'test2' => '/api/test2',
            ],
            'formats' => [
                'test' => 'document1',
                'test2' => 'document1',
            ],
            'selectable' => [
                'exhibition' => '{test}',
            ],
            'importable' => [],
            'extra_forms' => [
                [
                    'identification' => 'test-form',
                    'label' => 'Test',
                    'type' => 'action-menu',
                    'structure' => '/api/test-extraform/structure',
                    'action' => null,
                    'redirect' => null,
                ],
                [
                    'identification' => 'test2-form',
                    'label' => 'Test 2',
                    'type' => 'action-menu',
                    'structure' => '/api/test2-extraform/structure',
                    'action' => null,
                    'redirect' => null,
                ],
            ],
            'boxes' => [
                [
                    "fields" => [
                        "test",
                        "test2",
                    ],
                    "identification" => "default",
                    "label" => "Default",
                    "tabs" => [],
                ],
            ],
            'columns' => [
                [
                    'field' => 'test',
                    'creatable' => false,
                    'editable' => false,
                    'filterable' => false,
                    'sortable' => false,
                ],
                [
                    'field' => 'test2',
                    'creatable' => false,
                    'editable' => false,
                    'filterable' => true,
                    'sortable' => true,
                ],
            ],
        ];
        $structure = $this->mockStructure();
        $this->assertEquals($structureArray, $structure->structure());
    }

    private function mockStructure()
    {
        $structure = $this->getMockBuilder(StructureModel::class)
            ->setMethods([
                'labels',
                'translations',
                'rules',
                'routes',
                'formats',
                'selectable',
                'extraForms',
                'columns',
            ])
            ->getMock();
        $structure->expects($this->once())
            ->method('labels')
            ->willReturn([
                new Label('test', 'Test'),
                new Label('test2', 'Test 2'),
            ]);
        $structure->expects($this->once())
            ->method('translations')
            ->willReturn([
                new Translation('test', ['Teste']),
                new Translation('test2', ['Teste 2']),
            ]);
        $structure->expects($this->any())
            ->method('rules')
            ->willReturn([
                new Rule('test', ['string', 'required']),
                new Rule('test2', ['string']),
            ]);
        $structure->expects($this->once())
            ->method('routes')
            ->willReturn([
                new Route('test', '/api/test'),
                new Route('test2', '/api/test2'),
            ]);
        $structure->expects($this->once())
            ->method('formats')
            ->willReturn([
                new Format('test', new ExhibitionType(ExhibitionType::DOCUMENT1)),
                new Format('test2', new ExhibitionType(ExhibitionType::DOCUMENT1)),
            ]);
        $structure->expects($this->once())
            ->method('selectable')
            ->willReturn([
                new Selectable('{test}'),
            ]);
        $structure->expects($this->once())
            ->method('extraForms')
            ->willReturn([
                new ExtraForm(
                    'test-form',
                    'Test',
                    'action-menu',
                    '/api/test-extraform/structure'
                ),
                new ExtraForm(
                    'test2-form',
                    'Test 2',
                    'action-menu',
                    '/api/test2-extraform/structure'
                ),
            ]);
        $structure->expects($this->once())
            ->method('columns')
            ->willReturn([
                new Column('test'),
                new Column(
                    'test2',
                    false,
                    false,
                    true,
                    true
                ),
            ]);

        return $structure;
    }
}
