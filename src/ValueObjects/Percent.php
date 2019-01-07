<?php

namespace linkprofit\Chance\ValueObjects;

use InvalidArgumentException;

class Percent
{
    /** @var int */
    protected $value;

    /**
     * Percent constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if ($value < 0 || $value > 100 || !filter_var($value, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException('Percent value must be an integer and in range of 0 and 100');
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getInt(): int
    {
        return (int) $this->value;
    }
}