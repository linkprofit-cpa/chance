<?php

namespace linkprofit\Chance;

use linkprofit\Chance\Strategies\PercentStrategy;
use linkprofit\Chance\Strategies\PercentStrategyTest;
use linkprofit\Chance\Strategies\RatioStrategy;
use linkprofit\Chance\Strategies\RatioStrategyTest;
use linkprofit\Chance\ValueObjects\Percent;
use linkprofit\Chance\ValueObjects\Ratio;
use PHPUnit\Framework\TestCase;

include_once __DIR__ . '/Strategies/mt_rand.php';

class ChanceTest extends TestCase
{

    /**
     * @param $value
     * @param $expected
     * @dataProvider ratioConstructProvider
     */
    public function testRatio__construct($value, $expected)
    {
        $object = new Chance(new Ratio($value));
        $msg = 'Chance::__construct() wrong behavior';
        $this->assertAttributeEquals($expected, 'strategy', $object, $msg);
    }

    public function ratioConstructProvider()
    {
        return [
            [
                5,
                new RatioStrategy(new Ratio(5))
            ],
            [
                10,
                new RatioStrategy(new Ratio(10))
            ],
        ];
    }

    /**
     * @param $value
     * @param $expected
     * @dataProvider ratioGetProvider
     */
    public function testRatioGet($value, $expected)
    {
        $object = new Chance(new Ratio($value));
        $actual = $object->get();
        $msg = 'Chance::get() returns wrong result';
        $this->assertSame($expected, $actual, $msg);
    }

    public function ratioGetProvider()
    {
        return [
            [
                RatioStrategyTest::TRUE,
                true
            ],
            [
                RatioStrategyTest::FALSE,
                false
            ],
        ];
    }

    /**
     * @param $value
     * @param $expected
     * @dataProvider percentConstructProvider
     */
    public function testPercent__construct($value, $expected)
    {
        $object = new Chance(new Percent($value));
        $msg = 'Chance::__construct() wrong behavior';
        $this->assertAttributeEquals($expected, 'strategy', $object, $msg);
    }

    public function percentConstructProvider()
    {
        return [
            [
                5,
                new PercentStrategy(new Percent(5))
            ],
            [
                10,
                new PercentStrategy(new Percent(10))
            ],
        ];
    }

    /**
     * @param $value
     * @param $expected
     * @dataProvider percentGetProvider
     */
    public function testPercentGet($value, $expected)
    {
        $object = new Chance(new Percent($value));
        $actual = $object->get();
        $msg = 'Chance::get() returns wrong result';
        $this->assertSame($expected, $actual, $msg);
    }

    public function percentGetProvider()
    {
        return [
            [
                PercentStrategyTest::TRUE,
                true
            ],
            [
                PercentStrategyTest::FALSE,
                false
            ],
        ];
    }
}
