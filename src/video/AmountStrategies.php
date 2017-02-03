<?php

namespace video;

use video\AmountStrategy\AmountProportionalStrategy;
use video\AmountStrategy\AmountRegularStrategy;

class AmountStrategies implements Strategies
{
    /**
     * {@inheritdoc}
     */
    public function settings() :array
    {
        return [
            'RegularMovie' => new AmountProportionalStrategy(2, 2, 1.5),
            'ChildrensMovie' => new AmountProportionalStrategy(1.5, 3, 1.5),
            'NewReleaseMovie' => new AmountRegularStrategy(3)
        ];
    }
}
