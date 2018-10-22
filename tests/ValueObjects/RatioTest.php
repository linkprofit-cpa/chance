<?php

namespace Linkprofit\Chance\ValueObjects;

use PHPUnit\Framework\TestCase;

/**
 * @group value-objects
 */
class RatioTest extends TestCase
{
    /**
     * @param $expected
     * @dataProvider constructProvider
     */
    public function test__construct($expected)
    {
        $object = new Ratio($expected);
        $msg = 'Ratio::__construct() wrong behavior';
        $this->assertAttributeSame($expected, 'value', $object, $msg);
    }

    public function constructProvider()
    {
        return [
            [
                10
            ],
            [
                100
            ],
            [
                18
            ]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Ratio value must be in range of 1 and PHP_INT_MAX
     * @dataProvider constructExceptionProvider
     */
    public function testConstructException()
    {
        new Ratio(0);
    }

    public function constructExceptionProvider()
    {
        return [
            [
                0
            ],
            [
                PHP_INT_MAX + 1
            ],
            [
                -200
            ]
        ];
    }

    /**
     * @param $value
     * @param $expected
     * @dataProvider getIntProvider
     */
    public function testGetInt($value, $expected)
    {
        $object = new Ratio($value);
        $actual = $object->getInt();
        $msg = 'Ratio::getInt() returns wrong result';
        $this->assertSame($expected, $actual, $msg);
    }

    public function getIntProvider()
    {
        return [
            [
                3, 3
            ],
            [
                '200', 200
            ]
        ];
    }
}
