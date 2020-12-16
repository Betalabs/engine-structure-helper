<?php

namespace Betalabs\StructureHelper\Enums;

use MyCLabs\Enum\Enum;

class ExhibitionType extends Enum
{
    const PERCENTAGE = 'percentage';
    const CURRENCY = 'currency';
    const HIDDEN = 'hidden';
    const PASSWORD = 'password';
    const DATE = 'date';
    const DATETIME = 'datetime';
    const TIME = 'time';
    const DOCUMENT1 = 'document1';
    const NUMBER_4_DECIMALS = 'number_4_decimals';
    const NUMBER_STOCK_QUANTITY = 'number_stock_quantity';
    const CEP = 'cep';
    const WYSIWYG = 'wysiwyg';
    const READONLY = 'readonly';
    const UNOVERRIDE = 'unoverride';
    const OPTION_SETTER = 'option_setter';
    const DISABLED_UPDATE = 'disabled:update';
    const HIDE_ON_SHOW = 'hide_on:show';
    const DISCRETE_NUMBER = 'discrete_number';

}