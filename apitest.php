<?php

header('Content-type: text/xml');

function sendXmlOverPost($url, $xml) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    // For xml, change the content-type.
    curl_setopt ($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned

    // Send to remote and return data to caller.
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$url = 'http://apitest.adityaraj.me/token';
$xml = "<?xml version='1.0' encoding='utf-16'?><requestHeader><ClientIdentifier>1tquYhrcFkTFzCfQ59pN2HSjGOzVpWzYkxG9BnFz3a0dunt56v</ClientIdentifier><TransactionID>vcvAhPEAoxVHSiFrg2D8KqDorfkOLlOFW8JqQdISgSFOlUTffWCtcMFDkiJl</TransactionID><RequestType>000</RequestType><RequestDateTime>20180610111540</RequestDateTime><User>rfkOLlOFW8JqQdIS</User><Password>rg2D8KqDorfkOLlOFW8JqQdISgSFOlUTffWCtcMFD</Password><requestMessage><PaymentAccountNumber>4005550000000019</PaymentAccountNumber><ExpirationDate>082019</ExpirationDate><SecurityCode>111</SecurityCode><TrackData></TrackData><EncryptionID></EncryptionID><Track1></Track1><Track2></Track2><MSRKey></MSRKey><SecureFormat></SecureFormat><BDKSlot></BDKSlot></requestMessage></requestHeader>";

$res = sendXmlOverPost($url, $xml);
print_r($res);