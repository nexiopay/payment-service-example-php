<?php
require_once("config.php");

try {
    $data = json_encode(array(
        'merchantId' => '100039',
        'tokenex' => array(
            'token' => 'eb2f54aa-3ad5-4e93-81d8-b9a255900cd5',
        ),
        'data' => array(
            'amount' => '10.32',
        ),
        'card' => array(
            'cardHolderName' => 'Evz',
            'lastFour' => '4564'
        )
    ));

    $ch = curl_init($apiurl.'pay/v3/kount');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $JWT",
        "Content-Type: application/x-www-form-urlencoded",
        "Content-Length: " . strlen($data)));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        echo "CURL Error #: $error";
    } else {
        echo '<pre>';
        print_r(json_decode($result));
        echo '</pre>';
    }
} catch (Exception $e) {
    return $e->getMessage();
}
