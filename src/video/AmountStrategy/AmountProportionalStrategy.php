<?php

namespace video\AmountStrategy;

class AmountProportionalStrategy implements AmountStrategy
{
    /** @var float */
    private $amount;

    /** @var int */
    private $days;

    /** @var float */
    private $price;

    /**
     * AmountRegularStrategy constructor.
     * @param float $amount
     * @param int $days
     * @param float $price
     */
    public function __construct(float $amount, int $days, float $price)
    {
        $this->amount = $amount;
        $this->days = $days;
        $this->price = $price;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(int $daysRented): float
    {
        $thisAmount = $this->amount;

        if ($daysRented > $this->days) {
            $thisAmount += ($daysRented - $this->days) * $this->price;
        }

        return $thisAmount;
    }

}
