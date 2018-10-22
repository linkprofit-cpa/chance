<?php

namespace Linkprofit\Chance\Strategies;

use Linkprofit\Chance\ValueObjects\Ratio;

/**
 * Вычисление вероятности по отношению к целому
 *
 * Например, когда надо вычислить веротяность в одной второй части случаев или в одной пятой и т.д.
 */
class RatioStrategy implements CalculationStrategyInterface
{
    /** @var float */
    protected $value;

    public function __construct(Ratio $ratio)
    {
        $this->value = $ratio->getInt();
    }

    /**
     * Calculate probability
     *
     * @return bool;
     */
    public function calculate(): bool
    {
        return (mt_rand(1, $this->value) % $this->value) === 0;
    }
}
