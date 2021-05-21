<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney\Contracts;

use Pest\Expectations\Expectation;

interface ChecksMoney
{
    public function toBeMoney($expectation): Expectation;

    public function toCost($expectation, $amount, $currency): Expectation;

    public function toCostMoreThan($expectation, $amount, $currency): Expectation;

    public function toCostLessThan($expectation, $amount, $currency): Expectation;
}
