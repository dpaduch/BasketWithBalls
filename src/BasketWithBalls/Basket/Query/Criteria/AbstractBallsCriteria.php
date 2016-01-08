<?php

namespace BasketWithBalls\Basket\Query\Criteria;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Universe\Repository\BallsRepositoryInterface;
use BasketWithBalls\Universe\Query\Criteria\BasketCriteriaInterface;

/**
 * Balls Criteria Abstract Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
abstract class AbstractBallsCriteria implements BasketCriteriaInterface
{
    /**
     * Repository of searched balls
     *
     * @var BallsRepositoryInterface
     */
    protected $balls;

    /**
     * @param BallsRepositoryInterface $balls Repository of balls to check
     */
    public function __construct(BallsRepositoryInterface $balls)
    {
        $this->balls = $balls;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Query\Criteria\BasketCriteriaInterface::check()
     */
    abstract public function check(BasketInterface $basket);
}
