<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use Lukeraymonddowning\PestPluginMoney\Contracts\ChecksMoney;

/**
 * @internal
 */
final class MoneyFactory
{
    private static $map = [
        \Brick\Money\Money::class    => Brick::class,
        \Money\Money::class          => Money::class,
        \ArchTech\Money\Money::class => Archtech::class,
    ];

    public static function make(): ChecksMoney
    {
        if (key_exists('pestMoneyLibrary', $GLOBALS)) {
            return new static::$map[$GLOBALS['pestMoneyLibrary']]();
        }

        if (class_exists(\Brick\Money\Money::class)) {
            return new Brick();
        }

        if (class_exists(\Money\Money::class)) {
            return new Money();
        }

        if (class_exists(\ArchTech\Money\Money::class)) {
            return new Archtech();
        }

        throw new \InvalidArgumentException('You don\'t have a supported Money library installed!');
    }
}
