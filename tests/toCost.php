<?php

use Brick\Money\Money;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

beforeEach(function () {
    useMoneyLibrary(Money::class);
});

it('can equate money')
    ->expect(Money::of(100, 'GBP'))->toCost(100, 'GBP')
    ->expect(Money::of(10, 'GBP'))->not->toCost(100, 'GBP')
    ->expect('Hello World')->not->toCost(100, 'GBP')
    ->tap(function () { $this->useMoneyLibrary(\Money\Money::class); })
    ->expect(\Money\Money::GBP(10000))->toCost(100, 'GBP')
    ->tap(function () { $this->useMoneyLibrary(\Cknow\Money\Money::class); })
    ->expect(money(200, 'GBP'))->toCost(200, 'GBP')
    ->expect(\Cknow\Money\Money::GBP(340))->toCost(340, 'GBP');

it('accepts a money object')
    ->expect(Money::of(100, 'GBP'))->toCost(Money::of(100, 'GBP'))
    ->tap(function () { $this->useMoneyLibrary(\Money\Money::class); })
    ->expect(\Money\Money::GBP(10000))->toCost(\Money\Money::GBP(10000))
    ->tap(function () { $this->useMoneyLibrary(\Cknow\Money\Money::class); })
    ->expect(money(5000, 'GBP'))->toCost(\Cknow\Money\Money::GBP(5000))
    ->expect(\Cknow\Money\Money::GBP(10000))->toCost(\Cknow\Money\Money::GBP(10000));
