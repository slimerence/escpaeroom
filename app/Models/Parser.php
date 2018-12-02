<?php
/**
 * Created by PhpStorm.
 * User: Claude
 * Date: 2018/12/1
 * Time: 15:11
 */

namespace Smartbro\Models;

use Smartbro\Models\Merchant;

class Parser extends Merchant
{
    public function __construct()
    {
        parent::__construct();
    }

    public function FormRequestUrl(Merchant $merchantObj, $customUri) {
        $gatewayUrl = $merchantObj->GetGatewayUrl();
        $gatewayUrl .= "/version/" . $merchantObj->GetVersion();
        $gatewayUrl .= "/merchant/" . $merchantObj->GetMerchantId();
        $gatewayUrl .= $customUri;
        $merchantObj->SetGatewayUrl($gatewayUrl);
        return $gatewayUrl;
    }

    public function RemoveEmptyValues($array) {
        foreach ($array as $i => $value) {
            // If member is an array
            if (is_array($array[$i])) {
                // if array has no members, unset array
                if (count($array[$i]) == 0)
                    unset($array[$i]);
                // if array has members, recurse and pass in the array
                // recursive function will then loop through all members of this array
                else {
                    // overwrite old array with new structure
                    $array[$i] = $this->RemoveEmptyValues($array[$i]);
                    // if array is empty unset it
                    if (count($array[$i]) == 0)
                        unset($array[$i]);
                }
            }
            // if member not an array
            else {
                // if member variable is empty, unset it
                if ($array[$i] == "")
                    unset($array[$i]);
            }
        }
        return $array;
    }

    // Creates the JSON encoded transaction body from an associative array
    // Remember to make it check if the array member is empty, then remove it from json if it is
    public function ParseRequest($formData) {
        if (count($formData) == 0)
            return "";
        $formData = $this->RemoveEmptyValues($formData);
        $request = json_encode($formData);
        return $request;
    }
}