<?php
require_once("config.php");

try {
    $data = json_encode(array());
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
