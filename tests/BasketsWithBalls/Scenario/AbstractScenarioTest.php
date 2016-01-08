<?php

namespace BasketWithBalls\Tests\Scenario;

use BasketWithBalls\Scenario;

class ScenarioTest extends \PHPUnit_Framework_TestCase
{
    const MAX_NUMBER_OF_BALL = 10;

    public function testCreate()
    {
        $registry = new Scenario\Registry();

        $class = Scenario\AbstractScenario::class;
        $scenario = $this->getMockForAbstractClass($class, array($registry));

        $scenario->expects($this->any())
            ->method('getMaximumNumberOfBall')
            ->willReturn(self::MAX_NUMBER_OF_BALL)
        ;

        return $scenario;
    }

    /**
     * @depends testCreate
     */
    public function testCommand(Scenario\AbstractScenario $scenario)
    {
        $scenario->addCommand(function ($registry) {
            $registry->result = true;
        });

        $scenario->run();

        $registry = $scenario->getRegistry();
        $this->assertTrue(isset($registry->result) && $registry->result);

        return $scenario;
    }

    /**
     * @depends testCommand
     */
    public function testCommandBreakProcess(Scenario\AbstractScenario $scenario)
    {
        $registry = $scenario->getRegistry();

        $scenario->addCommand(function ($registry) {
            $registry->result = false;
        });

        $scenario->run();
        $this->assertFalse($registry->result);

        $scenario->addCommand(function ($registry) {
            return false;
        });

        $scenario->addCommand(function ($registry) {
            $registry->result = true;
        });

        $scenario->run();
        $this->assertFalse($registry->result);
    }
}
