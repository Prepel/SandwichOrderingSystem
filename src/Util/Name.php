<?php

namespace Util;

class Name
{
    /** @var string */
    private $name;

    /**
     * Name constructor.
     *
     * @param string $name
     */
    public function __construct( $name )
    {
        if(!is_string($name) || mb_strlen($name) > 255) {
            throw new \InvalidArgumentException('name is not a string or length is greater than 255');
        }
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
