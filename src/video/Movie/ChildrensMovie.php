<?php

namespace video\Movie;

/**
 * Class ChildrensMovie
 */
class ChildrensMovie extends Movie
{
    /**
     * ChildrensMovie constructor.
     * @param $title
     */
    public function __construct($title)
    {
        parent::__construct($title);
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function determineFrequentRenterPoints($daysRented) : int
    {
        return 1;
    }
}
