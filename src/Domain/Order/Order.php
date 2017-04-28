<?php

namespace Domain\Order;

use Domain\Person\Person;
use Domain\Util\Currency;
use Domain\Util\Money;
use Domain\Util\PositiveFloat;

class Order
{
    /** @var OrderLine[] */
    private $orderLines;
    /** @var  Person */
    private $person;

    /**
     * Order constructor.
     *
     * @param Person $person
     */
    public function __construct( Person $person )
    {
        $this->person = $person;
    }

    /**
     * @param OrderLine $orderLine
     */
    public function addOrderLine( $orderLine )
    {
        // TODO logic if allowed?
        $this->orderLines[] = $orderLine;
    }

    /**
     * @return OrderLine[]
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @return Money
     */
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->orderLines as $orderline) {
            $totalPrice += $orderline->getTotalPrice()->getAmount()->getAmount();
        }

        $currency = new Currency( 'EUR' ); // TODO what if multiple currencies and how to calculate the price then.
        $amount   = new PositiveFloat( $totalPrice );

        return new Money( $currency, $amount );
    }

}
