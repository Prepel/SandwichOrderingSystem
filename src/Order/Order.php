<?php

namespace Order;

use Person\Person;
use Util\Currency;
use Util\Money;
use Util\PositiveAmount;

class Order
{
    /** @var OrderLine[] */
    private $orderLines;
    /** @var  Person */
    private $person;

    /**
     * Order constructor.
     *
     * @param OrderLine[] $orderLines
     * @param Person $person
     */
    public function __construct( array $orderLines, Person $person )
    {
        $this->orderLines = $orderLines;
        $this->person     = $person;
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
            $totalPrice += $orderline->getTotalPrice()->getPositiveAmount()->getAmount();
        }

        $currency = new Currency('EUR'); // TODO what if multiple currencies and how to calculate the price then.
        $positiveAmount = new PositiveAmount($totalPrice);

        return new Money($currency, $positiveAmount);
    }

}
