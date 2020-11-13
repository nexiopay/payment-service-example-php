<?php
require_once("config.php");
// A one-time-use token is required to save a card token or an e-check token
// No body parameters are required

try {
    $basicauth = "Basic " . base64_encode($username . ":" . $password);
    $ch = curl_init($apiurl . 'pay/v3/token');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $basicauth",
        "Content-Type: application/json"));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        echo "CURL Error #: $error";
    } else {
        echo json_decode($result)->token;
        return json_decode($result)->token;
    }
} catch (Exception $e) {
    return $e->getMessage();
}
