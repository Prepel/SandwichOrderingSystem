<?php

namespace Domain\Sandwich;

use Domain\Util\Money;

class ToppedSandwich
{
    /** @var Sandwich */
    private $sandwich;
    /** @var Topping */
    private $topping;
    /** @var Money */
    private $money;
    /** @var bool */
    private $active;

    /**
     * ToppedSandwich constructor.
     *
     * @param Sandwich $sandwich
     * @param Topping $topping
     * @param Money $money
     * @param bool $active
     */
    public function __construct( Sandwich $sandwich, Topping $topping, Money $money, $active )
    {
        $this->sandwich = $sandwich;
        $this->topping  = $topping;
        $this->money    = $money;
        $this->active   = $active;
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
