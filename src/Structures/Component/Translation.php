<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Illuminate\Contracts\Support\Arrayable;

class Translation implements Arrayable
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var array
     */
    private $translations = [];

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
     * Set the translations property.
     *
     * @return array
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * Translation constructor.
     *
     * @param string $field
     * @param array $translations
     */
    public function __construct(string $field, array $translations)
    {
        $this->field = $field;
        $this->translations = $translations;
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function toArray(): array
    {
        return [$this->getField() => $this->getTranslations()];
    }
}