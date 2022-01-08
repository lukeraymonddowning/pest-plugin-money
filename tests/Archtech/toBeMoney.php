<?php

use ArchTech\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

it('can determine correct money types for archtech', function () {
    useMoneyLibrary(Money::class);

    expect(money(12000, 'USD'))->toBeMoney()
        ->and('Hello World')->not->toBeMoney();
});
