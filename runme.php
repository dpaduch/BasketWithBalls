<?php

error_reporting(E_ALL);
chdir(__DIR__);

require_once 'vendor/autoload.php';

use BasketWithBalls\Balls;
use BasketWithBalls\Basket;

$scenario = new PlayBalls\Scenario(new PlayBalls\Registry);

/**
 * List all baskets and its balls in universe
 */
$scenario->addCommand(function($registry)
    use ($scenario)
{
    // 30 random baskets up to 10 bills
    for ($i = 1; $i <= 10; $i++) {

        $baskets = $registry->getBaskets();

        $provider = new Balls\Provider\RandomBallsProvider($scenario->getMaximumNumberOfBall());
        $provider->setSize(rand(1, 10));

        $basketFactory = new Basket\Factory\BasketFactory('#' . $i);
        $basketFactory->loadBalls($provider, new Balls\Factory\BallFactory());

        $basket = $basketFactory->getBasket();
        $baskets->addBasket($basket);

        echo 'Basket ' . (string)$basket . "\n";
    }
});

/**
 * Create User's basket and fill it from input
 */
$scenario->addCommand(function($registry)
{
    $provider = new PlayBalls\UserBallsProvider(function() {
        echo 'Please insert your bills numbers separated by comma and press enter: ' . "\n";
        return readline();
    });

    $basketFactory = new Basket\Factory\BasketFactory('User\'s Basket');
    $basketFactory->loadBalls($provider, new Balls\Factory\BallFactory());

    $basket = $basketFactory->getBasket();
    $registry->setUserBasket($basket);

    echo (string)$basket . "\n";
});

/**
 * Find answer to B - baskets, that have only balls owned by the user
 */
$scenario->addCommand(function($registry)
{
    if (!($userBasket = $registry->getUserBasket())) {
        return;
    }

    $query = new Basket\Query\BasketQuery(array(
        new PlayBalls\OnlyOwnedBallsCriteria($userBasket->getBalls())
    ));

    $result = $query->fetchAll($registry->getBaskets());

    echo 'Answer to B: ' . (string)$result . "\n";
});

/**
 * Find answer to C - baskets, that have only balls owned by the user
 */
$scenario->addCommand(function($registry)
{
    if (!($userBasket = $registry->getUserBasket())) {
        return;
    }

    $query = new Basket\Query\BasketQuery(array(
        new PlayBalls\ExactlyOneBallCriteria($userBasket->getBalls())
    ));

    $result = $query->fetchAll($registry->getBaskets());

    echo 'Answer to C: ' . (string)$result . "\n";
});

$scenario->run();

