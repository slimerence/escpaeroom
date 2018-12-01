<?php

namespace Smartbro\Models;


/**
 * Class Merchant
 * Merchant object is instantiated using DI (dependencies.php) with the settings in $configArray (settings.php)
 * Holds the Merchant Credentials, URLS used across most of the Transactions that require Merchant Info
 *
 * @package App\Models
 */

class Merchant
{
    private $gatewayBaseUrl = "https://paymentgateway.commbank.com.au";
    private $gatewayUrl = "https://paymentgateway.commbank.com.au";
    private $debug = FALSE;
    private $version = "50";
    private $currency = "AUD";
    private $merchantId = "TESTLYZGROCOM201";
    private $password = "0dc5600dfe66466af2dc3f664b81a886";
    private $apiUsername = "escaperoom";
    private $sessionJsUrl = "";
    private $checkoutJsUrl = "";
    private $checkoutSessionUrl = "";
    private $pkiBaseUrl = "";
    private $certificatePath = "";
    private $certificateAuth = FALSE;
    //NOTE: THESE VALUES ARE SET FOR PRODUCTION ENV, for DEVELOPMENT mode settings - follow the authentication section in the README guide.
    private $certificateVerifyPeer = TRUE;
    private $certificateVerifyHost = 1;
    private $hostedSessionUrl = "https://paymentgateway.commbank.com.au";

    /**
     * Merchant constructor.
     * @param $configArray
     */
    public function __construct()
    {
        $this->sessionJsUrl = $this->hostedSessionUrl . '/version/' . $this->version . '/merchant/' . $this->merchantId . '/session.js';
        $this->checkoutSessionUrl = $this->gatewayUrl . '/api/rest/version/' . $this->version . '/merchant/' . $this->merchantId . '/session';
        $this->checkoutJsUrl = $this->gatewayBaseUrl . '/checkout/version/' . $this->version . '/checkout.js';
        $this->certificateAuth = true;
            //Set the gateway-url back to SSL URL if Certificate Auth is being used
        $this->gatewayUrl = $this->pkiBaseUrl . '/api/rest';
    }

    public function GetGatewayUrl()
    {
        return $this->gatewayUrl;
    }

    public function GetGatewayBaseUrl()
    {
        return $this->gatewayBaseUrl;
    }

    public function GetPKIBaseUrl()
    {
        return $this->pkiBaseUrl;
    }

    public function GetHostedSessionUrl()
    {
        return $this->hostedSessionUrl;
    }

    public function GetDebug()
    {
        return $this->debug;
    }

    public function GetVersion()
    {
        return $this->version;
    }

    public function GetCurrency()
    {
        return $this->currency;
    }

    public function GetMerchantId()
    {
        return $this->merchantId;
    }

    public function GetPassword()
    {
        return $this->password;
    }

    public function GetApiUsername()
    {
        return $this->apiUsername;
    }

    public function GetSessionJsUrl()
    {
        return $this->sessionJsUrl;
    }

    public function GetCheckoutJSUrl()
    {
        return $this->checkoutJsUrl;
    }

    public function GetCheckoutSessionUrl()
    {
        return $this->checkoutSessionUrl;
    }

    public function GetCertificatePath()
    {
        return $this->certificatePath;
    }

    public function GetCertificateAuth()
    {
        return $this->certificateAuth;
    }

    public function isCertificateVerifyPeer()
    {
        return $this->certificateVerifyPeer;
    }

    public function GetCertificateVerifyHost()
    {
        return $this->certificateVerifyHost;
    }

    public function isCertificateAuth()
    {
        return $this->certificateAuth;
    }
}

?>