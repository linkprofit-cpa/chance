<?php

namespace linkprofit\Chance\Strategies;

use linkprofit\Chance\ValueObjects\Percent;

/**
 * Class PercentStrategy
 * @package linkprofit\Chance\Strategies
 */
class PercentStrategy implements CalculationStrategyInterface
{
    /** @var int */
    protected $value;

    /**
     * PercentStrategy constructor.
     *
     * @param Percent $percent
     */
    public function __construct(Percent $percent)
    {
        $this->value = $percent->getInt();
    }

    /**
     * @return bool
     */
    public function calculate(): bool
    {
        return mt_rand(1, 100) <= $this->value;
    }
}