<?php

namespace BasketWithBalls\Basket\Entity;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Basket\Repository\BasketBallsRepository;
use BasketWithBalls\Universe\Entity\BallInterface;

/**
 * Basket Entity class.
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class Basket implements BasketInterface
{
    /**
     * Name of basket.
     *
     * @var string
     */
    private $name;

    /**
     * Capacity of basket.
     *
     * How many balls can handle
     *
     * @var integer
     */
    private $capacity;

    /**
     * Balls repository.
     *
     * @var BasketBallsRepository
     */
    private $basketBalls;

    /**
     * Basket representation string pattern.
     *
     * @var string
     */
    const BASKET_STRING_PATTERN = '%s: %s';

    /**
     * @param string $name Name of basket
     * @param integer $capacity Basket capacity
     */
    public function __construct($name, $capacity)
    {
        $this->setName($name);
        $this->setCapacity($capacity);

        $this->basketBalls = new BasketBallsRepository();
    }

    /**
     * Returns name of basket.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets name.
     *
     * @param integer $capacity
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * Returns capacity.
     *
     * @return number
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Sets capacity.
     *
     * @param integer $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = (int)$capacity;
    }

    /**
     * Returns basket's balls repository.
     *
     * @return BasketBalls
     */
    public function getBalls()
    {
        return $this->basketBalls;
    }

    /**
     * Adds ball to basket repository
     *
     * @param BallInterface $ball
     *
     * @return boolean
     */
    public function addBall(BallInterface $ball)
    {
        $balls = $this->getBalls();

        if ($balls->count() == $this->capacity) {
            return false;
        }

        $balls->addBall($ball);
        return true;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Entity\BasketInterface::__toString()
     */
    public function __toString()
    {
        return vsprintf(
            self::BASKET_STRING_PATTERN,
            array(
                $this->getName(),
                (string)$this->getBalls()
            )
        );
    }
}
