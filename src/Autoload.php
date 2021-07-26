<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

use Pest\Expectation;

$GLOBALS['pestCurrency']     = 'USD';

function useCurrency(string $currency): void
{
    $GLOBALS['pestCurrency'] = $currency;
}

/**
 * @param class-string $moneyClass
 */
function useMoneyLibrary(string $moneyClass): void
{
    $GLOBALS['pestMoneyLibrary'] = $moneyClass;
}

expect()->extend('toBeMoney', function (): Expectation {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toBeMoney($this);
});

expect()->extend('toCost', function ($amount, $currency = null): Expectation {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toCost($this, $amount, $currency ?? $GLOBALS['pestCurrency']);
});

expect()->extend('toCostMoreThan', function ($amount, $currency = null): Expectation {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toCostMoreThan($this, $amount, $currency ?? $GLOBALS['pestCurrency']);
});

expect()->extend('toCostLessThan', function ($amount, $currency = null): Expectation {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toCostLessThan($this, $amount, $currency ?? $GLOBALS['pestCurrency']);
});
