<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney;

$GLOBALS['pestCurrency']     = 'USD';
$GLOBALS['pestMoneyLibrary'] = \Brick\Money\Money::class;

function useCurrency(string $currency): void
{
    $GLOBALS['pestCurrency'] = $currency;
}

function useMoneyLibrary(string $moneyClass): void
{
    $GLOBALS['pestMoneyLibrary'] = $moneyClass;
}

expect()->extend('toBeMoney', function () {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toBeMoney($this);
});

expect()->extend('toCost', function ($amount, $currency = null) {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toCost($this, $amount, $currency ?? $GLOBALS['pestCurrency']);
});

expect()->extend('toCostMoreThan', function ($amount, $currency = null) {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toCostMoreThan($this, $amount, $currency ?? $GLOBALS['pestCurrency']);
});

expect()->extend('toCostLessThan', function ($amount, $currency = null) {
    // @phpstan-ignore-next-line
    return MoneyFactory::make()->toCostLessThan($this, $amount, $currency ?? $GLOBALS['pestCurrency']);
});
