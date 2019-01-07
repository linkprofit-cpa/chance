<?php

namespace linkprofit\Chance\Strategies;

use InvalidArgumentException;
use linkprofit\Chance\ValueObjects\Percent;
use linkprofit\Chance\ValueObjects\Ratio;

/**
 * Фабрика инициализирующая стратегию для расчёта вероятности
 */
class StrategyFactory
{
    public function create($valueObject): CalculationStrategyInterface
    {
        switch (true) {
            case $valueObject instanceof Ratio:
                $result = new RatioStrategy($valueObject);
                break;
            case $valueObject instanceof Percent:
                $result = new PercentStrategy($valueObject);
                break;
            default:
                throw new InvalidArgumentException('Unknown value object type');
        }

        return $result;
    }
}
