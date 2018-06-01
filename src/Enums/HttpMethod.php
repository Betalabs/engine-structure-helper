<?php

namespace Betalabs\StructureHelper\Enums;

use MyCLabs\Enum\Enum;

class HttpMethod extends Enum
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
}