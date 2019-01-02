<?php
include('Crypt/RSA.php');

//require("config.php");

function EncryptCardNum($cardnum)
{
	$rsa = new Crypt_RSA();
	$key = file_get_contents('../nexiopub.key');//'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvWpIQFjQQCPpaIlJKpegirp5kLkzLB1AxHmnLk73D3TJbAGqr1QmlsWDBtMPMRpdzzUM7ZwX3kzhIuATV4Pe7RKp3nZlVmcrT0YCQXBrTwqZNh775z58GP2kZs+gVfNqBampJPzSB/hB62KkByhECn6grrRjiAVwJyZVEvs/2vrxaEpO+aE16emtX12RgI5JdzdOiNyZEQteU6zRBRJEocPWVxExaOpVVVJ5+UnW0LcalzA+lRGRTrQJ5JguAPiAOzRPTK/lYFFpCAl/F8wtoAVG1c8zO2NcQ0Pko+fmeidRFxJ/did2btV+9Mkze3mBphwFmvnxa35LF+Cs/XJHDwIDAQAB';
	$rsa->loadKey('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvWpIQFjQQCPpaIlJKpegirp5kLkzLB1AxHmnLk73D3TJbAGqr1QmlsWDBtMPMRpdzzUM7ZwX3kzhIuATV4Pe7RKp3nZlVmcrT0YCQXBrTwqZNh775z58GP2kZs+gVfNqBampJPzSB/hB62KkByhECn6grrRjiAVwJyZVEvs/2vrxaEpO+aE16emtX12RgI5JdzdOiNyZEQteU6zRBRJEocPWVxExaOpVVVJ5+UnW0LcalzA+lRGRTrQJ5JguAPiAOzRPTK/lYFFpCAl/F8wtoAVG1c8zO2NcQ0Pko+fmeidRFxJ/did2btV+9Mkze3mBphwFmvnxa35LF+Cs/XJHDwIDAQAB');
	echo $rsa->getPublicKey();
	//$cardnum = '4111111111111111';
	
	$encryptresult = $rsa->encrypt($cardnum);
	
	
	openssl_public_encrypt($cardnum, $ciphertext, $key);
	$cipher = base64_encode($ciphertext);
	return $cipher;
}

function GetOneTimeToken()
{
	require("../config.php");
	$data = json_encode(array(
        'data' => array(
									'paymentMethod'=>'creditCard',
									'allowedCardTypes'=>[ 'visa', 'mastercard','discover','amex' ],
						            'amount' => '1.15',
									'currency' => 'USD',
									'description' => 'test purchase',
									'customFields' => array(
																				'custom1' => 'hi mom',
																				'custom2' => 'P#dfk1234kdf'
																			),
									'customer' => array(
																			  'invoice' => '123',
										                                      'orderNumber' => '456',
										                                      'customerRef' => '123',
										                                      'firstName' => 'buck',
										                                      'lastName' => 'wild',
										                                      'billToAddressOne' => '123 Street',
										                                      'billToAddressTwo' => 'Suite 232',
										                                      'billToCity' => 'Amarillo',
										                                    	  'billToState' => 'TX',
										                                      'billToPostal' => '56649',
										                                      'billToCountry' => 'US'
																	 ),
						        ),
		'processingOptions' => array(
						                                        'webhookUrl' => '',
						                                        'webhookFailUrl' => '',
						                                        'checkFraud' => true,
						                                        'verifyCvc' => false,
						                                        'verifyAvs' => 0,
						                                        'verboseResponse' => true
						                                  ),
		'uiOptions' => array(
		                       	'customTextUrl' => '',
		                        'displaySubmitButton' => false,
		                        'hideCvc' => false,
		                        'requireCvc' => true,
		                        'hideBilling' => false,
		                        'limitCountriesTo' => [
						                                          		'CA', 'MX', 'GB','US'
						                                        		  ]
		                     ),
		'card' => array(
									'cardHolderName' => 'Kevin Batchelor'
								 ),
		  'cart' => array(
		    'items' => [
		      array(
		        'item'=> 'E100',
		        'description'=> 'Electric Socks',
		        'quantity'=> 2,
		        'price'=> 5,
		        'type'=> 'sale'
			  )
		    ]
		  )
    ));
	
	$basicauth = "Basic ". base64_encode($username . ":" . $password);
	
    $ch = curl_init($apiurl.'pay/v3/token');
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
		$token = json_decode($result)->token;
		return $token;
    }
}

function SaveCard($onetimetoken, $encrpytedcardnumber)
{
	require("../config.php");
	
	$data = json_encode(array(
       	
		'token' => $onetimetoken,
		'card' => array(
									'encryptedNumber' => $encrpytedcardnumber,
									'expirationMonth' => '1',
									'expirationYear' => '2024',
									'cardHolderName' => 'Kevin Batchelor',
									'securityCode' => '123' 
								 ),
		'processingOptions' => array(
																'verifyAvs' => '3'
															)
    ));
	
	$basicauth = "Basic ". base64_encode($username . ":" . $password);
	
    $ch = curl_init($apiurl.'pay/v3/saveCard');
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
}


try {
	$token = GetOneTimeToken();
	$ciphernumber = EncryptCardNum('4111111111111111');
	SaveCard($token,$ciphernumber);
    
} catch (Exception $e) {
    return $e->getMessage();
}
