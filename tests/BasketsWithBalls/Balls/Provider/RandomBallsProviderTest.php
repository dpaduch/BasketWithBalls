<?php

namespace BasketWithBalls\Tests\Balls\Provider;

use BasketWithBalls\Balls;

class RandomBallsProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $provider;

    const SIZE = 10;

    public function setUp()
    {
        $this->provider = new Balls\Provider\RandomBallsProvider(self::SIZE);
    }

    public function testSize()
    {
        $this->assertEquals(self::SIZE, $this->provider->getSize());

        $balls = [];
        while (($ball = $this->provider->getBall())) {
            $balls[] = $ball;
        }

        $this->assertEquals(self::SIZE, count($balls));
    }
}
