<?php

namespace video;

use video\AmountStrategy\AmountProportionalStrategy;
use video\AmountStrategy\AmountRegularStrategy;
use video\Movie\MovieType;

class AmountStrategies implements Strategies
{
    /**
     * {@inheritdoc}
     */
    public function settings() :array
    {
        return [
            MovieType::REGULAR => new AmountProportionalStrategy(2, 2, 1.5),
            MovieType::CHILDREN => new AmountProportionalStrategy(1.5, 3, 1.5),
            MovieType::NEW_RELEASE => new AmountRegularStrategy(3)
        ];
    }
}
