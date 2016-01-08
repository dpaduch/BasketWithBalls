<?php

namespace BasketWithBalls\Tests\Basket;

use BasketWithBalls\Basket;
use BasketWithBalls\Balls;

class BasketQueryTest extends \PHPUnit_Framework_TestCase
{
    protected $basketRepository;

    protected $ballsRepository;

    public function setUp()
    {
        $this->basketRepository = new Basket\Repository\BasketRepository();
        $this->basketRepository->addBasket(new Basket\Entity\Basket('test'));

        $this->ballsRepository = new Basket\Repository\BasketBallsRepository();
        $this->ballsRepository->addBall(new Balls\Entity\Ball(1));
    }

    public function testCreate()
    {
        $query = new Basket\Query\BasketQuery();
        return $query;
    }

    /**
     * @depends testCreate
     */
    public function testFetch(Basket\Query\BasketQuery $query)
    {
        $result = $query->fetchAll($this->basketRepository);
        $this->assertEquals(1, count($result));
        $this->assertInstanceOf(Basket\Entity\Basket::class, $result->get(0));
    }

    public function testCriteriaValid()
    {
        $criteria = $this->createCriteria(true);

        $query = new Basket\Query\BasketQuery(array($criteria));
        $result = $query->fetchAll($this->basketRepository);

        $this->assertEquals(1, $result->count());

        return $query;
    }

    public function testCriteriaNotValid()
    {
        $query = new Basket\Query\BasketQuery();
        $query->addCriteria($this->createCriteria(false));

        $result = $query->fetchAll($this->basketRepository);

        $this->assertEquals(0, $result->count());
    }

    private function createCriteria($valid = true)
    {
        $class = Basket\Query\Criteria\AbstractBallsCriteria::class;
        $criteria = $this->getMockForAbstractClass($class, array(
            $this->ballsRepository
        ));

        $criteria->expects($this->any())
            ->method('check')
            ->willReturn($valid)
        ;

        return $criteria;
    }
}
