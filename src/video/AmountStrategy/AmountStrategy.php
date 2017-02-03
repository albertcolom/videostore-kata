<?php

namespace video\AmountStrategy;

/**
 * Interface AmountStrategy
 * @package video\AmountStrategy
 */
interface AmountStrategy
{
    /**
     * @param int $daysRented
     * @return float
     */
    public function calculate(int $daysRented) : float;
}
