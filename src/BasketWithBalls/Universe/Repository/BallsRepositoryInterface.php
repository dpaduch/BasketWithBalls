<?php

namespace BasketWithBalls\Universe\Repository;

use BasketWithBalls\Universe\Entity;

/**
 * Balls Repository Interface
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BallsRepositoryInterface
{
    /**
     * Adds ball to repository.
     *
     * @param Entity\BallInterface $ball
     */
    public function addBall(Entity\BallInterface $ball);
}
