<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use Lukeraymonddowning\PestPluginMoney\Contracts\ChecksMoney;
use Cknow\Money\Money as MoneyObject;
use Pest\Expectation;

/**
 * @implements ChecksMoney<MoneyObject>
 */
final class LaravelMoney implements ChecksMoney
{
    public function toBeMoney($expectation): Expectation
    {
        return $expectation->toBeInstanceOf(MoneyObject::class);
    }

    public function toCost($expectation, $amount, $currency): Expectation
    {
        return $expectation->toEqual($this->parseMoney($amount, $currency));
    }

    public function toCostMoreThan($expectation, $amount, $currency): Expectation
    {
        expect($expectation->value->greaterThan($this->parseMoney($amount, $currency)))->toBeTrue();

        return $expectation;
    }

    public function toCostLessThan($expectation, $amount, $currency): Expectation
    {
        expect($expectation->value->lessThan($this->parseMoney($amount, $currency)))->toBeTrue();

        return $expectation;
    }

    private function parseMoney($amount, $currency)
    {
        if ($amount instanceof MoneyObject) {
            return $amount;
        }

        MoneyObject::setCurrencies([
            'iso' => [$currency]
        ]);

        return MoneyObject::parse((string) $amount, $currency);
    }
}
