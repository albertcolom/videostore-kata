<?php

namespace video\Movie;

class Movie
{
    /** @var  string */
    private $title;

    /** @var MovieType  */
    private $movieType;

    /**
     * Movie constructor.
     * @param string $title
     * @param MovieType $movieType
     */
    public function __construct(string $title, MovieType $movieType)
    {
        $this->title = $title;
        $this->movieType = $movieType;
    }

    /**
     * @return string
     */
    public function title() : string
    {
        return $this->title;
    }

    /**
     * @return MovieType
     */
    public function movieType() : MovieType
    {
        return $this->movieType;
    }
}
