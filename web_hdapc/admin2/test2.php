<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/cancel/S18312125.MN17.A1.2.616822843",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
        "Token: 619e0d588C37a33Ae36e35a22582e845a7f773C5",
    ),
));

$response = curl_exec($curl);
curl_close($curl);

echo 'Response: ' . $response;
?>