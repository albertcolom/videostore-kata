<?php

namespace video\RentalPointStrategy;

class RentalPointProportionalStrategy implements RentalPointStrategy
{
    /** @var  int */
    private $rentalPoint;

    /** @var  int */
    private $surchargeRentalPoint;

    public function __construct(int $rentalPoint, int $surchargeRentalPoint)
    {
        $this->rentalPoint = $rentalPoint;
        $this->surchargeRentalPoint = $surchargeRentalPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(int $daysRented): float
    {
        return ($daysRented > $this->rentalPoint) ? $this->surchargeRentalPoint : $this->rentalPoint;
    }
}
