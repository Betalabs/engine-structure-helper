<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Traits\ComponentUtils;
use Illuminate\Contracts\Support\Arrayable;

class Box implements Arrayable
{
    use ComponentUtils;

    /**
     * @var string
     */
    private $identification;
    /**
     * @var string
     */
    private $label;
    /**
     * @var array
     */
    private $fields;
    /**
     * @var array
     */
    private $tabs = [];

    /**
     * Set the identification property.
     *
     * @return string
     */
    public function getIdentification(): string
    {
        return $this->identification;
    }

    /**
     * Set the label property.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Set the fields property.
     *
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Set the tabs property.
     *
     * @return \Betalabs\StructureHelper\Structures\Component\Tab[]
     */
    public function getTabs(): array
    {
        return $this->tabs;
    }

    /**
     * Box constructor.
     *
     * @param string $identification
     * @param string $label
     * @param array $fields
     * @param array $tabs
     */
    public function __construct(
        string $identification,
        string $label,
        array $fields,
        array $tabs = []
    ) {
        $this->identification = $identification;
        $this->label = $label;
        $this->fields = $fields;
        $this->tabs = $tabs;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fields' => $this->getFields(),
            'identification' => $this->getIdentification(),
            'label' => $this->getLabel(),
            'tabs' => $this->componentCollection($this->getTabs()),
        ];
    }
}