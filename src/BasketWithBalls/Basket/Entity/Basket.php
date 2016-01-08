<?php

namespace BasketWithBalls\Basket\Entity;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Basket\Repository\BasketBallsRepository;

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
     */
    public function __construct($name)
    {
        $this->name = $name;
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
     * Returns basket's balls repository.
     *
     * @return BasketBalls
     */
    public function getBalls()
    {
        return $this->basketBalls;
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
