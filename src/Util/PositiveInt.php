<?php

namespace Util;

class PositiveInt
{
    /** @var int */
    private $amount;

    /**
     * PositiveInt constructor.
     *
     * @param $amount
     */
    public function __construct( $amount )
    {
        if(!is_integer($amount) && $amount < 0){
            throw new \InvalidArgumentException('Parameter amount is not a positive integer.');
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

}