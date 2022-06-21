<?php

namespace PaymentProcessor\VoPay\Endpoints;

use PaymentProcessor\VoPay\Interfaces\VoPayContractEndpoint;
use PaymentProcessor\VoPay\Traits\Credentials;
use PaymentProcessor\VoPay\Traits\Endpoint;

/**
 * @method array balance(?array $payload = [])
 * @method array transactions(array $payload)
 * @method array transactionsCancel(array $payload)
 * @method array transactionsRefund(array $payload)
 * @method array transactionConfirm(array $payload)
 * @method array webhookUrl(?array $payload = [])
 * @method array webhookUrlInfo(?array $payload = [])
 * @method array webhookUrlTest(?array $payload = [])
 * @method array transferTo(array $payload)
 * @method array transferFrom(array $payload)
 * @method array postAutoBalanceTransfer(array $payload)
 * @method array getAutoBalanceTransfer(?array $payload = [])
 * @method array autoBalanceTransferCancel(?array $payload = [])
 * @method array postAuthorizedIps(array $payload)
 * @method array getAuthorizedIps(?array $payload = [])
 */
class Account implements VoPayContractEndpoint
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
            'balance' => [
                'method' => 'GET',
                'uri' => '/balance',
            ],
            'transactions' => [
                'method' => 'GET',
                'uri' => '/transactions',
                'required' => ['StartDateTime', 'EndDateTime']
            ],
            'transactions-cancel' => [
                'method' => 'POST',
                'uri' => '/transactions/cancel',
                'required' => ['TransactionID']
            ],
            'transactions-refund' => [
                'method' => 'POST',
                'uri' => '/transactions/refund',
                'required' => ['TransactionID']
            ],
            'transaction-confirm' => [
                'method' => 'POST',
                'uri' => '/transaction/confirm',
                'required' => ['TransactionID']
            ],
            'webhook-url' => [
                'method' => 'POST',
                'uri' => '/webhook-url',
            ],
            'webhook-url-info' => [
                'method' => 'GET',
                'uri' => '/webhook-url/info',
            ],
            'webhook-url-test' => [
                'method' => 'GET',
                'uri' => '/webhook-url/test',
            ],
            'transfer-to' => [
                'method' => 'POST',
                'uri' => '/transfer-to',
                'required' => ['Amount', 'RecipientAccountID']
            ],
            'transfer-from' => [
                'method' => 'POST',
                'uri' => '/transfer-from',
                'required' => ['Amount', 'DebitorAccountID']
            ],
            'post-auto-balance-transfer' => [
                'method' => 'POST',
                'uri' => '/auto-balance-transfer',
                'required' => [
                    'ScheduleStartDate',
                    'AutoBalanceTransferAmount',
                    'TypeOfFrequency',
                    'AccountNumber',
                    'FinancialInstitutionNumber',
                    'BranchTransitNumber'
                ]
            ],
            'get-auto-balance-transfer' => [
                'method' => 'GET',
                'uri' => '/auto-balance-transfer',
            ],
            'auto-balance-transfer-cancel' => [
                'method' => 'POST',
                'uri' => '/auto-balance-transfer/cancel',
            ],
            'post-authorized-ips' => [
                'method' => 'POST',
                'uri' => '/authorized-ips',
                'required' => ['AuthorizedIPs']
            ],
            'get-authorized-ips' => [
                'method' => 'GET',
                'uri' => '/authorized-ips',
            ],
        ];
    }
}
