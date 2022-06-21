<?php

namespace maher1337\VoPay\Endpoints;

use maher1337\VoPay\Interfaces\VoPayContractEndpoint;
use maher1337\VoPay\Traits\Credentials;
use maher1337\VoPay\Traits\Endpoint;

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
