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
    /** @var  bool */
    private $processed;

    /**
     * OrderLine constructor.
     *
     * @param ToppedSandwich $toppedSandwich
     * @param PositiveInt $amount
     * @param string $remark
     * @param bool $processed
     */
    public function __construct( ToppedSandwich $toppedSandwich, PositiveInt $amount, $remark, $processed )
    {
        $this->toppedSandwich = $toppedSandwich;
        $this->amount         = $amount;
        $this->remark         = $remark;
        $this->processed      = $processed;
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
     * @return bool
     */
    public function isProcessed()
    {
        return $this->processed;
    }

    /**
     * @return Money
     */
    public function getTotalPrice()
    {
        $totalPrice = $this->getToppedSandwich()->getMoney()->getAmount()->getAmount() * $this->getAmount()->getAmount();

        $currency = new Currency( $this->getToppedSandwich()->getMoney()->getCurrency() );
        $amount   = new PositiveFloat( $totalPrice );

        return new Money( $currency, $amount );
    }

}
