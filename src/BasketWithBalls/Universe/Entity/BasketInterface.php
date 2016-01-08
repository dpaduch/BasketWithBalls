<?php

namespace BasketWithBalls\Universe\Entity;

/**
 * Interface of Basket in Universe
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BasketInterface
{
    /**
     * @param string $name
     * @param integer $size
     */
    public function __construct($name, $size);

    /**
     * Returns name of the basket.
     *
     * @return string
     */
    public function getName();

    /**
     * Returns Balls repository.
     *
     * @return BasketBallsInterface
     */
    public function getBalls();

    /**
     * Returns string representation of Basket Object.
     *
     * @return string
     */
    public function __toString();
}
