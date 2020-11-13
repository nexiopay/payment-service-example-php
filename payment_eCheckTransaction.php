<?php
require_once("config.php");

try {
    $data = json_encode(array(
        'tokenex' => array(
            'token' => $echeck_token
        ),
        'bank' => array(
            'accountHolderName' => 'Test Name',
            'routingNumber' => '999546788'
        ),
        'data' => array(
            'amount' => '10',
            'currency' => 'USD',
            'description' => 'test purchase',
            'customFields' => array(
                'custom1' => 'hi mom',
                'custom2' => 'P#dfk1234kdf'
            ),
            'customer' => array(
                'billToAddressOne' => '123 Street',
                'billToAddressTwo' => 'Box 232',
                'billToCity' => 'Amarillo',
                'billToState' => 'TX',
                'billToPostal' => '79118',
                'billToCountry' => 'US'
            ),
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

    $ch = curl_init($apiurl . 'pay/v3/processECheck');
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
        echo '<pre>';
        $response = json_decode($result);

        print_r($response);

        echo '</pre>';

        //write trans id and amount into translist.json
        $translist = array(
            'data' => array(
                'amount' => $response->amount
            ),
            'id' => $response->id
        );
        $fp = fopen('translist.json', 'w');
        fwrite($fp, json_encode($translist));
        fclose($fp);
    }
} catch (Exception $e) {
    return $e->getMessage();
}


