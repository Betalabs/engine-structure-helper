<?php

namespace Betalabs\StructureHelper\Enums;

use MyCLabs\Enum\Enum;

class ActionType extends Enum
{
    const DELETE = 'delete';
    const SHOW = 'show';
    const UPDATE = 'update';
    const DOWNLOAD = 'download';
    const AJAX = 'ajax';
    const EXTRA_FORMS = 'extra-forms';
    const FOREIGN_ENTITY_CREATE = 'foreign-entity-create';
}