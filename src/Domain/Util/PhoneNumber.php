<?php

namespace Domain\Util;

class PhoneNumber
{
    private $phoneNumber;

    /**
     * PhoneNumber constructor.
     *
     * @param $phoneNumber
     */
    public function __construct( $phoneNumber )
    {
        if($this->validatePhoneNumber($phoneNumber)) {
            throw new \InvalidArgumentException('Invalid phone number');
        }

        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    private function validatePhoneNumber($phoneNumber)
    {
        return (bool) preg_match('/0+([0-9]{8,12})/', $phoneNumber);
    }

}
