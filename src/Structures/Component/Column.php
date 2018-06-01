<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Interfaces\Structurable;

class Column implements Structurable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var bool
     */
    private $creatable;
    /**
     * @var bool
     */
    private $editable;
    /**
     * @var bool
     */
    private $filterable;
    /**
     * @var bool
     */
    private $sortable;

    /**
     * Set the field property.
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Set the creatable property.
     *
     * @return bool
     */
    public function isCreatable(): bool
    {
        return $this->creatable;
    }

    /**
     * Set the editable property.
     *
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * Set the filterable property.
     *
     * @return bool
     */
    public function isFilterable(): bool
    {
        return $this->filterable;
    }

    /**
     * Set the sortable property.
     *
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable;
    }

    /**
     * Column constructor.
     *
     * @param string $field
     * @param bool $creatable
     * @param bool $editable
     * @param bool $filterable
     * @param bool $sortable
     */
    public function __construct(
        string $field,
        bool $creatable = false,
        bool $editable = false,
        bool $filterable = false,
        bool $sortable = false
    ) {
        $this->field = $field;
        $this->creatable = $creatable;
        $this->editable = $editable;
        $this->filterable = $filterable;
        $this->sortable = $sortable;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [
            'field' => $this->getField(),
            'creatable' => $this->isCreatable(),
            'editable' => $this->isEditable(),
            'filterable' => $this->isFilterable(),
            'sortable' => $this->isSortable()
        ];
    }
}