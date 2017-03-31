<?php

namespace Sandwich;

use Util\Money;

class ToppedSandwich
{
    /** @var Sandwich */
    private $sandwich;
    /** @var Topping */
    private $topping;
    /** @var Money */
    private $money;

    /**
     * ToppedSandwich constructor.
     *
     * @param Sandwich $sandwich
     * @param Topping $topping
     * @param Money $money
     */
    public function __construct( Sandwich $sandwich, Topping $topping, Money $money )
    {
        $this->sandwich = $sandwich;
        $this->topping  = $topping;
        $this->money    = $money;
    }

    /**
     * @return Sandwich
     */
    public function getSandwich()
    {
        return $this->sandwich;
    }

    /**
     * @return Topping
     */
    public function getTopping()
    {
        return $this->topping;
    }

    /**
     * @return Money
     */
    public function getMoney()
    {
        return $this->money;
    }

}
