<?php

namespace BasketWithBalls\Balls\Factory;

use BasketWithBalls\Universe;
use BasketWithBalls\Balls;

/**
 * Ball Factory Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class BallFactory implements Universe\Factory\BallFactoryInterface
{
    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Factory\BallFactoryInterface::createBall()
     */
    public function createBall($number)
    {
        return new Balls\Entity\Ball($number);
    }
}
