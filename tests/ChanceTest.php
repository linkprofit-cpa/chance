<?php

namespace Linkprofit\Chance;

use Linkprofit\Chance\Strategies\RatioStrategy;
use Linkprofit\Chance\Strategies\RatioStrategyTest;
use Linkprofit\Chance\ValueObjects\Ratio;
use PHPUnit\Framework\TestCase;

include_once __DIR__ . '/Strategies/mt_rand.php';

class ChanceTest extends TestCase
{

    /**
     * @param $value
     * @param $expected
     * @dataProvider constructProvider
     */
    public function test__construct($value, $expected)
    {
        $object = new Chance(new Ratio($value));
        $msg = 'Chance::__construct() wrong behavior';
        $this->assertAttributeEquals($expected, 'strategy', $object, $msg);
    }

    public function constructProvider()
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
     * @dataProvider getProvider
     */
    public function testGet($value, $expected)
    {
        $object = new Chance(new Ratio($value));
        $actual = $object->get();
        $msg = 'Chance::get() returns wrong result';
        $this->assertSame($expected, $actual, $msg);
    }

    public function getProvider()
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
}
