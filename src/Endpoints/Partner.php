<?php

namespace PaymentProcessor\VoPay\Endpoints;

use PaymentProcessor\VoPay\Interfaces\VoPayContractEndpoint;
use PaymentProcessor\VoPay\Traits\Credentials;
use PaymentProcessor\VoPay\Traits\Endpoint;

/**
 * @method array postAccount(array $payload)
 * @method array getAccount(?array $payload = [])
 * @method array setPermissions(?array $payload = [])
 */
class Partner implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri(): VoPayContractEndpoint
    {
        $this->prefixUri = 'partner';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints(): array
    {
        return [
            'post-account' => [
                'method' => 'POST',
                'uri' => '/account',
                'required' => ['Name', 'EmailAddress']
            ],
            'get-account' => [
                'method' => 'GET',
                'uri' => '/account'
            ],
            'set-permissions' => [
                'method' => 'POST',
                'uri' => '/account/set-permissions'
            ],
        ];
    }
}
