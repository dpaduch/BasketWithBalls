<?php

namespace PlayBalls;

use \BasketWithBalls\Balls\Provider\CustomBallsProvider;

/**
 * User's input balls provider Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class UserBallsProvider extends CustomBallsProvider
{
    /**
     * Callback closure to get input.
     *
     * @var \Closure
     */
    protected $inputCallback;

    /**
     * @param \Closure $inputCallback Callback closure to get input
     */
    public function __construct(\Closure $inputCallback)
    {
        $this->inputCallback = $inputCallback;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Balls\Provider\CustomBallsProvider::getBall()
     */
    public function getBall()
    {
        if (!count($this->numbers)) {
            $this->setNumbers($this->suckUserBalls());
        }

        return parent::getBall();
    }

    /**
     * Reads and returns users balls from input ;)
     *
     * @return integer[]
     */
    protected function suckUserBalls()
    {
        $callback = $this->inputCallback;
        $data = $callback();
        $balls = array_map(
            function ($number) {
                return (int)$number;
            },
            explode(',', $data)
        );

        return $balls;
    }
}
