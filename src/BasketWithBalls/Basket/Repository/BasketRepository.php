<?php

namespace BasketWithBalls\Basket\Repository;

use BasketWithBalls\Universe\Entity\BasketInterface;
use BasketWithBalls\Universe\Repository\BasketRepositoryInterface;

/**
 * Baskets Repository Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class BasketRepository implements
    BasketRepositoryInterface,
    \IteratorAggregate
{
    /**
     * Array of baskets in repository.
     *
     * @var \ArrayIterator
     */
    private $baskets = [];

    public function __construct()
    {
        $this->baskets = new \ArrayIterator();
    }

    /**
     * Adds basket object to repository.
     *
     * @param BasketInterface $ball
     */
    public function addBasket(BasketInterface $basket)
    {
        $this->baskets[] = $basket;
    }

    /**
     * Returns count of repository items.
     *
     * @return number
     */
    public function count()
    {
        return count($this->baskets);
    }

    /**
     * Returns Basket object.
     *
     * @param integer $index
     *
     * @return BasketInterface|null
     */
    public function get($index)
    {
        return isset($this->baskets[$index])
            ? $this->baskets[$index]
            : null
        ;
    }

    /* (non-PHPdoc)
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator()
    {
        return $this->baskets;
    }

    /**
     * Returns sring representation of object.
     *
     * @return string
     */
    public function __toString()
    {
        $labels = array_map(
            function ($basket) {
                return $basket->getName();
            },
            iterator_to_array($this->baskets)
        );

        return implode(', ', $labels);
    }
}
