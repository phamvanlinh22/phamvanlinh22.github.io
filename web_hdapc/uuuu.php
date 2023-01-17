<?php
$data = array(
    "pick_province" => "Hà Nội",
    "pick_district" => "Quận Hai Bà Trưng",
    "province" => "Hà nội",
    "district" => "Quận Cầu Giấy",
    "address" => "P.503 tòa nhà Auu Việt, số 1 Lê Đức Thọ",
    "weight" => 1000,
    "value" => 3000000,
    "transport" => "fly",
    "deliver_option" => "xteam"
);
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
        "Token: 619e0d588C37a33Ae36e35a22582e845a7f773C5",
    ),
));

$response = curl_exec($curl);
curl_close($curl);

echo 'Response: ' . $response;
?>