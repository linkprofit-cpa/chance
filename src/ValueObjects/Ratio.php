<?php

namespace linkprofit\Chance\ValueObjects;

use InvalidArgumentException;

/**
 * Объект значение для значения-делителя
 *
 * Можно использовать, когда требуется задать вероятность в виде части: одна пятая, одна третья и т.д.
 */
class Ratio
{
    /** @var int */
    protected $value;

    public function __construct($value)
    {
        if ($value < 1 || PHP_INT_MAX < $value) {
            throw new InvalidArgumentException('Ratio value must be in range of 1 and PHP_INT_MAX');
        }

        $this->value = $value;
    }

    /**
     * Получение значения
     *
     * @return mixed
     */
    public function getInt(): int
    {
        return (int) $this->value;
    }
}
