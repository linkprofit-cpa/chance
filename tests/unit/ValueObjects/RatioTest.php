<?php

namespace linkprofit\Chance\ValueObjects;

use Codeception\Test\Unit;
use InvalidArgumentException;

/**
 * @group value-objects
 */
class RatioTest extends Unit
{
    /**
     * @param $expected
     * @dataProvider constructProvider
     */
    public function testInitializationOfRation($expected)
    {
        $object = new Ratio($expected);
        $msg = 'Ratio::__construct() wrong behavior';
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
    public function testInitializationOfRationWithWrongParams()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Ratio value must be in range of 1 and PHP_INT_MAX');
        new Ratio(0);
    }

    public function constructExceptionProvider()
    {
        return [
            ' 0' => [
                0
            ],
            'PHP_INT_MAX' => [
                PHP_INT_MAX + 1
            ],
            ' -200' => [
                -200
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
        $object = new Ratio($value);
        $actual = $object->getInt();
        $msg = 'Ratio::getInt() returns wrong result';
        $this->assertSame($expected, $actual, $msg);
    }

    public function getIntProvider()
    {
        return [
            '3,3' => [
                3,
                3
            ],
            '200,200' => [
                '200',
                200
            ]
        ];
    }
}
