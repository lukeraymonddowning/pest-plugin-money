<?php

use Brick\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

it('can determine correct money types', function () {
    useMoneyLibrary(Money::class);
    expect(Money::of(10, 'GBP'))->toBeMoney();
    expect('Hello World')->not->toBeMoney();
});

it('can determine correct money types for money', function () {
    useMoneyLibrary(\Money\Money::class);
    expect(\Money\Money::GBP(12000))->toBeMoney();
    expect('Hello World')->not->toBeMoney();
});
