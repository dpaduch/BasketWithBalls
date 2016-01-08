<?php

namespace BasketWithBalls\Basket\Query;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Universe\Repository\BasketRepositoryInterface;
use BasketWithBalls\Universe\Query\Criteria\BasketCriteriaInterface;
use BasketWithBalls\Basket\Repository\BasketRepository;

/**
 * Basket Query Class
 *
 * Fetches Basket entities from Basket repository usign specified criterias.
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class BasketQuery
{
    /**
     * Array of criterias for query.
     *
     * @var BasketCriteriaInterface[]
     */
    protected $criterias = [];

    /**
     * @param BasketCriteriaInterface[] $criterias
     */
    public function __construct(array $criterias = null)
    {
        if ($criterias) {
            foreach ($criterias as $criteria) {
                $this->addCriteria($criteria);
            }
        }
    }

    /**
     * Adds criteria to query.
     *
     * @param BasketCriteriaInterface $criteria
     */
    public function addCriteria(BasketCriteriaInterface $criteria)
    {
        $this->criterias[] = $criteria;
    }

    /**
     * Fetches all basket with query.
     *
     * @param BasketRepositoryInterface $baskets
     *
     * @return \BasketWithBalls\Basket\Repository\BasketRepository
     */
    public function fetchAll(BasketRepositoryInterface $baskets)
    {
        $result = new BasketRepository();
        foreach ($baskets as $basket) {
            if ($this->checkCriterias($basket)) {
                $result->addBasket($basket);
            }
        }
        return $result;
    }

    /**
     * Checks criteria for specified basket.
     *
     * @param BasketInterface $basket
     *
     * @return boolean
     */
    protected function checkCriterias(BasketInterface $basket)
    {
        foreach ($this->criterias as $criteria) {
            if (!$criteria->check($basket)) {
                return false;
            }
        }
        return true;
    }
}
