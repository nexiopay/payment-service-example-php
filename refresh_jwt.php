<?php
require_once("config.php");

try {
    $data = json_encode(array("refreshToken" => $refreshToken));
    $ch = curl_init($apiurl.'user/v3/refresh');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Content-Length: " . strlen($data)));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        echo "CURL Error #: $error";
    } else {
        $result = json_decode($result);

        // we save the tokens to the config file
        $content = file_get_contents('config.php');

        $newcontent = preg_replace(
            '/\$JWT = \'(.*?)\';/',
            '$JWT = \''.$result->idToken.'\';',
            $content
        );
        
        $newcontent = preg_replace(
            '/\$refreshToken = \'(.*?)\';/',
            '$refreshToken = \''.$result->refreshToken.'\';',
            $newcontent
        );

        file_put_contents('config.php', $newcontent);

        echo $result->idToken;
    }
} catch (Exception $e) {
    return $e->getMessage();
}
