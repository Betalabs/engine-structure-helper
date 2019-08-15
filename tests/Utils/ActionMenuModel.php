<?php

namespace Betalabs\StructureHelper\Tests\Utils;

use Betalabs\StructureHelper\Structures\ActionMenu\Action\Structure;

class ActionMenuModel extends Structure
{
    /**
     * Menu label
     *
     * @return string
     */
    public function label(): string
    {
        return 'Test label';
    }

    /**
     * App endpoint
     *
     * @return string
     */
    public function endpoint(): string
    {
        return '/api/test/endpoint';
    }

    /**
     * Returns the complete endpoint
     *
     * @return string
     */
    public function completeEndpoint(): string
    {
        return 'http://engine.local/api/test/endpoint';
    }

    /**
     * Returns a custom listing url
     *
     * @return string
     */
    public function listingUrl(): ?string
    {
        return null;
    }
}