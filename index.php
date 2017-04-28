<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/init.php';

$app = new Silex\Application();

$app->get( '/order/{personName}', '\Controller\Order\OrderController:getUnprocessedOrdersByPerson' );
