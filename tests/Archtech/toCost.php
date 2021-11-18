<?php

use ArchTech\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

beforeEach(function () {
    useMoneyLibrary(Money::class);
});

it('can equate money', function () {
    expect(Money::fromDecimal(100, 'USD'))->toCost(100, 'USD')
        ->and(Money::fromDecimal(10, 'USD'))->not->toCost(100, 'USD')
        ->and('Hello World')->not->toCost(100, 'USD');
});

it('accepts a money object', function () {
    expect(Money::fromDecimal(100, 'USD'))->toCost(Money::fromDecimal(100, 'USD'));
});
