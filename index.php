<?php
error_reporting(E_ALL & ~E_WARNING);
ini_set('display_errors', 'On');

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/init.php';

$app = new Silex\Application();

$app[ 'debug' ] = true;

$app->register(
    new \Silex\Provider\TwigServiceProvider(), array( 'twig.path' => __DIR__ . '/templates' )
);

// step 1 logging in:
$app->get( '/', '\Controller\View\ViewController::renderPersonLoginOverview');

$app->get( '/order/{personName}', '\Controller\Order\OrderController::getUnprocessedOrdersByPerson' );

$app->get( '/sandwiches/{supplierId}', '\Controller\View\ViewController::renderSandwichOverviewPage' );
$app->get( '/order/{personName}', '\Controller\Order\OrderController::getUnprocessedOrdersByPerson' );

$app->run();