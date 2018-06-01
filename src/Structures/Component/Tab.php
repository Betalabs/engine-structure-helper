<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Interfaces\Structurable;

class Tab implements Structurable
{
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
    private $fields = [];

    /**
     * Tab constructor.
     *
     * @param string $identification
     * @param string $label
     * @param array $fields
     */
    public function __construct(
        string $identification,
        string $label,
        array $fields
    ) {
        $this->identification = $identification;
        $this->label = $label;
        $this->fields = $fields;
    }

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
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [
            'identification' => $this->getIdentification(),
            'label' => $this->getLabel(),
            'fields' => $this->getFields(),
        ];
    }
}