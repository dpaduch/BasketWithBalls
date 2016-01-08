<?php

namespace BasketWithBalls\Tests\Basket;

use BasketWithBalls\Basket;
use BasketWithBalls\Balls;

class BasketBallsTest extends \PHPUnit_Framework_TestCase
{
    public function testBasketWithBalls()
    {
        $basketFactory = new Basket\Factory\BasketFactory('Test');
        $basket = $basketFactory->getBasket();

        $numbers = array(1, 2);

        $provider = new Balls\Provider\CustomBallsProvider($numbers);
        $provider->setNumbers($numbers);

        $basketFactory->loadBalls($provider, new Balls\Factory\BallFactory());

        $this->assertEquals($numbers, $basket->getBalls()->toArray());
    }
}
