<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Illuminate\Contracts\Support\Arrayable;

class Hint implements Arrayable
{
    /** @var string */
    private $message;

    /**
     * @var string
     */
    private $field;

    /**
     * @param string $message
     */
    public function __construct(
        string $field,
        string $message
    ) {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Return the index property.
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $message
     * @return Hint
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array
    {
        return [$this->getField() => $this->getMessage()];
    }
}
