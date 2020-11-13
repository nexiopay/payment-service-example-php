<?php
require_once("config.php");

try {
    $onetimetoken = require_once("GetToken.php");
    echo $onetimetoken;

    $data = json_encode(array(
        'token' => $onetimetoken,
        'card' => array(
            'encryptedNumber' => 'cu3yRktaYFK2LUC6DpNK289tYDsGRCi7cO+GeG0hkeYFvT7Y8/oY5r53obMz6Q/BZ38gk2u2Ufwy8ojBcX2sfNjG5jplGTXA4NNlSIUjMFfiHe1sff1JFpThoiW/IIlifGlbWu+S1/9pqWPTzJ2+DcjwohbHzsDahhYewFhXgC8qsK0ypi/Shlp+CwRITyIvbVXESD0xz3YOTRHeZLlChvVqN8z4ZzN8nm0MXkmT1wcpYI73bH4KdnPwNU3s7XxvP/ernQP73SHHAOKSLlz4F6AEHFjJiCoXzeLF7LwEjRdxDJ0sKVXbRk3i9BGh+8Nle2VYgjpUWtk2763QkvZiQQ==',
            'expirationMonth' => '1',
            'expirationYear' => '2024',
            'cardHolderName' => 'Kevin Batchelor',
            'lastFour' => '123'
        )
    ));
    echo "postdata:# $data";
    $basicauth = "Basic " . base64_encode($username . ":" . $password);

    $ch = curl_init($apiurl . 'pay/v3/saveCard');
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
    }
} catch (Exception $e) {
    return $e->getMessage();
}


