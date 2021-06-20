<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use Lukeraymonddowning\PestPluginMoney\Contracts\ChecksMoney;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Money as MoneyObject;
use Money\Parser\DecimalMoneyParser;
use Pest\Expectation;

/**
 * @implements ChecksMoney<MoneyObject>
 */
final class Money implements ChecksMoney
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

        $currencies  = new ISOCurrencies();
        $moneyParser = new DecimalMoneyParser($currencies);

        return $moneyParser->parse((string) $amount, new Currency($currency));
    }
}
