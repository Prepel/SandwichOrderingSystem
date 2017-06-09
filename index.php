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

$verifyLoggedIn = function (\Symfony\Component\HttpFoundation\Request $request){
    $personController = new \Controller\Person\PersonController();
    return $personController->verifyLoggedIn($request);
};

// step 1 logging in:
$app->get( '/', '\Controller\View\ViewController::renderPersonLoginOverview');

//step 2 selecting supplier:
$app->get( '/selectSupplier', '\Controller\View\ViewController::renderSupplierSelectOverview')
    ->before($verifyLoggedIn);


$app->get( '/order/{personName}', '\Controller\Order\OrderController::getUnprocessedOrdersByPerson' )
    ->before($verifyLoggedIn);

$app->get( '/sandwiches/{supplierId}', '\Controller\View\ViewController::renderSandwichOverviewPage' )
    ->before($verifyLoggedIn);
$app->get( '/order/{personName}', '\Controller\Order\OrderController::getUnprocessedOrdersByPerson' )
    ->before($verifyLoggedIn);

// POST requests (form submits)
$app->post('/login/{personName}', '\Controller\Person\PersonController::registerPerson');

$app->run();