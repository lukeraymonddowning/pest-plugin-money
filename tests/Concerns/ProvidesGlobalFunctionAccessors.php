<?php

declare(strict_types=1);

namespace Lukeraymonddowning\PestPluginMoney\Tests\Concerns;

use Pest\PendingObjects\TestCall;
use PHPUnit\Framework\TestCase;

use function Lukeraymonddowning\PestPluginMoney\useCurrency;
use function Lukeraymonddowning\PestPluginMoney\useMoneyLibrary;

trait ProvidesGlobalFunctionAccessors
{
    /**
     * @return ProvidesGlobalFunctionAccessors|TestCase|TestCall
     */
    public function useCurrency(string $currency)
    {
        useCurrency($currency);

        return $this;
    }

    /**
     * @param class-string $moneyClass
     *
     * @return ProvidesGlobalFunctionAccessors|TestCase|TestCall
     */
    public function useMoneyLibrary(string $moneyClass)
    {
        useMoneyLibrary($moneyClass);

        return $this;
    }
}
