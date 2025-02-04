<?php

namespace PaymentProcessor\VoPay\Exceptions;

class UndefinedCredentials extends \Exception
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct('VoPay: Undefined API credentials', $code, $previous);
    }
}
