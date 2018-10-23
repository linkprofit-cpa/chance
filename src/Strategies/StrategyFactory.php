<?php

namespace linkprofit\Chance\Strategies;

use InvalidArgumentException;
use linkprofit\Chance\ValueObjects\Ratio;

/**
 * Фабрика инициализирующая стратегию для расчёта вероятности
 */
class StrategyFactory
{
    public function create($valueObject)
    {
        switch (true) {
            case $valueObject instanceof Ratio:
                $result = new RatioStrategy($valueObject);
                break;
            default:
                throw new InvalidArgumentException('Unknown value object type');
        }

        return $result;
    }
}
