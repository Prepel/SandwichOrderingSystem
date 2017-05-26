<?php

namespace Domain\Util;

class PositiveInt
{
    /** @var int */
    private $int;

    /**
     * PositiveInt constructor.
     *
     * @param $amount
     */
    public function __construct( $amount )
    {
        if(is_string($amount)){
            $amount = (int) $amount;
        }

        if(!is_integer($amount) || $amount < 0){
            throw new \InvalidArgumentException('Parameter amount is not a positive integer.');
        }
        $this->int = $amount;
    }

    /**
     * @return int
     */
    public function getInt()
    {
        return $this->int;
    }

}