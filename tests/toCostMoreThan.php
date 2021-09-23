<?php

use Brick\Money\Money;

it('can determine greater than values')
    ->useMoneyLibrary(Money::class)
    ->expect(Money::of(100, 'GBP'))->toCostMoreThan(50, 'GBP')
    ->expect(Money::of(50, 'GBP'))->toCostMoreThan(49, 'GBP')
    ->expect(Money::of(100, 'GBP'))->not->toCostMoreThan(200, 'GBP');

it('can determine greater than values using money')
    ->useMoneyLibrary(\Money\Money::class)
    ->expect(\Money\Money::GBP(10000))->toCostMoreThan(50, 'GBP')
    ->expect(\Money\Money::GBP(5000))->toCostMoreThan(49, 'GBP')
    ->expect(\Money\Money::GBP(10000))->not->toCostMoreThan(200, 'GBP');

it('can determine greater than values using laravel money')
    ->useMoneyLibrary(\Cknow\Money\Money::class)
    ->expect(\money(100, 'GBP'))->toCostMoreThan(50, 'GBP')
    ->expect(\Cknow\Money\Money::GBP(100))->toCostMoreThan(50, 'GBP')
    ->expect(\money(50, 'GBP'))->toCostMoreThan(49, 'GBP')
    ->expect(\Cknow\Money\Money::GBP(50))->toCostMoreThan(49, 'GBP')
    ->expect(\money(100, 'GBP'))->not->toCostMoreThan(200, 'GBP')
    ->expect(\Cknow\Money\Money::GBP(100))->not->toCostMoreThan(200, 'GBP');
