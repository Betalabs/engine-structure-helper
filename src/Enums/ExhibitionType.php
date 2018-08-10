<?php

namespace Betalabs\StructureHelper\Enums;

use MyCLabs\Enum\Enum;

class ExhibitionType extends Enum
{
    const PERCENTAGE = 'percentage';
    const CURRENCY = 'currency';
    const PASSWORD = 'password';
    const DATE = 'date';
    const DATETIME = 'datetime';
    const DOCUMENT1 = 'document1';
    const NUMBER_4_DECIMALS = 'number_4_decimals';
    const NUMBER_STOCK_QUANTITY = 'number_stock_quantity';
    const CEP = 'cep';
    const TEXTAREA = 'textarea';
    const WYSIWYG = 'wysiwyg';
    const READONLY = 'readonly';
}