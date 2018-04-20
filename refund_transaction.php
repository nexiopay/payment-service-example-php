<?php
require_once("config.php");

try {
    $hash = base64_encode($username.":".$password);

    $ch = curl_init($apiurl.'pay/v3/transactions/134306163/refund');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $JWT",
        //"X-Authorization: $hash",
        "Content-Type: application/x-www-form-urlencoded"
    ));
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
