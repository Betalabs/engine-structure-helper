<?php

namespace Betalabs\StructureHelper\Structures\ActionMenu\Action;

use Betalabs\StructureHelper\Traits\Jsonable as JsonableTrait;
use Betalabs\StructureHelper\Enums\HttpMethod;
use Betalabs\StructureHelper\Enums\ActionType;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

abstract class Structure implements Jsonable, Arrayable
{
    use JsonableTrait;

    /**
     * Menu label
     *
     * @return string
     */
    abstract public function label(): string;

    /**
     * App endpoint
     *
     * @return string
     */
    abstract public function endpoint(): string;

    /**
     * Returns the complete endpoint
     *
     * @return string
     */
    abstract public function completeEndpoint(): string;

    /**
     * Returns a custom listing url
     *
     * @return string
     */
    abstract public function redirectUrl(): ?string;

    /**
     * Http request method
     *
     * @return \Betalabs\StructureHelper\Enums\HttpMethod
     */
    public function httpMethod(): HttpMethod
    {
        return new HttpMethod(HttpMethod::GET);
    }

    /**
     * Request type
     *
     * @return \Betalabs\StructureHelper\Enums\ActionType
     */
    public function type(): ActionType
    {
        return new ActionType(ActionType::AJAX);
    }

    /**
     * Build a structure
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label(),
            'complete_endpoint' => $this->completeEndpoint(),
            'endpoint' => $this->endpoint(),
            'http_method' => $this->httpMethod()->getValue(),
            'type' => $this->type(),
            'redirect_url' => $this->redirectUrl()
        ];
    }
}

