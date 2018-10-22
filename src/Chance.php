<?php

namespace Linkprofit\Chance;

use Linkprofit\Chance\Strategies\StrategyFactory;
use Linkprofit\Chance\Strategies\CalculationStrategyInterface;

/**
 * Split traffic for new features
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
     * Calculate probability
     *
     * @return bool;
     */
    public function get(): bool
    {
        return $this->strategy->calculate();
    }
}
