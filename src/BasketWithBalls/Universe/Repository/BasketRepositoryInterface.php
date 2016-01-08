<?php

namespace BasketWithBalls\Universe\Repository;

use BasketWithBalls\Universe\Entity;

/**
 * Baskets Repository Interface
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BasketRepositoryInterface
{
    /**
     * Adds basket to repository.
     *
     * @param Entity\BasketInterface $basket
     */
    public function addBasket(Entity\BasketInterface $basket);
}
