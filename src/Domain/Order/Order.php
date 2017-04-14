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
            $totalPrice += $orderline->getTotalPrice()->getAmount()->getAmount();
        }

        $currency = new Currency('EUR'); // TODO what if multiple currencies and how to calculate the price then.
        $amount = new PositiveFloat($totalPrice);

        return new Money($currency, $amount);
    }

}
