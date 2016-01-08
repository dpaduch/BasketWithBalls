<?php

namespace BasketWithBalls\Tests\Balls;

use BasketWithBalls\Balls;

class BallTest extends \PHPUnit_Framework_TestCase
{
    const BALL_NUMBER_1 = 1;

    public function testCreate()
    {
        $factory = new Balls\Factory\BallFactory();
        $ball = $factory->createBall(self::BALL_NUMBER_1);

        $this->assertInstanceOf(Balls\Entity\Ball::class, $ball);

        return $ball;
    }

    /**
     * @depends testCreate
     */
    public function testName(Balls\Entity\Ball $ball)
    {
        $this->assertEquals(self::BALL_NUMBER_1, $ball->getNumber());
    }

    /**
     * @depends testCreate
     */
    public function testToString(Balls\Entity\Ball $ball)
    {
        $string = sprintf(Balls\Entity\Ball::BALL_STRING_PATTERN, self::BALL_NUMBER_1);
        $this->assertTrue((string)$ball === $string);
    }
}