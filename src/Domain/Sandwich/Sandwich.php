<?php

namespace Domain\Sandwich;

class Sandwich
{
    /** @var  Type */
    private $type;
    /** @var  Size */
    private $size;
    /** @var  Flavour */
    private $flavour;

    /**
     * Sandwich constructor.
     *
     * @param Type $type
     * @param Size $size
     * @param Flavour $flavour
     */
    public function __construct( Type $type, Size $size, Flavour $flavour )
    {
        $this->type    = $type;
        $this->size    = $size;
        $this->flavour = $flavour;
    }

    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return Flavour
     */
    public function getFlavour()
    {
        return $this->flavour;
    }

}
