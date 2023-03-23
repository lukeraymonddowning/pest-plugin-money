<?php

use ArchTech\Money\Money;

use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

beforeEach(function () {
    useMoneyLibrary(Money::class);
});

it('can determine greater than values', function () {
    expect(Money::fromDecimal(100, 'USD'))->toCostMoreThan(50, 'USD')
        ->and(Money::fromDecimal(50, 'USD'))->toCostMoreThan(49, 'USD')
        ->and(Money::fromDecimal(100, 'USD'))->not->toCostMoreThan(200, 'USD');
});
