<?php

use ArchTech\Money\Money;

use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

beforeEach(function () {
    useMoneyLibrary(Money::class);
});

it('can determine less than values', function () {
    expect(Money::fromDecimal(50, 'USD'))->toCostLessThan(100, 'USD')
        ->and(Money::fromDecimal(49, 'USD'))->toCostLessThan(50, 'USD')
        ->and(Money::fromDecimal(200, 'USD'))->not->toCostLessThan(100, 'USD');
});
