<?php

namespace video\Movie;


class MovieType
{
    const REGULAR = 0;
    const CHILDREN = 1;
    const NEW_RELEASE = 3;

    /** @var int */
    private $type;

    private function __construct(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return MovieType
     */
    public static function buildRegularMovieType() : self
    {
        return new self(self::REGULAR);
    }

    /**
     * @return MovieType
     */
    public static function buildChildrenMovieType() : self
    {
        return new self(self::CHILDREN);
    }

    /**
     * @return MovieType
     */
    public static function buildNewReleaseType() : self
    {
        return new self(self::NEW_RELEASE);
    }

    /**
     * @return int
     */
    public function type() : int
    {
        return $this->type;
    }
}