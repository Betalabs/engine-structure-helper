<?php

namespace Betalabs\StructureHelper\Structures\Component;


use Illuminate\Contracts\Support\Arrayable;

class Report implements Arrayable
{
    /**
     * @var string
     */
    private $label;
    /**
     * @var string
     */
    private $fields;
    /**
     * @var string
     */
    private $type;

    /**
     * Report constructor.
     * @param string $label
     * @param string $fields
     * @param string $type
     */
    public function __construct(string $label, string $fields, string $type)
    {
        $this->label = $label;
        $this->fields = $fields;
        $this->type = $type;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            $this->type => [
                'fields' => $this->fields,
                'label' => $this->label
            ]
        ];
    }
}