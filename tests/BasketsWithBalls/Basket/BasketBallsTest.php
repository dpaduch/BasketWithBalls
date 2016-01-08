<?php

namespace BasketWithBalls\Tests\Basket;

use BasketWithBalls\Basket;
use BasketWithBalls\Balls;

class BasketBallsTest extends \PHPUnit_Framework_TestCase
{
    public function testBasketWithBalls()
    {
        $basketFactory = new Basket\Factory\BasketFactory('Test', 2);
        $basket = $basketFactory->getBasket();

        $numbers = array(1, 2);

        $provider = new Balls\Provider\CustomBallsProvider($numbers);
        $provider->setNumbers($numbers);

        $basketFactory->loadBalls($provider, new Balls\Factory\BallFactory());

        $this->assertEquals($numbers, $basket->getBalls()->toArray());
    }

    public function testBasketCapacity()
    {
        $basket = new Basket\Entity\Basket('Test', 2);
        $basket->addBall(new Balls\Entity\Ball(1));
        $basket->addBall(new Balls\Entity\Ball(2));

        $this->assertFalse($basket->addBall(new Balls\Entity\Ball(3)));
    }
}
