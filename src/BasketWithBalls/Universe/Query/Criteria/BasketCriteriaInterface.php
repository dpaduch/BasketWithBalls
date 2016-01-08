<?php

namespace BasketWithBalls\Universe\Query\Criteria;

use BasketWithBalls\Universe\Entity\BasketInterface;

/**
 * Basket Criteria Interface
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
interface BasketCriteriaInterface
{
    /**
     * Checks criteria for specified Basket.
     *
     * @param BasketInterface $basket
     *
     * @return bool
     */
    public function check(BasketInterface $basket);
}
