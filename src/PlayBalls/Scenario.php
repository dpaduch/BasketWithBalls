<?php

namespace PlayBalls;

/**
 * Game Scenario Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class Scenario extends \BasketWithBalls\Scenario\AbstractScenario
{
    /* (non-PHPdoc)
     * @see \BasketWithBalls\Scenario\AbstractScenario::getMaximumNumberOfBall()
     */
    public function getMaximumNumberOfBall()
    {
        return 999;
    }
}
