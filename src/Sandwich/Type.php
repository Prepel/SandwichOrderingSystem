<?php

namespace Sandwich;

use Exception\TypeNotSupportedException;

class Type
{
    const SUPPORTED_TYPES = ['pistolet', 'baguette'];

    /** @var  string */
    private $name;

    /**
     * Type constructor.
     *
     * @param string $name
     *
     * @throws TypeNotSupportedException
     */
    public function __construct( $name )
    {
        $this->isTypeSupported($name);
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
     * @param string $name
     *
     * @throws TypeNotSupportedException
     */
    private function isTypeSupported($name)
    {
        if(!in_array($name, static::SUPPORTED_TYPES)){
            throw new TypeNotSupportedException('Type ' . $name . ' not supported. Allowed types: ' . print_r(static::SUPPORTED_TYPES, true));
        }
    }
}
