<?php

namespace BasketWithBalls\Balls\Provider;

use BasketWithBalls\Universe;

/**
 * Random balls provider Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class RandomBallsProvider extends CustomBallsProvider
{
    /**
     * @param integer $maxNumber The maximum number of ball
     */
    public function __construct($maxNumber)
    {
        $this->numbers = \SplFixedArray::fromArray($this->shuffle($maxNumber));
        $this->reset();
    }

    /**
     * Shuffles array of ball numbers
     *
     * @param ineger $maxNumber
     *
     * @return integer[]
     */
    protected function shuffle($maxNumber)
    {
        $numbers = range(1, $maxNumber);
        shuffle($numbers);
        return $numbers;
    }
}
