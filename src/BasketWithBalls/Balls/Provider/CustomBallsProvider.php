<?php

namespace BasketWithBalls\Balls\Provider;

use BasketWithBalls\Universe;

/**
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class CustomBallsProvider implements Universe\Provider\BallsProviderInterface
{
    /**
     * @var \SplFixedArray
     */
    protected $numbers;

    public function __construct()
    {
        $this->numbers = \SplFixedArray::fromArray(array());
        $this->reset();
    }

    /**
     * Sets numbers to provide
     *
     * @param array $numbers
     */
    public function setNumbers(array $numbers)
    {
        $numbers = array_unique($numbers);
        $this->numbers = \SplFixedArray::fromArray($numbers);
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Provider\BallsProviderInterface::getBall()
     */
    public function getBall()
    {
        $ball = current($this->numbers);
        next($this->numbers);

        return $ball;
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Provider\BallsProviderInterface::setSize()
     */
    public function setSize($size)
    {
        return $this->numbers->setSize($size);
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Provider\BallsProviderInterface::getSize()
     */
    public function getSize()
    {
        return $this->numbers->getSize();
    }

    /* (non-PHPdoc)
     * @see \BasketWithBalls\Universe\Provider\BallsProviderInterface::reset()
     */
    public function reset()
    {
        return reset($this->numbers);
    }
}
