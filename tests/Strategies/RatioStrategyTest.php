<?php

namespace Linkprofit\Chance\Strategies;

use Linkprofit\Chance\ValueObjects\Ratio;
use PHPUnit\Framework\TestCase;

include_once 'mt_rand.php';

/**
 * @group strategies
 */
class RatioStrategyTest extends TestCase
{
    const TRUE = 3;
    const FALSE = 10;

    public function test__construct()
    {
        $expected = static::FALSE;
        $value = new Ratio($expected);
        $object = new RatioStrategy($value);

        $msg = 'RatioStrategy::__construct() wrong behavior';
        $this->assertAttributeSame($expected, 'value', $object, $msg);
    }

    /**
     * @dataProvider calculateProvider
     * @param $value
     * @param $expected
     */
    public function testCalculate($value, $expected)
    {
        $ratio = new Ratio($value);
        $object = new RatioStrategy($ratio);

        $actual = $object->calculate();
        $msg = 'RatioStrategy::calculate() returns wrong result';
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
