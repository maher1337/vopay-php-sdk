<?php

namespace PaymentProcessor\VoPay;

use PaymentProcessor\VoPay\Exceptions\UndefinedCredentials;
use PaymentProcessor\VoPay\Factories\VoPayFactory;
use PaymentProcessor\VoPay\Interfaces\VoPayContractEndpoint;
use PaymentProcessor\VoPay\Traits\Credentials;
use PaymentProcessor\VoPay\Utilities\Utility;

/**
 * @method \PaymentProcessor\VoPay\Endpoints\Account account()
 * @method \PaymentProcessor\VoPay\Endpoints\AccountOnboarding accountOnboarding()
 * @method \PaymentProcessor\VoPay\Endpoints\ClientAccount clientAccount()
 * @method \PaymentProcessor\VoPay\Endpoints\Document document()
 * @method \PaymentProcessor\VoPay\Endpoints\ElectronicFundsTransfer electronicFundsTransfer()
 * @method \PaymentProcessor\VoPay\Endpoints\GlobalCashManagement globalCashManagement()
 * @method \PaymentProcessor\VoPay\Endpoints\Interac interac()
 * @method \PaymentProcessor\VoPay\Endpoints\Iq11 iq11()
 * @method \PaymentProcessor\VoPay\Endpoints\Partner partner()
 * @method \PaymentProcessor\VoPay\Endpoints\PayLink payLink()
 * @method \PaymentProcessor\VoPay\Endpoints\Setup setup()
 * @method \PaymentProcessor\VoPay\Endpoints\SubAccount subAccount()
 * @method \PaymentProcessor\VoPay\Endpoints\VisaDirect visaDirect()
 */
class VoPay
{
    use Credentials;

    /**
     * @param string $accountId
     * @param string $apiKey
     * @param string $apiSecret
     *
     * @throws UndefinedCredentials
     */
    public function __construct(string $accountId, string $apiKey, string $apiSecret)
    {
        $this->accountId = $accountId;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        if (!$this->accountId || !$this->apiKey) {
            throw new UndefinedCredentials();
        }
    }

    /**
     * @param string $method
     * @param $args
     *
     * @return VoPayContractEndpoint
     */
    public function __call(string $method, $args): VoPayContractEndpoint
    {
        $objectEndpoint = VoPayFactory::build(
            __NAMESPACE__ . '\\Endpoints\\' . Utility::classize($method)
        );

        return $objectEndpoint->setCredentials($this->accountId, $this->apiKey, $this->apiSecret);
    }
}
