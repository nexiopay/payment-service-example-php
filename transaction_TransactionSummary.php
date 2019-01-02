<?php
require_once("config.php");

function ReadTransList()
{
	$filename = 'translist.json';
	$handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    //print $contents;
	return $contents;
}

try {
	$data = ReadTransList();
	
	$id = json_decode($data)->id;
	
	//echo $data;
	$basicauth = "Basic ". base64_encode($username . ":" . $password);

    $ch = curl_init($apiurl.'transaction/v3/transactionsSummary');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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
    }
} catch (Exception $e) {
    return $e->getMessage();
}


