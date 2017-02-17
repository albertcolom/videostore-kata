<?php

namespace video\RentalPointStrategy;

interface RentalPointStrategy
{
    /**
     * @param int $daysRented
     * @return float
     */
    public function calculate(int $daysRented) : float;
}
