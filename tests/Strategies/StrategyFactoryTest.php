<?php

namespace linkprofit\Chance\Strategies;

use InvalidArgumentException;
use linkprofit\Chance\ValueObjects\Percent;
use linkprofit\Chance\ValueObjects\Ratio;
use PHPUnit\Framework\TestCase;

/**
 * @group strategies
 */
class StrategyFactoryTest extends TestCase
{
    /** @var StrategyFactory */
    protected $object;

    public function setUp()
    {
        $this->object = new StrategyFactory;
    }

    /**
     * @dataProvider createProvider
     * @param $value
     * @param $expected
     */
    public function testCreate($value, $expected)
    {
        $actual = $this->object->create($value);
        $msg = 'StrategyFactory::create() returns wrong result';
        $this->assertEquals($expected, $actual, $msg);
    }

    public function createProvider()
    {
        $ratio = new Ratio(5);
        $percent = new Percent(50);

        return [
            [
                $ratio,
                new RatioStrategy($ratio)
            ],
            [
                $percent,
                new PercentStrategy($percent)
            ]
        ];
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unknown value object type
     */
    public function testCreateException()
    {
        $this->object->create(10);
    }
}
