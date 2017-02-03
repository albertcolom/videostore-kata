<?php

namespace tests\Unit\AmountStrategy;

use PHPUnit_Framework_TestCase;
use video\AmountStrategy\AmountRegularStrategy;

class AmountRegularStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCalculateRegularAmount($amount, $daysRented, $expected)
    {
        $unitPriceStrategy = new AmountRegularStrategy($amount);
        $this->assertEquals($unitPriceStrategy->calculate($daysRented), $expected);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [4, 0, 0],
            [0, 1, 0],
            [50, 3, 150]
        ];
    }
}
