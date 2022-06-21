<?php

namespace maher1337\VoPay\Endpoints;

use maher1337\VoPay\Interfaces\VoPayContractEndpoint;
use maher1337\VoPay\Traits\Credentials;
use maher1337\VoPay\Traits\Endpoint;

/**
 * @method array setPlaidCredentials(array $payload)
 * @method array setFlinksCredentials(array $payload)
 * @method array setInveriteCredentials(array $payload)
 */
class Setup implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri(): VoPayContractEndpoint
    {
        $this->prefixUri = 'account';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints(): array
    {
        return [
            'set-plaid-credentials' => [
                'method' => 'POST',
                'uri' => '/set-plaid-credentials',
                'required' => ['PlaidClientID', 'PlaidSecretKey', 'PlaidUrl']
            ],
            'set-flinks-credentials' => [
                'method' => 'POST',
                'uri' => '/set-flinks-credentials',
                'required' => ['FlinksUrl']
            ],
            'set-inverite-credentials' => [
                'method' => 'POST',
                'uri' => '/set-inverite-credentials',
                'required' => ['InveriteAPIKey', 'InveriteUrl']
            ],
        ];
    }
}
