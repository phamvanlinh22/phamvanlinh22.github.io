<?php
$abc="Laptop";
$str='"products": [{
        "name": "'.$abc.'",
        "weight": 0.1,
        "quantity": 1
    }, {
        "name": "tẩy",
        "weight": 0.2,
        "quantity": 1
    }],';
$order = <<<HTTP_BODY
{ 
    "products": [{ 
        "name":"Laptop Lenovo IdeaPad Gaming 3 15IMH05", 
        "weight":0.5, 
        "quantity":1 }], "order": { "id": "hda15525459", "pick_name": "HDA Order", "pick_address": "Đinh Tiên Hoàng", "pick_province": "Vĩnh Long", "pick_district": "Thành phố Vĩnh Long", "pick_ward": "P8", "pick_tel": "0368877443", "tel": "0376969162", "name": "GHTK - VinhLong", "address": "Mang Thít - Vĩnh Long", "province": "Tỉnh Vĩnh Long", "district": "Thành phố Vĩnh Long", "ward": "Phường 9", "hamlet": "Khác", "is_freeship": "0", "pick_date": "2020-12-05", "pick_money": 216500, "note": "", "value": 3000000, "transport": "fly" } }
HTTP_BODY;

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/order",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $order,
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Token: 619e0d588C37a33Ae36e35a22582e845a7f773C5",
        "Content-Length: " . strlen($order),
    ),
));

$response = curl_exec($curl);
curl_close($curl);


$result = json_decode($response, true);
echo $suc=$result['message'];
