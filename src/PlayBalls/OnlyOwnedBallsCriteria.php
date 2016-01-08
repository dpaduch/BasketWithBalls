<?php

namespace PlayBalls;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Basket\Query\Criteria\AbstractBallsCriteria;

/**
 * Only Owned Balls Criteria Class
 *
 * Finds baskets, that have only specified balls.
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class OnlyOwnedBallsCriteria extends AbstractBallsCriteria
{
    /* (non-PHPdoc)
     * @see \BasketWithBalls\Basket\Query\Criteria\AbstractBallsCriteria::check()
     */
    public function check(BasketInterface $basket)
    {
        $balls = $basket->getBalls();

        // more balls in basket than required
        if ($balls->count() > $this->balls->count()) {
            return false;
        }

        return !array_diff(
            iterator_to_array($balls),
            iterator_to_array($this->balls)
        );
    }
}
