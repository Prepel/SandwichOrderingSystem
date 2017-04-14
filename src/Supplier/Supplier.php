<?php

namespace Supplier;

use Sandwich\ToppedSandwich;
use Util\Email;
use Util\PhoneNumber;

class Supplier
{
    /** @var  string */
    private $name;
    /** @var  Email */
    private $email;
    /** @var  PhoneNumber */
    private $phoneNumber;
    /** @var  ToppedSandwich[] */
    private $toppedSandwiches;

    /**
     * Supplier constructor.
     *
     * @param string $name
     * @param Email $email
     * @param PhoneNumber $phoneNumber
     * @param ToppedSandwich[] $toppedSandwiches
     */
    public function __construct( $name, Email $email, PhoneNumber $phoneNumber, array $toppedSandwiches )
    {
        $this->name             = $name;
        $this->email            = $email;
        $this->phoneNumber      = $phoneNumber;

        $this->addToppedSandwiches($toppedSandwiches);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return PhoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return ToppedSandwich[]
     */
    public function getToppedSandwiches()
    {
        return $this->toppedSandwiches;
    }

    /**
     * @param ToppedSandwich[] $toppedSandwiches
     */
    private function addToppedSandwiches(array $toppedSandwiches)
    {
        foreach($toppedSandwiches as $toppedSandwich) {
            if(!($toppedSandwich instanceof ToppedSandwich)) {
                throw new \InvalidArgumentException('(one of the) Given topped sandwiches are no instance of ToppedSandwich');
            }
            $this->toppedSandwiches[] = $toppedSandwich;
        }
    }
}
