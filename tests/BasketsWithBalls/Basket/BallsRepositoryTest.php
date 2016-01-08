<?php

namespace BasketWithBalls\Tests\Basket;

use BasketWithBalls\Basket\Repository\BasketBallsRepository;
use BasketWithBalls\Balls\Entity\Ball;

class BasketBallsRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $repository = new BasketBallsRepository();

        $this->assertInstanceOf(\ArrayIterator::class, $repository->getIterator());

        return $repository;
    }

    /**
     * @depends testCreate
     */
    public function testAddBall(BasketBallsRepository $repository)
    {
        $ball = new Ball(1);
        $repository->addBall($ball);

        $this->assertEquals(1, $repository->count());

        return $repository;
    }

    /**
     * @depends testAddBall
     */
    public function testIterator(BasketBallsRepository $repository)
    {
        $i = 0;
        foreach ($repository as $ball) {
            $i++;
        }

        $this->assertEquals(1, $i);
    }
}
