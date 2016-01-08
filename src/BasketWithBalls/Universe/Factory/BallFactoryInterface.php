<?php

namespace BasketWithBalls\Universe\Factory;

/**
 * Ball Factory Interface
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BallFactoryInterface
{
    /**
     * Creates new ball.
     *
     * @param integer $number
     *
     * @return \BasketWithBalls\Universe\Entity\BallInterface
     */
    public function createBall($number);
}
