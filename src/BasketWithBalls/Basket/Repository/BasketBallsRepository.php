<?php

namespace BasketWithBalls\Basket\Repository;

use BasketWithBalls\Universe\Entity\BallInterface;
use BasketWithBalls\Universe\Repository\BallsRepositoryInterface;

/**
 * Balls in Basket Repository Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class BasketBallsRepository implements
    BallsRepositoryInterface,
    \IteratorAggregate
{
    /**
     * Array of balls.
     *
     * @var \ArrayIterator
     */
    private $balls;

    public function __construct()
    {
        $this->balls = new \ArrayIterator();
    }

    /**
     * Adds ball into repository.
     *
     * @param BallInterface $ball
     */
    public function addBall(BallInterface $ball)
    {
        $this->balls[] = $ball;
    }

    /**
     * Returns count of repository items.
     *
     * @return number
     */
    public function count()
    {
        return count($this->balls);
    }

    /* (non-PHPdoc)
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator()
    {
        return $this->balls;
    }

    /**
     * Returns string representation of BasketBallsRepository.
     *
     * @return string
     */
    public function __toString()
    {
        return implode(', ', $this->toArray());
    }

    /**
     * Returns array representation of BasketBallsRepository.
     *
     * @return integer[]
     */
    public function toArray()
    {
        return array_map(
            function ($ball) {
                return (int)$ball->getNumber();
            },
            iterator_to_array($this->balls)
        );
    }
}
