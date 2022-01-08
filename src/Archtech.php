<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use ArchTech\Money\Money;
use Lukeraymonddowning\PestPluginMoney\Contracts\ChecksMoney;
use Pest\Expectation;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * @implements ChecksMoney<Money>
 */
final class Archtech implements ChecksMoney
{
    public function toBeMoney($expectation): Expectation
    {
        return $expectation->toBeInstanceOf(Money::class);
    }

    public function toCost($expectation, $amount, $currency): Expectation
    {
        if (!$expectation->value instanceof Money) {
            throw new ExpectationFailedException('The expectation is not a money object.');
        }

        expect($expectation->value->is($this->parseMoney($amount, $currency)))->toBeTrue();

        return $expectation;
    }

    public function toCostMoreThan($expectation, $amount, $currency): Expectation
    {
        expect($expectation->value->decimal())->toBeGreaterThan($this->parseMoney($amount, $currency)->decimal());

        return $expectation;
    }

    public function toCostLessThan($expectation, $amount, $currency): Expectation
    {
        expect($expectation->value->decimal())->toBeLessThan($this->parseMoney($amount, $currency)->decimal());

        return $expectation;
    }

    private function parseMoney($amount, $currency): Money
    {
        if ($amount instanceof Money) {
            return $amount;
        }

        return Money::fromDecimal($amount, $currency);
    }
}
