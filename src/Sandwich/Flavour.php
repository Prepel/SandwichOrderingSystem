<?php

namespace Sandwich;

use Exception\FlavourNotSupportedException;
use Util\Name;

class Flavour
{
    const SUPPORTED_FLAVOURS = ['white', 'brown'];

    /** @var Name */
    private $name;

    /**
     * Flavour constructor.
     *
     * @param Name $name
     * @throws FlavourNotSupportedException
     */
    public function __construct( Name $name )
    {
        $this->isFlavourSupported($name);
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
     * @throws FlavourNotSupportedException
     */
    private function isFlavourSupported( Name $name)
    {
        if(!in_array($name->getName(), static::SUPPORTED_FLAVOURS)){
            throw new FlavourNotSupportedException('Flavour ' . $name->getName() . ' not supported. Allowed flavours: ' . print_r(static::SUPPORTED_FLAVOURS, true));
        }
    }

}