<?php

namespace linkprofit\Chance\ValueObjects;

use Codeception\Test\Unit;
use InvalidArgumentException;

/**
 * @group value-objects
 */
class PercentTest extends Unit
{
    /**
     * @param $expected
     * @dataProvider constructProvider
     */
    public function testInitializationOfPercent($expected)
    {
        $object = new Percent($expected);
        $msg = 'Percent::__construct() wrong behavior';
        $this->assertAttributeSame($expected, 'value', $object, $msg);
    }

    public function constructProvider()
    {
        return [
            ' 10' => [
                10
            ],
            ' 100' => [
                100
            ],
            ' 18' => [
                18
            ]
        ];
    }

    /**
     * @dataProvider constructExceptionProvider
     */
    public function testInitializationOfPercentWithWrongParams($value)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Percent value must be an integer and in range of 0 and 100');
        new Percent($value);
    }

    public function constructExceptionProvider()
    {
        return [
            ' -1' => [
                -1
            ],
            ' 1.3' => [
                1.3
            ],
            ' 101' => [
                101
            ]
        ];
    }

    /**
     * @param $value
     * @param $expected
     * @dataProvider getIntProvider
     */
    public function testGettingOfInt($value, $expected)
    {
        $object = new Percent($value);
        $actual = $object->getInt();
        $msg = 'Ratio::getInt() returns wrong result';
        $this->assertEquals($expected, $actual, $msg);
    }

    public function getIntProvider()
    {
        return [
            ' 3' => [
                3,
                3
            ],
            ' 100' => [
                '100',
                100
            ]
        ];
    }
}
