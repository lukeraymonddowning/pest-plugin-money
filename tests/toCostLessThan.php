<?php

use Brick\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

it('can determine less than values', function () {
    useMoneyLibrary(Money::class);
    expect(Money::of(50, 'GBP'))->toCostLessThan(100, 'GBP');
    expect(Money::of(49, 'GBP'))->toCostLessThan(50, 'GBP');
    expect(Money::of(200, 'GBP'))->not->toCostLessThan(100, 'GBP');
});

it('can determine less than values using money', function () {
    useMoneyLibrary(\Money\Money::class);
    expect(\Money\Money::GBP(5000))->toCostLessThan(100, 'GBP');
    expect(\Money\Money::GBP(4900))->toCostLessThan(50, 'GBP');
    expect(\Money\Money::GBP(20000))->not->toCostLessThan(100, 'GBP');
});
