<?php

namespace Linkprofit\Chance\Strategies;

/**
 * Interface for splitting strategy
 */
interface CalculationStrategyInterface
{
    /**
     * Calculate probability
     *
     * @return bool;
     */
    public function calculate(): bool;
}
