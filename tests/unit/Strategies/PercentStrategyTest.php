<?php

namespace linkprofit\Chance\Strategies;

use linkprofit\Chance\ValueObjects\Percent;
use Codeception\Test\Unit;

require_once 'mt_rand.php';

/**
 * @group strategies
 */
class PercentStrategyTest extends Unit
{
    const TRUE = 60;
    const FALSE = 10;

    public function testCreationOfPercentStrategy()
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
    public function testCalculateProbability($value, $expected)
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
            'true' =>[
                static::TRUE,
                true,
            ],
            'false' =>[
                static::FALSE,
                false,
            ]
        ];
    }
}
