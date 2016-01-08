<?php

namespace PlayBalls\Tests;

use PlayBalls\UserBallsProvider;

class UserBallsProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $provider;

    const USER_INPUT_1 = '1,2,3';

    public function setUp()
    {
        $this->provider = new UserBallsProvider(function() {
            return self::USER_INPUT_1;
        });
    }

    public function testNumbers()
    {
        $balls = [];
        while (($ball = $this->provider->getBall())) {
            $balls[] = $ball;
        }
        $this->assertEquals(explode(',', self::USER_INPUT_1), $balls);
    }
}
