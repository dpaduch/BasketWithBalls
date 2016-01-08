<?php

namespace PlayBalls\Tests;

use PlayBalls\ExactlyOneBallCriteria;
use BasketWithBalls\Balls;
use BasketWithBalls\Basket;

class ExactlyOneBallTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $balls = new Basket\Repository\BasketBallsRepository();
        $balls->addBall(new Balls\Entity\Ball(1));
        $balls->addBall(new Balls\Entity\Ball(2));

        return new ExactlyOneBallCriteria($balls);
    }

    /**
     * @depends testCreate
     */
    public function testCheckFalse(ExactlyOneBallCriteria $criteria)
    {
        $basket = new Basket\Entity\Basket('test', 2);
        $basket->getBalls()->addBall(new Balls\Entity\Ball(1));
        $basket->getBalls()->addBall(new Balls\Entity\Ball(2));

        $this->assertFalse($criteria->check($basket));
    }

    /**
     * @depends testCreate
     */
    public function testCheckTrue(ExactlyOneBallCriteria $criteria)
    {
        $basket = new Basket\Entity\Basket('test', 1);
        $basket->getBalls()->addBall(new Balls\Entity\Ball(1));

        $this->assertTrue($criteria->check($basket));
    }
}
