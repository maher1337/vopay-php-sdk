<?php

namespace maher1337\VoPay\Requests;

use maher1337\VoPay\Exceptions\InvalidPayload;
use maher1337\VoPay\Interfaces\VoPayRequestContract;

class VoPayRequestMock extends AbstractRequest implements VoPayRequestContract
{
    /** @var array response */
    private $response;

    /**
     * @param array $endpoint
     * @param array|null $payload
     *
     * @throws InvalidPayload
     */
    public function __construct(array $endpoint, ?array $payload = [])
    {
        $this->response = $endpoint['mock'];
        $this->required = $endpoint['required'] ?? [];

        $this->payload = $payload;

        if (!$this->isValidPayload()) {
            throw new InvalidPayload();
        }
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }
}
