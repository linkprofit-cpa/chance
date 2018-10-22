<?php

namespace Linkprofit\Chance;

use Linkprofit\Chance\Strategies\StrategyFactory;
use Linkprofit\Chance\Strategies\CalculationStrategyInterface;

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
     * @return bool;
     */
    public function get(): bool
    {
        return $this->strategy->calculate();
    }
}
