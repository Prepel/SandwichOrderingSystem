<?php

namespace Sandwich;

use Exception\TypeNotSupportedException;
use Util\Name;

class Type
{
    const SUPPORTED_TYPES = ['pistolet', 'baguette'];

    /** @var  Name */
    private $name;

    /**
     * Type constructor.
     *
     * @param Name $name
     *
     * @throws TypeNotSupportedException
     */
    public function __construct( Name $name )
    {
        $this->isTypeSupported($name);
        $this->name = $name;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Name $name
     *
     * @throws TypeNotSupportedException
     */
    private function isTypeSupported($name)
    {
        if(!in_array($name->getName(), static::SUPPORTED_TYPES)){
            throw new TypeNotSupportedException('Type ' . $name->getName() . ' not supported. Allowed types: ' . print_r(static::SUPPORTED_TYPES, true));
        }
    }
}
