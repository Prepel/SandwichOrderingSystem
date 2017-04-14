<?php

namespace Person;

use Util\Name;

class Person
{
    /** @var Name */
    private $name;

    /**
     * Person constructor.
     *
     * @param Name $name
     */
    public function __construct( Name $name )
    {
        $this->name = $name;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

}
