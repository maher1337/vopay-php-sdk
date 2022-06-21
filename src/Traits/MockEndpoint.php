<?php

namespace PaymentProcessor\VoPay\Traits;

use PaymentProcessor\VoPay\Exceptions\InvalidEndpoint;
use PaymentProcessor\VoPay\Requests\VoPayRequestMock;
use PaymentProcessor\VoPay\Utilities\Utility;

trait MockEndpoint
{
    /** @var array $endpoints */
    protected $endpoints = [];

    /** @var bool $success */
    private $success;

    public function __construct(?bool $success = true)
    {
        $this->success = $success;
        $this->endpoints = $this->getMock();
    }

    /**
     * @param string $function
     * @param $args
     *
     * @return array
     * @throws InvalidEndpoint
     * @throws \PaymentProcessor\VoPay\Exceptions\InvalidPayload
     * @throws \Exception
     */
    public function __call(string $function, $args): array
    {
        $endpointKey = Utility::endpointize($function);

        if (!array_key_exists($endpointKey, $this->endpoints)) {
            throw new \BadMethodCallException();
        }

        $endpoint = $this->getEndpoint($endpointKey);
        return $this->mock(new VoPayRequestMock($endpoint, $args[0] ?? []));
    }

    /**
     * @param string $key
     *
     * @return array
     * @throws InvalidEndpoint
     */
    private function getEndpoint(string $key): array
    {
        if (!($endpoint = $this->endpoints[$key] ?? null)) {
            throw new InvalidEndpoint();
        }

        return $endpoint;
    }

    /**
     * @param VoPayRequestMock $requestMock
     *
     * @return array
     */
    private function mock(VoPayRequestMock $requestMock): array
    {
        return $requestMock->getResponse();
    }
}
