<?php

namespace Domain\Sandwich;

use Domain\Util\Money;

class ToppedSandwich
{
    /** @var int */
    private $id;
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
     * @param int $id
     * @param Sandwich $sandwich
     * @param Topping $topping
     * @param Money $money
     * @param bool $active
     */
    public function __construct($id, Sandwich $sandwich, Topping $topping, Money $money, $active )
    {
        $this->id       = $id;
        $this->sandwich = $sandwich;
        $this->topping  = $topping;
        $this->money    = $money;
        $this->active   = $active;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }
}
