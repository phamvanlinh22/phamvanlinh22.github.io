<?php
   include'../lib/database.php';
   include '../helper/format.php';
   include '../lib/session.php';
   // session_start();
   spl_autoload_register(function($class){
    include_once "../classes/".$class.".php";
   });

   $db=new Database();
   $fm= new Format();
   $brand=new brand();
   $cart=new cart();
   $order=new order();
   $user=new user();
   $cat=new category();
   $product=new product();
?>

<?php
if(isset($_POST['tinh'])){
    $tinh=$_POST['tinh'];
    $quan=$_POST['district'];
    $weight=$_POST['weight'];
    $transport=$_POST['transport'];
}
else
{
    $tinh="Hà Nội";
    $quan="Quận cầu giấy";
    $weight=1000;
    $transport='road';
}
$data = array(
    "pick_province" =>"Vĩnh Long",
    "pick_district" => "P8",
    "province" => $tinh,
    "district" => $quan,
    "address" => "Ấp Phước Lộc , Xã Long Đền",
    "weight" => $weight,
    "value" => 3000000,
    "transport" => $transport,
    "deliver_option" => "none"
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

$result = json_decode($response, true);
$fee=$result['fee'];

$data['fee']=$product->formatMoney($fee['fee']);
$data['fee2']=$fee['fee'];
echo json_encode($data);

// echo 'Response: ' . $fee['fee'];
// echo 'Response: ' . $response;
?>
