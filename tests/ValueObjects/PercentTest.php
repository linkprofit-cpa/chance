<?php

namespace linkprofit\Chance\ValueObjects;

use PHPUnit\Framework\TestCase;

/**
 * @group value-objects
 */
class PercentTest extends TestCase
{
    /**
     * @param $expected
     * @dataProvider constructProvider
     */
    public function test__construct($expected)
    {
        $object = new Percent($expected);
        $msg = 'Percent::__construct() wrong behavior';
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
     * @expectedExceptionMessage Percent value must be an integer and in range of 0 and 100
     * @dataProvider constructExceptionProvider
     */
    public function testConstructException($value)
    {
        new Percent($value);
    }

    public function constructExceptionProvider()
    {
        return [
            [
                -1
            ],
            [
                1.3
            ],
            [
                101
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
        $object = new Percent($value);
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
                '100', 100
            ]
        ];
    }
}
