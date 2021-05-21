<?php

use Brick\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

beforeEach(function () {
    useMoneyLibrary(Money::class);
});

it('can equate money', function () {
    expect(Money::of(100, 'GBP'))->toCost(100, 'GBP');
    expect(Money::of(10, 'GBP'))->not->toCost(100, 'GBP');
    expect('Hello World')->not->toCost(100, 'GBP');

    useMoneyLibrary(\Money\Money::class);
    expect(\Money\Money::GBP(10000))->toCost(100, 'GBP');
});

it('accepts a money object', function () {
    expect(Money::of(100, 'GBP'))->toCost(Money::of(100, 'GBP'));

    useMoneyLibrary(\Money\Money::class);
    expect(\Money\Money::GBP(10000))->toCost(\Money\Money::GBP(10000));
});
