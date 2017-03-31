<?php

namespace Sandwich;

use Exception\SizeNotSupportedException;

class Size
{
    const SUPPORTED_SIZES = ['normal', 'big'];

    /** @var string */
    private $name;

    /**
     * Size constructor.
     *
     * @param string $name
     */
    public function __construct( $name )
    {
        $this->isSizeSupported($name);
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
     * @throws SizeNotSupportedException
     */
    private function isSizeSupported($name)
    {
        if(!in_array($name, static::SUPPORTED_SIZES)){
            throw new SizeNotSupportedException('Size ' . $name . ' not supported. Allowed sizes: ' . print_r(static::SUPPORTED_SIZES, true));
        }
    }

}