<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney\Contracts;

use Pest\Expectation;

/**
 * @template TMoney
 * @phpstan-type MoneyAmount TMoney|string|int|float
 */
interface ChecksMoney
{
    /**
     * @template TValue
     *
     * @param Expectation<TValue> $expectation
     *
     * @return Expectation<TValue>
     */
    public function toBeMoney($expectation): Expectation;

    /**
     * @param Expectation $expectation
     * @param MoneyAmount $amount
     * @param string      $currency
     */
    public function toCost($expectation, $amount, $currency): Expectation;

    /**
     * @param Expectation $expectation
     * @param MoneyAmount $amount
     * @param string      $currency
     */
    public function toCostMoreThan($expectation, $amount, $currency): Expectation;

    /**
     * @param Expectation $expectation
     * @param MoneyAmount $amount
     * @param string      $currency
     */
    public function toCostLessThan($expectation, $amount, $currency): Expectation;
}
