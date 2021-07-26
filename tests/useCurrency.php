<?php

use Brick\Money\Money;

it('can set the currency')
    ->useMoneyLibrary(Money::class)
    ->tap(function () { $this->useCurrency('GBP'); })
    ->expect(Money::of(100, 'GBP'))->toCost(100)
    ->expect(Money::of(100, 'GBP'))->toCostLessThan(150)
    ->expect(Money::of(100, 'GBP'))->toCostMoreThan(50)
    ->tap(function () { $this->useCurrency('USD'); })
    ->expect(Money::of(100, 'USD'))->toCost(100);

it('can set the currency using money')
    ->useMoneyLibrary(\Money\Money::class)
    ->tap(function () { $this->useCurrency('GBP'); })
    ->expect(\Money\Money::GBP(10000))->toCost(100)
    ->expect(\Money\Money::GBP(10000))->toCostLessThan(150)
    ->expect(\Money\Money::GBP(10000))->toCostMoreThan(50)
    ->tap(function () { $this->useCurrency('USD'); })
    ->expect(\Money\Money::USD(10000))->toCost(100);
