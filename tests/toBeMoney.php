<?php

use Brick\Money\Money;

it('can determine correct money types')
    ->expect(Money::of(10, 'GBP'))->toBeMoney()
    ->and('Hello World')->not->toBeMoney();

it('can determine correct money types for money')
    ->useMoneyLibrary(\Money\Money::class)
    ->expect(\Money\Money::GBP(12000))->toBeMoney()
    ->and('Hello World')->not->toBeMoney();
