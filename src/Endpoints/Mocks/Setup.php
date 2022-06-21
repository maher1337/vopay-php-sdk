<?php

namespace maher1337\VoPay\Endpoints\Mocks;

use maher1337\VoPay\Interfaces\VoPayContractMockEndpoint;
use maher1337\VoPay\Traits\MockEndpoint;

/**
 * @method array setPlaidCredentials(array $payload)
 * @method array setFlinksCredentials(array $payload)
 * @method array setInveriteCredentials(array $payload)
 */
class Setup implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock(): array
    {
        return [
            'set-plaid-credentials' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'PlaidClientID' => '{PlaidClientID}',
                    'PlaidSecretKey' => '{PlaidSecretKey}',
                    'PlaidUrl' => '{PlaidUrl}',
                ],
                'required' => ['PlaidClientID', 'PlaidSecretKey', 'PlaidUrl']
            ],
            'set-flinks-credentials' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'FlinksUrl' => '{FlinksUrl}',
                    'Status' => '{Status}',
                ],
                'required' => ['FlinksUrl']
            ],
            'set-inverite-credentials' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'InveriteAPIKey' => '{InveriteAPIKey}',
                    'InveriteUrl' => '{InveriteUrl}',
                ],
                'required' => ['InveriteAPIKey', 'InveriteUrl']
            ],
        ];
    }
}
