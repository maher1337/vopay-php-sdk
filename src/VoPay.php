<?php

namespace maher1337\VoPay;

use maher1337\VoPay\Exceptions\UndefinedCredentials;
use maher1337\VoPay\Factories\VoPayFactory;
use maher1337\VoPay\Interfaces\VoPayContractEndpoint;
use maher1337\VoPay\Traits\Credentials;
use maher1337\VoPay\Utilities\Utility;

/**
 * @method \maher1337\VoPay\Endpoints\Account account()
 * @method \maher1337\VoPay\Endpoints\AccountOnboarding accountOnboarding()
 * @method \maher1337\VoPay\Endpoints\ClientAccount clientAccount()
 * @method \maher1337\VoPay\Endpoints\Document document()
 * @method \maher1337\VoPay\Endpoints\ElectronicFundsTransfer electronicFundsTransfer()
 * @method \maher1337\VoPay\Endpoints\GlobalCashManagement globalCashManagement()
 * @method \maher1337\VoPay\Endpoints\Interac interac()
 * @method \maher1337\VoPay\Endpoints\Iq11 iq11()
 * @method \maher1337\VoPay\Endpoints\Partner partner()
 * @method \maher1337\VoPay\Endpoints\PayLink payLink()
 * @method \maher1337\VoPay\Endpoints\Setup setup()
 * @method \maher1337\VoPay\Endpoints\SubAccount subAccount()
 * @method \maher1337\VoPay\Endpoints\VisaDirect visaDirect()
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
