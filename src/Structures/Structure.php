<?php

namespace Betalabs\StructureHelper\Structures;

use Betalabs\StructureHelper\Structures\Component\Box;
use Betalabs\StructureHelper\Traits\Jsonable as JsonableTrait;
use Illuminate\Contracts\Support\Jsonable;
use Betalabs\StructureHelper\Contracts\Structurable;
use Betalabs\StructureHelper\Traits\ComponentUtils;

abstract class Structure implements Jsonable, Structurable
{
    use JsonableTrait, ComponentUtils;

    /**
     * @var string
     */
    protected $translationPath = __DIR__ . '/../../resources/lang';
    /**
     * @var string
     */
    protected $translationLocale = 'en';

    /**
     * Fields labels
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Label[]
     */
    public function labels(): array
    {
        return [];
    }

    /**
     * Returns translated content from select, radios and any other values
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Translation[]
     */
    public function translations(): array
    {
        return [];
    }

    /**
     * Validation rules
     *
     * An array with all validation rules in Laravel Validation format.
     *
     * There is a difference between Laravel Validation exists rule and the
     * expected exists rule in this structure. In Laravel Validation the exits
     * rule must match the table name, in the structure the API is expected.
     *
     * For example: exists:nfe_ncms,id is the Laravel Validation rule, in
     * this structure it must be exists:nfe-ncms,id. The nfe-ncms is the route
     * to NfeNcm model.
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Rule[]
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * All validation messages
     *
     * @return array
     */
    public function validations(): array
    {
        return empty($this->rules()) ? []
            : (new Validation(
                $this->translationPath,
                $this->translationLocale
            ))->allMessages($this->rules());
    }

    /**
     * Relations routes
     *
     * Provide all relations routes with id and identified name for form
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Route[]
     */
    public function routes(): array
    {
        return [];
    }

    /**
     * Formatting fields from exhibition types
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Format[]
     */
    public function formats(): array
    {
        return [];
    }

    /**
     * Structure expected for selects
     *
     * This structure expects an array with a single position: exhibition. It
     * must be a string. The variables must be between brackets, the rest of
     * the string is considered as it is.
     *
     * For instance:
     * [
     *      'exhibition' => '{name} - {description}'
     * ]
     *
     * So if there is a record like: name = 'Beta' and description = 'Labs'
     * the exhibition will be: 'Beta - Labs'.
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Selectable[]
     */
    public function selectable(): array
    {
        return [];
    }

    /**
     * Returns extra forms to be rendered with specific
     * layer like modals or popups
     *
     * @return \Betalabs\StructureHelper\Structures\Component\ExtraForm[]
     */
    public function extraForms(): array
    {
        return [];
    }

    /**
     * Columns available for import process
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Importable[]
     */
    public function importable(): array
    {
        return [];
    }

    /**
     * Layout boxes for better organization
     *
     * @return \Betalabs\StructureHelper\structures\Component\Box[]
     */
    public function boxes(): array
    {
        return [
            new Box(
                'default',
                'Default',
                array_keys($this->component($this->rules()))
            )
        ];
    }

    /**
     * Columns available for listing
     *
     * @return \Betalabs\StructureHelper\structures\Component\Column[]
     */
    public function columns(): array
    {
        return [];
    }

    /**
     * Make a menu
     *
     * @return array
     */
    public function structure(): array
    {
        return [
            'labels' => $this->component($this->labels()),
            'translations' => $this->component($this->translations()),
            'rules' => $this->component($this->rules()),
            'validations' => $this->validations(),
            'routes' => $this->component($this->routes()),
            'formats' => $this->component($this->formats()),
            'selectable' => $this->component($this->selectable()),
            'importable' => $this->component($this->importable()),
            'extra_forms' => $this->componentCollection($this->extraForms()),
            'boxes' => $this->componentCollection($this->boxes()),
            'columns' => $this->componentCollection($this->columns()),
        ];
    }
}