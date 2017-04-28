<?php

namespace Domain\Supplier;

use Domain\Sandwich\ToppedSandwich;
use Domain\Util\Email;
use Domain\Util\Name;
use Domain\Util\PhoneNumber;

class Supplier
{
    /** @var  int */
    private $id;
    /** @var Name */
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
     * @param int $id
     * @param Name $name
     * @param Email $email
     * @param PhoneNumber $phoneNumber
     * @param ToppedSandwich[] $toppedSandwiches
     */
    public function __construct( $id, Name $name, Email $email, PhoneNumber $phoneNumber, array $toppedSandwiches )
    {
        $this->id               = $id;
        $this->name             = $name;
        $this->email            = $email;
        $this->phoneNumber      = $phoneNumber;

        $this->addToppedSandwiches($toppedSandwiches);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Name
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
