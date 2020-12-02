<?php

namespace Betalabs\StructureHelper\Enums;

use MyCLabs\Enum\Enum;

class ActionType extends Enum
{
    const SHOW = 'show';
    const UPDATE = 'update';
    const DELETE = 'delete';
    const EXPORT = 'export';
    const REDIRECT = 'redirect';
    const REDIRECT_BLANK = 'redirect-blank';
    const RELOAD = 'reload';
    const CUSTOM = 'custom';
    const AJAX = 'ajax';
    const AJAX_AND_REDIRECT = 'ajax-and-redirect';
    const TAGGING = 'tagging';
    const UNTAGGING = 'untagging';
    const HREF = 'href';
    const HREF_BLANK = 'href-blank';
    const MANAGE_INVENTORY = 'manage-inventory';
    const EXTRA_FORM = 'extra-form';
    const EXPORT_CONTRACT = 'export-contract';
    const RELATION_EXPORT = 'relation-export';
}
