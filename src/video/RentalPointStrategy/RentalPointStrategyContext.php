<?php

namespace video\RentalPointStrategy;

use video\Movie\Movie;
use video\Strategies;

class RentalPointStrategyContext
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
        /** @var RentalPointStrategy $strategy */
        $strategy = $this->getRentalPointStrategyByMovie($movie);
        return $strategy->calculate($daysRented);
    }

    /**
     * @param Movie $movie
     * @return RentalPointStrategy
     */
    public function getRentalPointStrategyByMovie(Movie $movie) : RentalPointStrategy
    {
        return $this->strategies[$movie->movieType()->type()];
    }
}
