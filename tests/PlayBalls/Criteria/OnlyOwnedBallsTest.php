<?php

namespace PlayBalls\Tests;

use PlayBalls\OnlyOwnedBallsCriteria;
use BasketWithBalls\Balls;
use BasketWithBalls\Basket;

class OnlyOwnedBallsTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $balls = new Basket\Repository\BasketBallsRepository();
        $balls->addBall(new Balls\Entity\Ball(1));
        $balls->addBall(new Balls\Entity\Ball(2));

        return new OnlyOwnedBallsCriteria($balls);
    }

    /**
     * @depends testCreate
     */
    public function testCheckFalse(OnlyOwnedBallsCriteria $criteria)
    {
        $basket = new Basket\Entity\Basket('test');
        $basket->getBalls()->addBall(new Balls\Entity\Ball(1));
        $basket->getBalls()->addBall(new Balls\Entity\Ball(2));
        $basket->getBalls()->addBall(new Balls\Entity\Ball(3));

        $this->assertFalse($criteria->check($basket));
    }

    /**
     * @depends testCreate
     */
    public function testCheckTrue(OnlyOwnedBallsCriteria $criteria)
    {
        $basket = new Basket\Entity\Basket('test');
        $basket->getBalls()->addBall(new Balls\Entity\Ball(1));
        $basket->getBalls()->addBall(new Balls\Entity\Ball(2));

        $this->assertTrue($criteria->check($basket));
    }
}
