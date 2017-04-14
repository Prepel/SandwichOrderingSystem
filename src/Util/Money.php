<?php

namespace Util;

class Money
{
    /** @var Currency  */
    private $currency;
    /** @var PositiveFloat  */
    private $amount;

    /**
     * Money constructor.
     *
     * @param $currency
     * @param $amount
     */
    public function __construct( Currency $currency, PositiveFloat $amount )
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
     * @return PositiveFloat
     */
    public function getAmount()
    {
        return $this->amount->round(2);
    }
}