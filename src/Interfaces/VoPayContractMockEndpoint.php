<?php

namespace PaymentProcessor\VoPay\Interfaces;

interface VoPayContractMockEndpoint extends VoPayContract
{
    /**
     * @return array
     */
    public function getMock(): array;
}
