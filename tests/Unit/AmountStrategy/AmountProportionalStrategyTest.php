<?php

namespace tests\Unit\AmountStrategy;

use PHPUnit_Framework_TestCase;
use video\AmountStrategy\AmountProportionalStrategy;

class AmountProportionalStrategyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCalculateProportionalAmount($amount, $days, $price, $daysRented, $expected)
    {
        $unitPriceStrategy = new AmountProportionalStrategy($amount, $days, $price);
        $this->assertEquals($unitPriceStrategy->calculate($daysRented), $expected);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [1, 2, 12, 8 ,73],
            [2, 1, 33, 1, 2],
            [50, 3, 2, 1, 50]
        ];
    }
}
