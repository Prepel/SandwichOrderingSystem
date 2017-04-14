<?php

namespace Sandwich;

use Util\Name;

class Topping
{
    /** @var  Name */
    private $name;

    /**
     * Topping constructor.
     *
     * @param Name $name
     */
    public function __construct( Name $name )
    {
        $this->name = $name;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

}
