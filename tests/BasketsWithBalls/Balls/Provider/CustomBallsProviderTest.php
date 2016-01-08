<?php

namespace BasketWithBalls\Tests\Balls\Provider;

use BasketWithBalls\Balls;

class CustomBallsProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $provider;

    public function setUp()
    {
        $this->provider = new Balls\Provider\CustomBallsProvider();
    }

    public function testNumbers()
    {
        $numbers = array(3, 2, 1);
        $this->provider->setNumbers($numbers);

        $i = 0;
        while (($ball = $this->provider->getBall())) {
            $this->assertEquals($numbers[$i++], $ball);
        }

        return $numbers;
    }

    /**
     * @depends testNumbers
     */
    public function testSize($numbers)
    {
        $numbers = array(1, 2);
        $this->provider->setNumbers($numbers);
        $this->assertEquals(count($numbers), $this->provider->getSize());

        $this->provider->setSize(1);
        $this->assertEquals(1, $this->provider->getSize());
    }
}