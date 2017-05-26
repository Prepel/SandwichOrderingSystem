<?php

namespace Controller\Order;

use Controller\Sandwich\SandwichController;
use Dao\Dao;
use Domain\Order\Order;
use Domain\Order\OrderLine;
use Domain\Person\Person;
use Domain\Util\Name;
use Domain\Util\PositiveInt;

class OrderController
{
    /**
     * @param string $personName
     *
     * @return Order[]
     */
    public function getUnprocessedOrdersByPerson( $personName )
    {
        $dao                   = new Dao();
        $unprocessedOrdersData = $dao->getUnprocessedOrderByPersonName( $personName);

        return $this->createOrdersFromDatabaseData($unprocessedOrdersData);

    }

    /**
     * @param $ordersData
     *
     * @return Order[]
     */
    private function createOrdersFromDatabaseData( $ordersData )
    {
        /** @var Order[] $orders */
        $orders = [];
        $sandwichController = new SandwichController();

        foreach ($ordersData as $orderData) {
            $orderId = $orderData[ 'order_id' ];

            if (!array_key_exists( $orderId, $orders )) {
                $orders[ $orderId ] = new Order( new Person( new Name( $orderData[ 'person_name' ] ) ) );
            }

            $orders[ $orderId ]->addOrderLine(
                new OrderLine(
                    $sandwichController->getToppedSandwichById($orderData['topped_sandwich_id']),
                    new PositiveInt($orderData['amount']),
                    $orderData['remark'],
                    $orderData['processed']
                )
            );

        }

        return print_r($orders, true);
    }

}
