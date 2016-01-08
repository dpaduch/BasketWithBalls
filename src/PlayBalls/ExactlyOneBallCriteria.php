<?php

namespace PlayBalls;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Basket\Query\Criteria\AbstractBallsCriteria;

/**
 * Exactly One Ball Criteria Class
 *
 * Finds baskets, that have exactly one ball from specified.
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class ExactlyOneBallCriteria extends AbstractBallsCriteria
{
    /* (non-PHPdoc)
     * @see \BasketWithBalls\Basket\Query\Criteria\AbstractBallsCriteria::check()
     */
    public function check(BasketInterface $basket)
    {
        $balls = $basket->getBalls();

        $diff = array_diff(
            iterator_to_array($balls),
            iterator_to_array($this->balls)
        );

        return count($diff) == ($balls->count() - 1);
    }
}
