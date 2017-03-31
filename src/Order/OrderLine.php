<?php

namespace Order;

use Sandwich\ToppedSandwich;
use Util\PositiveAmount;

class OrderLine
{
    /** @var  ToppedSandwich */
    private $toppedSandwich;
    /** @var  PositiveAmount */
    private $amount;
    /** @var  string */
    private $remark;

    /**
     * OrderLine constructor.
     *
     * @param ToppedSandwich $toppedSandwich
     * @param PositiveAmount $amount
     * @param string $remark
     */
    public function __construct( ToppedSandwich $toppedSandwich, PositiveAmount $amount, $remark )
    {
        $this->toppedSandwich = $toppedSandwich;
        $this->amount         = $amount;
        $this->remark         = $remark;
    }

    /**
     * @return ToppedSandwich
     */
    public function getToppedSandwich()
    {
        return $this->toppedSandwich;
    }

    /**
     * @return PositiveAmount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

}
