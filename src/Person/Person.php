<?php

namespace Person;

class Person
{
    /** @var  $name */
    private $name;

    /**
     * Person constructor.
     *
     * @param $name
     */
    public function __construct( $name )
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}
