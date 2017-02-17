<?php

namespace video\AmountStrategy;

interface AmountStrategy
{
    /**
     * @param int $daysRented
     * @return float
     */
    public function calculate(int $daysRented) : float;
}
