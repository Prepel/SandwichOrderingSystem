<?php

namespace Domain\Helpers;

use Domain\Sandwich\Topping;

class UniqueToppings
{
    /** @var  Topping[] */
    private $toppings;

    public function __construct()
    {
        $this->toppings = [];
    }

    public function addTopping(Topping $topping){
        if(!array_key_exists($topping->getName()->getName(), $this->toppings)){
            $this->toppings[$topping->getName()->getName()] = $topping;
        }
    }

    /**
     * @return Topping[]
     */
    public function getToppings()
    {
        return $this->toppings;
    }

}
