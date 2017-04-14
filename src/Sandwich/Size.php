<?php

namespace Sandwich;

use Exception\SizeNotSupportedException;
use Util\Name;

class Size
{
    const SUPPORTED_SIZES = ['normal', 'big'];

    /** @var Name */
    private $name;

    /**
     * Size constructor.
     *
     * @param Name $name
     */
    public function __construct( Name $name )
    {
        $this->isSizeSupported($name);
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
     * @throws SizeNotSupportedException
     */
    private function isSizeSupported(Name $name)
    {
        if(!in_array($name->getName(), static::SUPPORTED_SIZES)){
            throw new SizeNotSupportedException('Size ' . $name->getName() . ' not supported. Allowed sizes: ' . print_r(static::SUPPORTED_SIZES, true));
        }
    }

}