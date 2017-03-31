<?php

namespace Util;

use Exception\CurrencyNotSupportedException;

class Currency
{
    const ALLOWED_CURRENCIES = ['EUR'];

    /** @var  string */
    private $_name;


    /**
     * Currency constructor.
     *
     * @param $name
     *
     * @throws CurrencyNotSupportedException
     */
    public function __construct( $name )
    {
        $this->_isCurrencySupported($name);

        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param $name
     *
     * @throws CurrencyNotSupportedException
     */
    private function _isCurrencySupported($name)
    {
        if(!in_array($name, static::ALLOWED_CURRENCIES)){
            throw new CurrencyNotSupportedException('Currency ' . $name . ' not supported. Allowed currencies: ' . print_r(static::ALLOWED_CURRENCIES, true));
        }
    }



}