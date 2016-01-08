<?php

namespace BasketWithBalls\Balls\Entity;

use BasketWithBalls\Universe\Entity\BallInterface;

/**
 * Ball Entity class.
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class Ball implements BallInterface
{
    /**
     * Ball number.
     *
     * @var integer
     */
    private $number;

    /**
     * Pattern of string representation of ball
     *
     * @var string
     */
    const BALL_STRING_PATTERN = '(%d)';

    /**
     * @param integer $number Ball number
     */
    public function __construct($number)
    {
        $this->number = (int)$number;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Entity\BallInterface::getNumber()
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Returns string representation of ball.
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(self::BALL_STRING_PATTERN, $this->number);
    }
}
