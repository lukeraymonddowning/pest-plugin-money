<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use InvalidArgumentException;

final class MoneyFactory
{
    public static function make()
    {
        if ($GLOBALS['pestMoneyLibrary'] == \Brick\Money\Money::class) {
            return new Brick();
        }

        if ($GLOBALS['pestMoneyLibrary'] == \Money\Money::class) {
            return new Money();
        }

        throw new InvalidArgumentException($GLOBALS['pestMoneyLibrary'] . ' is not a supported money library.');
    }
}
