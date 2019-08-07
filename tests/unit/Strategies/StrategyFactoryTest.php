<?php

namespace linkprofit\Chance\Strategies;

use \Codeception\Test\Unit;
use InvalidArgumentException;
use linkprofit\Chance\ValueObjects\Percent;
use linkprofit\Chance\ValueObjects\Ratio;

/**
 * @group strategies
 */
class StrategyFactoryTest extends Unit
{
    /** @var StrategyFactory */
    protected $object;

    public function _before()
    {
        $this->object = new StrategyFactory;
    }

    /**
     * @dataProvider createProvider
     * @param $value
     * @param $expected
     */
    public function testCreationOfPercentStrategy($value, $expected)
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
            'ratio' => [
                $ratio,
                new RatioStrategy($ratio)
            ],
            'percent' => [
                $percent,
                new PercentStrategy($percent)
            ]
        ];
    }

    /**
     * @param $value
     * @dataProvider wrongValueObjectProvider
     */
    public function testCreateionOfStrategyWithWrongValueObject($value)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown value object type');
        $this->object->create($value);
    }

    public function wrongValueObjectProvider()
    {
        return [
            'int' => [10],
            'string' => ['string'],
            'bool true' => [true],
            'bool false' => [false],
            'std class' => [new class{}],
        ];
    }
}
