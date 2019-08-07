<?php

namespace linkprofit\Chance\Strategies;

use linkprofit\Chance\ValueObjects\Ratio;
use Codeception\Test\Unit;

require_once 'mt_rand.php';

/**
 * @group strategies
 */
class RatioStrategyTest extends Unit
{
    const TRUE = 3;
    const FALSE = 10;

    public function testCreationOfRatioStrategy()
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
    public function testCalculateProbability($value, $expected)
    {
        $ratio = new Ratio($value);
        $object = new RatioStrategy($ratio);

        $actual = $object->calculate();
        $this->assertSame($expected, $actual);
    }

    public function calculateProvider()
    {
        return [
            'true' => [
                static::TRUE,
                true,
            ],
            'false' => [
                static::FALSE,
                false,
            ]
        ];
    }
}
