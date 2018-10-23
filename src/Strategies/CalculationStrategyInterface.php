<?php

namespace linkprofit\Chance\Strategies;

/**
 * Интерфейс для расчёта вероятности
 */
interface CalculationStrategyInterface
{
    /**
     * Расчитываем вероятность
     *
     * @return bool
     */
    public function calculate(): bool;
}
