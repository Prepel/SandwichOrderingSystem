<?php

namespace Util;

class PositiveFloat
{
    /** @var float */
    private $amount;

    /**
     * PositiveFloat constructor.
     *
     * @param $amount
     */
    public function __construct( $amount )
    {
        if(!is_float($amount) && $amount < 0){
            throw new \InvalidArgumentException('Parameter amount is not a positive float.');
        }
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $precision
     *
     * @return PositiveFloat
     */
    public function round($precision)
    {
        return new PositiveFloat(round($this->amount, $precision));
    }
}