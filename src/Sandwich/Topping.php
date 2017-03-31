<?php

namespace Sandwich;

class Topping
{
    /** @var  string */
    private $name;

    /**
     * Topping constructor.
     *
     * @param string $name
     */
    public function __construct( $name )
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}
