<?php

namespace Sandwich;

use Exception\FlavourNotSupportedException;

class Flavour
{
    const SUPPORTED_FLAVOURS = ['white', 'brown'];

    /** @var  string */
    private $name;

    /**
     * Flavour constructor.
     *
     * @param $name
     * @throws FlavourNotSupportedException
     */
    public function __construct( $name )
    {
        $this->isFlavourSupported($name);
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @throws FlavourNotSupportedException
     */
    private function isFlavourSupported($name)
    {
        if(!in_array($name, static::SUPPORTED_FLAVOURS)){
            throw new FlavourNotSupportedException('Flavour ' . $name . ' not supported. Allowed flavours: ' . print_r(static::SUPPORTED_FLAVOURS, true));
        }
    }

}