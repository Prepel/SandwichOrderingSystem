<?php

namespace Util;

class PositiveAmount
{
    /** @var float */
    private $_amount;

    /**
     * PositiveAmount constructor.
     *
     * @param $_amount
     */
    public function __construct( $_amount )
    {
        $this->_amount = $_amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * @return float
     */
    public function getRoundedAmount()
    {
        return round($this->_amount, 2);
    }

}