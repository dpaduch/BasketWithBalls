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
     */
    public function __construct($name)
    {
        $this->basket = $this->createBasket($name);
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Factory\BasketFactoryInterface::loadBalls()
     */
    public function loadBalls(
        Universe\Provider\BallsProviderInterface $provider,
        Universe\Factory\BallFactoryInterface $ballFactory
    ) {
        $balls = $this->basket->getBalls();
        while (($number = $provider->getBall())) {
            $ball = $ballFactory->createBall($number);
            $balls->addBall($ball);
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
    public function createBasket($name)
    {
        return ($this->basket = new Basket\Entity\Basket($name));
    }
}
