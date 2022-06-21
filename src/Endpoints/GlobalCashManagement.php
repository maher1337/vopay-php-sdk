<?php

namespace maher1337\VoPay\Endpoints;

use maher1337\VoPay\Interfaces\VoPayContractEndpoint;
use maher1337\VoPay\Traits\Credentials;
use maher1337\VoPay\Traits\Endpoint;

/**
 * @method array currencies(?array $payload = [])
 * @method array conversion(array $payload)
 * @method array conversionTransaction(array $payload)
 * @method array conversionRate(array $payload)
 * @method array conversionQuote(array $payload)
 */
class GlobalCashManagement implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri(): VoPayContractEndpoint
    {
        $this->prefixUri = 'gcm';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints(): array
    {
        return [
            'currencies' => [
                'method' => 'GET',
                'uri' => '/currencies',
            ],
            'conversion' => [
                'method' => 'POST',
                'uri' => '/conversion',
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
            'conversion-transaction' => [
                'method' => 'GET',
                'uri' => '/conversion/transaction',
                'required' => ['TransactionID']
            ],
            'conversion-rate' => [
                'method' => 'GET',
                'uri' => '/conversion/rate',
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
            'conversion-quote' => [
                'method' => 'GET',
                'uri' => '/conversion/quote',
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
        ];
    }
}
