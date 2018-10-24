# Chance

[![Latest Stable Version](https://poser.pugx.org/linkprofit-cpa/chance/v/stable)](https://packagist.org/packages/linkprofit-cpa/chance)
[![Build Status](https://scrutinizer-ci.com/g/linkprofit-cpa/chance/badges/build.png?b=master)](https://scrutinizer-ci.com/g/linkprofit-cpa/chance/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/linkprofit-cpa/chance/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/linkprofit-cpa/chance/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/linkprofit-cpa/chance/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/linkprofit-cpa/chance/?branch=master)
[![License](https://poser.pugx.org/linkprofit-cpa/chance/license)](https://packagist.org/packages/linkprofit-cpa/chance)

## Описание
Библиотека для расчёта шанса с заданной вероятностью

## Примеры

```php
// Получить шанс в одной пятой случаев
$chance = new Chance(Ratio(5));
if ($chance->get()) {
    ...
}
```
