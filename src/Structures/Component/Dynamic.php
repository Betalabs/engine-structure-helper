<?php

namespace Betalabs\StructureHelper\Structures\Component;


use Illuminate\Contracts\Support\Arrayable;

class Dynamic implements Arrayable
{
    /**
     * @var string
     */
    private $eventType;
    /**
     * @var string
     */
    private $structureEndpoint;
    /**
     * @var bool
     */
    private $concat;
    /**
     * @var string
     */
    private $field;

    /**
     * Dynamic constructor.
     * @param string $field
     * @param string $eventType
     * @param string $structureEndpoint
     * @param bool $concat
     */
    public function __construct(
        string $field,
        string $eventType,
        string $structureEndpoint,
        bool $concat
    ) {
        $this->eventType = $eventType;
        $this->structureEndpoint = $structureEndpoint;
        $this->concat = $concat;
        $this->field = $field;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            $this->field => [
                'event_type' => $this->eventType,
                'structure_endpoint' => $this->structureEndpoint,
                'concat' => $this->concat,
            ]
        ];
    }
}