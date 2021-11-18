<?php

use Lukeraymonddowning\PestPluginMoney\Tests\Archtech\TestCase;
use Lukeraymonddowning\PestPluginMoney\Tests\Concerns\ProvidesGlobalFunctionAccessors;

uses(ProvidesGlobalFunctionAccessors::class)->in(__DIR__);
uses(TestCase::class)->group('^8.0')->in(__DIR__ . '/Archtech');
