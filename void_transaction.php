<?php
require_once("config.php");

try {
    $data = json_encode(array(
        'merchantId' => '100039',
        'data' => array(
            'amount' => '10.32',
        ),
        'gateway' => array (
            'name' => 'usaepay',
            'refNumber' => '134497630'
        )
    ));

    $ch = curl_init($apiurl.'pay/v3/void');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $JWT",
        "Content-Type: application/json",
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
