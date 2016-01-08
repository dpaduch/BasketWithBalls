<?php

namespace BasketWithBalls\Universe\Provider;

/**
 * Balls Provider Interface
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BallsProviderInterface
{
    /**
     * Provides ball.
     *
     * @return \BasketWithBalls\Universe\Entity\BallInterface
     */
    public function getBall();

    /**
     * Sets limit of provided elements.
     *
     * @param integer $size
     */
    public function setSize($size);

    /**
     * Returns size of provider.
     *
     * @return integer
     */
    public function getSize();

    /**
     * Resets the index of provided element.
     */
    public function reset();
}
