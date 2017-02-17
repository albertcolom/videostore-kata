<?php

namespace video\AmountStrategy;

use video\Movie\Movie;
use video\Strategies;

class AmountStrategyContext
{
    /** @var Strategies  */
    private $strategies;

    public function __construct(Strategies $strategies)
    {
        $this->strategies = $strategies->settings();
    }

    /**
     * @param Movie $movie
     * @param int $daysRented
     * @return float
     */
    public function calculate(Movie $movie, int $daysRented) : float
    {
        /** @var AmountStrategy $strategy */
        $strategy = $this->getAmountStrategyByMovie($movie);
        return $strategy->calculate($daysRented);
    }

    /**
     * @param Movie $movie
     * @return AmountStrategy
     */
    public function getAmountStrategyByMovie(Movie $movie) : AmountStrategy
    {
        return $this->strategies[$movie->movieType()->type()];
    }
}
