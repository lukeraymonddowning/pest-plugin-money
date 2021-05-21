# pest-plugin-money

This package is a plugin for [Pest PHP](https://pestphp.com). It allows you to write tests against monetary values 
provided by either [brick/money](https://github.com/brick/money) or [moneyphp/money](https://github.com/moneyphp/money)
using the same declarative syntax you're used to with Pest's expectation syntax.

## Installation

To get started, install the plugin using composer:

```bash
composer require lukeraymonddowning/pest-plugin-money --dev
```

This package requires the following:

- Pest PHP
- Either the Brick Money or MoneyPHP Money libraries
- PHP 7.4 or greater

## Usage

Using the plugin is simple! Here are examples of the expectations made available by this plugin. We will use
Brick Money for all of our examples, but they work exactly the same with MoneyPHP.

### toBeMoney

To simply assert that an object is a monetary value, use the `toBeMoney` method:

```php
expect(Money::of(100, "GBP"))->toBeMoney();
expect("Hello World")->not->toBeMoney();
```

### toCost

To check that a monetary value is equal to a certain amount, use the `toCost` method:

```php
expect(Money::of(150, "GBP"))->toCost(150, 'GBP');
expect(Money::of(150, "GBP"))->toCost($anotherMoneyObject);
expect(Money::of(150, "GBP"))->not->toCost(100, 'GBP');
```

### toCostLessThan

To check that a monetary value is less than a certain amount, use the `toCostLessThan` method:

```php
expect(Money::of(150, "GBP"))->toCostLessThan(160, 'GBP');
expect(Money::of(150, "GBP"))->toCostLessThan($anotherMoneyObject);
expect(Money::of(150, "GBP"))->not->toCostLessThan(140, 'GBP');
```

### toCostMoreThan

To check that a monetary value is more than a certain amount, use the `toCostMoreThan` method:

```php
expect(Money::of(150, "GBP"))->toCostMoreThan(140, 'GBP');
expect(Money::of(150, "GBP"))->toCostMoreThan($anotherMoneyObject);
expect(Money::of(150, "GBP"))->not->toCostMoreThan(160, 'GBP');
```

## Choosing a money library

This package uses Brick Money as a default, but you can change that using the `useMoneyLibrary` function.
Pass the class name of the relevant money package:

```php
useMoneyLibrary(\Money\Money::class); // Use the MoneyPHP library
useMoneyLibrary(\Brick\Money\Money::class); // Use the Brick Money library
```

## Setting a default currency

If your application primarily uses a single currency, it can be annoying having to declare it as the second
argument for each expectation. By setting a default, you can omit the currency and just provide the amount:

```php
useCurrency('GBP'); 
expect($money)->toCost('100'); // Uses Great British Pounds

useCurrency('USD'); 
expect($money)->toCost('100'); // Uses US Dollars
```
