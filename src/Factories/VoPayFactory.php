<?php

namespace PaymentProcessor\VoPay\Factories;

use PaymentProcessor\VoPay\Interfaces\VoPayContractEndpoint;

class VoPayFactory
{
    /**
     * @param string $class
     *
     * @return VoPayContractEndpoint
     */
    public static function build(string $class): VoPayContractEndpoint
    {
        if (!class_exists($class)) {
            throw new \BadMethodCallException();
        }

        return new $class();
    }
}
