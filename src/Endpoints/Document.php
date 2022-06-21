<?php

namespace PaymentProcessor\VoPay\Endpoints;

use PaymentProcessor\VoPay\Interfaces\VoPayContractEndpoint;
use PaymentProcessor\VoPay\Traits\Credentials;
use PaymentProcessor\VoPay\Traits\Endpoint;

/**
 * @method array postDocument(array $payload)
 */
class Document implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri(): VoPayContractEndpoint
    {
        $this->prefixUri = 'document';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints(): array
    {
        return [
            'post-document' => [
                'method' => 'POST',
                'uri' => '',
                'required' => ['DocumentName', 'DocumentContent', 'DocumentType']
            ],
            'get-document' => [
                'method' => 'GET',
                'uri' => '/{DocumentID}',
            ],
        ];
    }

    /**
     * @param array|null $payload
     * @param string|null $documentId
     *
     * @return array
     * @throws \PaymentProcessor\VoPay\Exceptions\InvalidEndpoint
     * @throws \PaymentProcessor\VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDocument(?array $payload = [], ?string $documentId = ''): array
    {
        return $this->singleCall('get-document', ['{DocumentID}' => $documentId], $payload);
    }
}
