<?php

namespace Betalabs\StructureHelper\Structures\Component;

use Betalabs\StructureHelper\Interfaces\Structurable;

class ExtraForm implements Structurable
{
    /**
     * @var string
     */
    public $identification;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $structureUri;
    /**
     * @var string
     */
    public $action;
    /**
     * @var string
     */
    public $redirect;

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
     * Set the type property.
     *
     * @return string|null
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the structureUri property.
     *
     * @return string|null
     */
    public function getStructureUri(): string
    {
        return $this->structureUri;
    }

    /**
     * Set the action property.
     *
     * @return string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * Set the redirect property.
     *
     * @return string
     */
    public function getRedirect(): ?string
    {
        return $this->redirect;
    }

    /**
     * ExtraFormStructure constructor.
     *
     * @param string $identification
     * @param string $label
     * @param string $type
     * @param string $structureUri
     * @param string $action
     * @param string $redirect
     */
    public function __construct(
        string $identification,
        string $label,
        string $type,
        string $structureUri,
        string $action = null,
        string $redirect = null
    ) {
        $this->identification = $identification;
        $this->label = $label;
        $this->type = $type;
        $this->structureUri = $structureUri;
        $this->action = $action;
        $this->redirect = $redirect;
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
            'type' => $this->getType(),
            'structure' => $this->getStructureUri(),
            'action' => $this->getAction(),
            'redirect' => $this->getRedirect()
        ];
    }
}