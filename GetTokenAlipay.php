<?php
require_once("config.php");

try {
    $data = json_encode(array(
        'data' => array(
            'paymentMethod' => 'aliPay',
            'allowedCardTypes' => ['visa', 'mastercard', 'discover', 'amex'],
            'amount' => '1.15',
            'currency' => 'USD',
            'description' => 'test purchase',
            'customFields' => array(
                'custom1' => 'hi mom',
                'custom2' => 'P#dfk1234kdf'
            ),
            'customer' => array(
                'invoice' => '123',
                'orderNumber' => '456',
                'customerRef' => '123',
                'firstName' => 'buck',
                'lastName' => 'wild',
                'billToAddressOne' => '123 Street',
                'billToAddressTwo' => 'Suite 232',
                'billToCity' => 'Amarillo',
                'billToState' => 'TX',
                'billToPostal' => '56649',
                'billToCountry' => 'US'
            ),
        ),
        'processingOptions' => array(
            'webhookUrl' => '',
            'webhookFailUrl' => '',
            'checkFraud' => true,
            'verifyCvc' => false,
            'verifyAvs' => 0,
            'verboseResponse' => true
        ),
        'uiOptions' => array(
            'customTextUrl' => '',
            'displaySubmitButton' => false,
            'hideCvc' => false,
            'requireCvc' => true,
            'hideBilling' => false,
            'limitCountriesTo' => [
                'CA', 'MX', 'GB', 'US'
            ]
        ),
        'card' => array(
            'cardHolderName' => 'Kevin Batchelor'
        ),
        'cart' => array(
            'items' => [
                array(
                    'item' => 'E100',
                    'description' => 'Electric Socks',
                    'quantity' => 2,
                    'price' => 5,
                    'type' => 'sale'
                )
            ]
        )
    ));
    $basicauth = "Basic " . base64_encode($username . ":" . $password);
    $ch = curl_init($apiurl . 'pay/v3/token');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $basicauth",
        "Content-Type: application/json",
        "Content-Length: " . strlen($data)));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        echo "CURL Error #: $error";
    } else {
        echo json_decode($result)->token;
    }
} catch (Exception $e) {
    return $e->getMessage();
}
