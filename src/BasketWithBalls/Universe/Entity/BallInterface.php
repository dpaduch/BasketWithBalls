<?php

namespace BasketWithBalls\Universe\Entity;

/**
 * Interface of Ball in Universe
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BallInterface
{
    /**
     * Returns number representation of ball.
     *
     * @return integer
     */
    public function getNumber();

    /**
     * Returns string representation of ball.
     *
     * @return string
     */
    public function __toString();
}
