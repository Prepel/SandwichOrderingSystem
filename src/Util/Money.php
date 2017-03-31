<?php

namespace Util;

class Money
{
    /** @var Currency  */
    private $currency;
    /** @var PositiveAmount  */
    private $amount;

    /**
     * Money constructor.
     *
     * @param $currency
     * @param $amount
     */
    public function __construct( Currency $currency, PositiveAmount $amount )
    {
        $this->currency = $currency;
        $this->amount   = $amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return PositiveAmount
     */
    public function getAmount()
    {
        return $this->amount;
    }

}