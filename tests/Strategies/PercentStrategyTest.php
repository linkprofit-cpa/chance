<?php

namespace linkprofit\Chance\Strategies;

use linkprofit\Chance\ValueObjects\Percent;
use PHPUnit\Framework\TestCase;

require_once 'mt_rand.php';

/**
 * @group strategies
 */
class PercentStrategyTest extends TestCase
{
    const TRUE = 60;
    const FALSE = 10;

    public function test__construct()
    {
        $expected = static::FALSE;
        $value = new Percent($expected);
        $object = new PercentStrategy($value);

        $msg = 'PercentStrategy::__construct() wrong behavior';
        $this->assertAttributeSame($expected, 'value', $object, $msg);
    }

    /**
     * @dataProvider calculateProvider
     * @param $value
     * @param $expected
     */
    public function testCalculate($value, $expected)
    {
        $percent = new Percent($value);
        $object = new PercentStrategy($percent);

        $actual = $object->calculate();
        $msg = 'PercentStrategy::calculate() returns wrong result';
        $this->assertSame($expected, $actual, $msg);
    }

    public function calculateProvider()
    {
        return [
            [
                static::TRUE,
                true,
            ],
            [
                static::FALSE,
                false,
            ]
        ];
    }
}
