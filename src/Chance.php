<?php

namespace linkprofit\Chance;

use linkprofit\Chance\Strategies\StrategyFactory;
use linkprofit\Chance\Strategies\CalculationStrategyInterface;

/**
 * Расчёт вероятности на основе заданных параметров
 */
class Chance
{
    /** @var CalculationStrategyInterface */
    protected $strategy;

    public function __construct($value)
    {
        $this->strategy = (new StrategyFactory)->create($value);
    }

    /**
     * Расчитываем вероятность
     *
     * @return bool
     */
    public function get(): bool
    {
        return $this->strategy->calculate();
    }
}
