<?php


namespace Betalabs\StructureHelper\Structures\Component;


use Illuminate\Contracts\Support\Arrayable;

class With implements Arrayable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var array
     */
    private $with;

    /**
     * With constructor.
     * @param string $field
     * @param array $with
     */
    public function __construct(string $field, array $with)
    {
        $this->field = $field;
        $this->with = $with;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            $this->field => $this->with
        ];
    }
}