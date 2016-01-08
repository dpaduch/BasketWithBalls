<?php

namespace BasketWithBalls\Tests\Basket;

use BasketWithBalls\Basket;

class BasketTest extends \PHPUnit_Framework_TestCase
{
    const BASKET_NAME_TEST = 'TEST';

    public function testCreate()
    {
        $basketFactory = new Basket\Factory\BasketFactory(self::BASKET_NAME_TEST, 10);
        $basket = $basketFactory->getBasket();

        $this->assertInstanceOf(Basket\Entity\Basket::class, $basket);

        return $basket;
    }

    /**
     * @depends testCreate
     */
    public function testName(Basket\Entity\Basket $basket)
    {
        $this->assertEquals(self::BASKET_NAME_TEST, $basket->getName());
    }

    /**
     * @depends testCreate
     */
    public function testHaveBalls(Basket\Entity\Basket $basket)
    {
        $balls = $basket->getBalls();
        $this->assertInstanceOf(Basket\Repository\BasketBallsRepository::class, $balls);
    }

    /**
     * @depends testCreate
     */
    public function testToString(Basket\Entity\Basket $basket)
    {
        $balls = $basket->getBalls();
        $string = vsprintf(Basket\Entity\Basket::BASKET_STRING_PATTERN, array(
            $basket->getName(),
            (string)$basket->getBalls(),
        ));

        $this->assertEquals($string, (string)$basket);
    }
}
