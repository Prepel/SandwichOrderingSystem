<?php

namespace Order;

use Sandwich\ToppedSandwich;
use Util\Currency;
use Util\Money;
use Util\PositiveInt;
use Util\PositiveFloat;

class OrderLine
{
    /** @var  ToppedSandwich */
    private $toppedSandwich;
    /** @var  PositiveInt */
    private $amount;
    /** @var  string */
    private $remark;

    /**
     * OrderLine constructor.
     *
     * @param ToppedSandwich $toppedSandwich
     * @param PositiveInt $amount
     * @param string $remark
     */
    public function __construct( ToppedSandwich $toppedSandwich, PositiveInt $amount, $remark )
    {
        $this->toppedSandwich = $toppedSandwich;
        $this->amount         = $amount;
        $this->remark         = $remark;
    }

    /**
     * @return ToppedSandwich
     */
    public function getToppedSandwich()
    {
        return $this->toppedSandwich;
    }

    /**
     * @return PositiveInt
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @return Money
     */
    public function getTotalPrice()
    {
        $totalPrice = $this->getToppedSandwich()->getMoney()->getAmount()->getAmount() * $this->getAmount()->getAmount();

        $currency = new Currency($this->getToppedSandwich()->getMoney()->getCurrency());
        $amount = new PositiveFloat($totalPrice);

        return new Money($currency, $amount);
    }

}
