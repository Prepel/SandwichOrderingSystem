<?php

namespace Util;

class Email
{
    private $email;

    /**
     * Email constructor.
     *
     * @param $email
     */
    public function __construct( $email )
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email.');
        }
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}
