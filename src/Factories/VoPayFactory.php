<?php

namespace maher1337\VoPay\Factories;

use maher1337\VoPay\Interfaces\VoPayContractEndpoint;

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
