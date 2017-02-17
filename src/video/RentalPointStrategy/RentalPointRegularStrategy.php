<?php

namespace video\RentalPointStrategy;

class RentalPointRegularStrategy implements RentalPointStrategy
{
    /** @var int */
    private $rentalPoint;

    public function __construct(int $rentalPoint)
    {
        $this->rentalPoint = $rentalPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(int $daysRented): float
    {
        return $this->rentalPoint;
    }
}
