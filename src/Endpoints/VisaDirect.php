<?php

namespace maher1337\VoPay\Endpoints;

use maher1337\VoPay\Interfaces\VoPayContractEndpoint;
use maher1337\VoPay\Traits\Credentials;
use maher1337\VoPay\Traits\Endpoint;

/**
 * @method array generateEmbedUrl(array $payload)
 * @method array pushFunds(array $payload)
 * @method array pushFundsTransaction(array $payload)
 * @method array cardInfo(array $payload)
 */
class VisaDirect implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri(): VoPayContractEndpoint
    {
        $this->prefixUri = 'visa-direct';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints(): array
    {
        return [
            'generate-embed-url' => [
                'method' => 'POST',
                'uri' => '/generate-embed-url',
                'required' => ['RedirectURL']
            ],
            'push-funds' => [
                'method' => 'POST',
                'uri' => '/push-funds',
                'required' => ['Token', 'Amount', 'Currency']
            ],
            'push-funds-transaction' => [
                'method' => 'GET',
                'uri' => '/push-funds/transaction',
                'required' => ['TransactionID']
            ],
            'card-info' => [
                'method' => 'GET',
                'uri' => '/card-info',
                'required' => ['Token']
            ]
        ];
    }
}
