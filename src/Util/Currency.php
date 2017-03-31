<?php

namespace Util;

use Exception\CurrencyNotSupportedException;

class Currency
{
    const SUPPORTED_CURRENCIES = ['EUR'];

    /** @var  string */
    private $name;


    /**
     * Currency constructor.
     *
     * @param $name
     *
     * @throws CurrencyNotSupportedException
     */
    public function __construct( $name )
    {
        $this->isCurrencySupported($name);

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
     * @param $name
     *
     * @throws CurrencyNotSupportedException
     */
    private function isCurrencySupported($name)
    {
        if(!in_array($name, static::SUPPORTED_CURRENCIES)){
            throw new CurrencyNotSupportedException('Currency ' . $name . ' not supported. Allowed currencies: ' . print_r(static::SUPPORTED_CURRENCIES, true));
        }
    }



}