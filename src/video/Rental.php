<?php

namespace video;

use video\AmountStrategy\AmountStrategyContext;
use video\Movie\Movie;

/**
 * Class Rental
 */
class Rental
{
    /** @var  Movie */
    private $movie;

    /** @var  int */
    private $daysRented;

    /**
     * Rental constructor.
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct($movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * Movie's title accessor.
     * @return string
     */
    public function title() : string
    {
        return $this->movie->title();
    }

    /**
     * Movie's amount accessor.
     * @return float
     */
    public function determineAmount() : float
    {
        $strategyContext = new AmountStrategyContext(new AmountStrategies());
        return $strategyContext->calculate($this->movie, $this->daysRented);
    }

    /**
     * @return int
     */
    public function determineFrequentRenterPoints() : int
    {
        return $this->movie->determineFrequentRenterPoints($this->daysRented);
    }
}
