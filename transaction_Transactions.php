<?php
require_once("config.php");

function ReadTransList()
{
    $filename = 'translist.json';
    $handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}

try {
    $data = ReadTransList();
    $id = json_decode($data)->id;
    $basicauth = "Basic " . base64_encode($username . ":" . $password);

    $ch = curl_init($apiurl . 'transaction/v3');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
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
        echo '<pre>';
        $response = json_decode($result);
        print_r($response);
        echo '</pre>';

        //write the first trans id and amount into translist.json
        $translist = array(
            'amount' => $response->rows[0]->amount,
            'id' => $response->rows[0]->id
        );
        $fp = fopen('translist.json', 'w');
        fwrite($fp, json_encode($translist));
        fclose($fp);
    }
} catch (Exception $e) {
    return $e->getMessage();
}


