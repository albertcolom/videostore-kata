<?php

namespace video;

use video\Movie\MovieType;
use video\RentalPointStrategy\RentalPointProportionalStrategy;
use video\RentalPointStrategy\RentalPointRegularStrategy;

class RentalPointStrategies implements Strategies
{
    /**
     * {@inheritdoc}
     */
    public function settings() :array
    {
        return [
            MovieType::REGULAR => new RentalPointRegularStrategy(1),
            MovieType::CHILDREN => new RentalPointRegularStrategy(1),
            MovieType::NEW_RELEASE => new RentalPointProportionalStrategy(1, 2)
        ];
    }
}
