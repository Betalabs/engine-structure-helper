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
     * @var array
     */
    private $formats = [];

    /**
     * @var array
     */
    private $subBoxes = [];



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
     * @return array
     */
    public function getFormats(): array
    {
        return $this->formats;
    }

    /**
     * @param array $formats
     */
    public function setFormats(array $formats)
    {
        $this->formats = $formats;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubBoxes()
    {
        return $this->subBoxes;
    }

    /**
     * @param array $subBoxes
     * @return $this
     */
    public function setSubBoxes(array $subBoxes)
    {
        $this->subBoxes = $subBoxes;
        return $this;
    }

    /**
     * Box constructor.
     *
     * @param string $identification
     * @param string $label
     * @param array $fields
     * @param array $tabs
     * @param array $formats
     */
    public function __construct(
        string $identification,
        string $label,
        array $fields,
        array $tabs = [],
        array $formats = []
    ) {
        $this->identification = $identification;
        $this->label = $label;
        $this->fields = $fields;
        $this->tabs = $tabs;
        $this->formats = $formats;
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
            'formats' => $this->getFormats(),
        ];
    }
}