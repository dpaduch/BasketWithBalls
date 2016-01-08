<?php

namespace PlayBalls;

use BasketWithBalls\Basket;

/**
 * Scenario Registry Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class Registry extends \BasketWithBalls\Scenario\Registry
{
    /**
     * All baskets.
     *
     * @var Basket\Repository\BasketRepository
     */
    protected $baskets;

    /**
     * User's basket.
     *
     * @var Basket\Entity\Basket
     */
    protected $userBasket;

    public function __construct()
    {
        $this->baskets = new Basket\Repository\BasketRepository();
    }

    /**
     * Returns all baskests.
     *
     * @return Basket\Repository\BasketRepository
     */
    public function getBaskets()
    {
        return $this->baskets;
    }

    /**
     * Returns user's basket.
     *
     * @return \BasketWithBalls\Basket\Entity\Basket
     */
    public function getUserBasket()
    {
        return $this->userBasket;
    }

    /**
     * Sets user's basket.
     *
     * @param Basket\Entity\Basket $basket
     */
    public function setUserBasket(Basket\Entity\Basket $basket)
    {
        $this->userBasket = $basket;
    }
}
