<?php

namespace PaymentProcessor\VoPay\Endpoints;

use PaymentProcessor\VoPay\Interfaces\VoPayContractEndpoint;
use PaymentProcessor\VoPay\Traits\Credentials;
use PaymentProcessor\VoPay\Traits\Endpoint;

/**
 * @method array generateEmbedUrl(array $payload)
 * @method array tokenInfo(array $payload)
 * @method array tokenize(?array $payload = [])
 */
class Iq11 implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri(): VoPayContractEndpoint
    {
        $this->prefixUri = 'iq11';

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
            'token-info' => [
                'method' => 'GET',
                'uri' => '/token-info',
                'required' => ['Token']
            ],
            'tokenize' => [
                'method' => 'POST',
                'uri' => '/tokenize',
            ],
        ];
    }
}
