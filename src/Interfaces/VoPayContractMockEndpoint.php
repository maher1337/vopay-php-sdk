<?php

namespace maher1337\VoPay\Interfaces;

interface VoPayContractMockEndpoint extends VoPayContract
{
    /**
     * @return array
     */
    public function getMock(): array;
}
