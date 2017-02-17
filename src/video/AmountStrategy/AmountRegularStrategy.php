<?php

namespace video\AmountStrategy;

class AmountRegularStrategy implements AmountStrategy
{
    /** @var float  */
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(int $daysRented): float
    {
        return $daysRented * $this->amount;
    }
}
