<?php

namespace BasketWithBalls\Universe\Factory;

use BasketWithBalls\Universe;

/**
 * Basket Factory Interface
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BasketFactoryInterface
{
    /**
     * @param string $name Basket name
     * @param string $capacity How many balls can handle
     */
    public function __construct($name, $capacity);

    /**
     * Loads balls provides using Ball Factory.
     *
     * @param Universe\Provider\BallsProviderInterface $provider
     * @param Universe\Factory\BallFactoryInterface $ballFactory
     *
     * @return bool
     */
    public function loadBalls(
        Universe\Provider\BallsProviderInterface $provider,
        Universe\Factory\BallFactoryInterface $ballFactory
    );

    /**
     * Returns created Basket Entity.
     *
     * @return Universe\Entity\BasketInterface
     */
    public function getBasket();

    /**
     * Creates basket entity.
     *
     * @param string $name Basket name
     * @param string $capacity How many balls can handle
     *
     * @return Universe\Entity\BasketInterface
     */
    public function createBasket($name, $capacity);
}
