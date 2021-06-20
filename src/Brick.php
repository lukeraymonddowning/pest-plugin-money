<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use Brick\Money\Money;
use Lukeraymonddowning\PestPluginMoney\Contracts\ChecksMoney;
use Pest\Expectation;

/**
 * @implements ChecksMoney<Money>
 */
final class Brick implements ChecksMoney
{
    public function toBeMoney($expectation): Expectation
    {
        return $expectation->toBeInstanceOf(Money::class);
    }

    public function toCost($expectation, $amount, $currency): Expectation
    {
        return $expectation->toEqual($this->parseMoney($amount, $currency));
    }

    public function toCostMoreThan($expectation, $amount, $currency): Expectation
    {
        expect($expectation->value->isGreaterThan($this->parseMoney($amount, $currency)))->toBeTrue();

        return $expectation;
    }

    public function toCostLessThan($expectation, $amount, $currency): Expectation
    {
        expect($expectation->value->isLessThan($this->parseMoney($amount, $currency)))->toBeTrue();

        return $expectation;
    }

    private function parseMoney($amount, $currency)
    {
        if ($amount instanceof Money) {
            return $amount;
        }

        return Money::of($amount, $currency);
    }
}
