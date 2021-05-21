<?php

use Brick\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

it('can determine greater than values', function () {
    useMoneyLibrary(Money::class);
    expect(Money::of(100, 'GBP'))->toCostMoreThan(50, 'GBP');
    expect(Money::of(50, 'GBP'))->toCostMoreThan(49, 'GBP');
    expect(Money::of(100, 'GBP'))->not->toCostMoreThan(200, 'GBP');
});

it('can determine greater than values using money', function () {
    useMoneyLibrary(\Money\Money::class);
    expect(\Money\Money::GBP(10000))->toCostMoreThan(50, 'GBP');
    expect(\Money\Money::GBP(5000))->toCostMoreThan(49, 'GBP');
    expect(\Money\Money::GBP(10000))->not->toCostMoreThan(200, 'GBP');
});
