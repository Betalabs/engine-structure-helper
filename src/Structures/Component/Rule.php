<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Contracts\Structurable;

class Rule implements Structurable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var array
     */
    private $rules = [];

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
     * Set the rules property.
     *
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * Rule constructor.
     *
     * @param string $field
     * @param array $rules
     */
    public function __construct(string $field, array $rules)
    {
        $this->field = $field;
        $this->rules = $rules;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function structure(): array
    {
        return [$this->getField() => $this->getRules()];
    }
}