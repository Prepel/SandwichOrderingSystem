<?php

namespace Domain\Util;

class PositiveFloat
{
    /** @var float */
    private $float;

    /**
     * PositiveFloat constructor.
     *
     * @param $amount
     */
    public function __construct( $amount )
    {
        if(is_string($amount)){
            $amount = (float) $amount;
        }

        if(!is_float($amount) || $amount < 0){
            throw new \InvalidArgumentException('Parameter amount is not a positive float.');
        }
        $this->float = $amount;
    }

    /**
     * @return float
     */
    public function getFloat()
    {
        return $this->float;
    }

    /**
     * @param $precision
     *
     * @return PositiveFloat
     */
    public function round($precision)
    {
        return new PositiveFloat(round($this->float, $precision));
    }
}