<?php

namespace BasketWithBalls\Basket\Factory;

use BasketWithBalls\Universe;
use BasketWithBalls\Basket;

/**
 * Basket Factory Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class BasketFactory implements Universe\Factory\BasketFactoryInterface
{
    /**
     * @var Basket\Entity\Basket
     */
    private $basket;

    /**
     * @param string $name Basket's name
     * @param string $capacity How many balls can fill
     */
    public function __construct($name, $capacity)
    {
        $this->basket = $this->createBasket($name, $capacity);
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Factory\BasketFactoryInterface::loadBalls()
     */
    public function loadBalls(
        Universe\Provider\BallsProviderInterface $provider,
        Universe\Factory\BallFactoryInterface $ballFactory
    ) {
        while (($number = $provider->getBall())) {
            $ball = $ballFactory->createBall($number);
            $this->basket->addBall($ball);
        }

        return true;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Factory\BasketFactoryInterface::getBasket()
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Factory\BasketFactoryInterface::createBasket()
     */
    public function createBasket($name, $capacity)
    {
        return ($this->basket = new Basket\Entity\Basket($name, $capacity));
    }
}
