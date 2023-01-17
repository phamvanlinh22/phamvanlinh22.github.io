<?php 
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 0,
    CURLOPT_URL => 'http://apilayer.net/api/check?access_key=05a99a99b315daa3890b4c17775077bb&email=pxyn09@gmail.com&smtp=1&format=1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
));

$resp = curl_exec($curl);
$res=json_decode($resp,true);
echo $res['did_you_mean'];
echo $res['format_valid'];
echo $res['smtp_check'];
if(!isset($res['smtp_check'])){
              $alert ="<div class='tb'> Email không tồn tại <";
              echo $alert;
}
elseif(($res['smtp_check']==1 || $res['format_valid']!=1) || $res['did_you_mean']!=""){
       $alert ="<div class='tb'> Email không tồn tại </div>";
              echo $alert;
            }
elseif($res['smtp_check']!=1 || $res['format_valid']!=1 || $res['did_you_mean']!=""){
       $alert ="<div class='tb'> Email không tồn tại </div>";
              echo $alert;
            }
else{
            	echo 'tồn tại';
            }

// Dữ liệu thời tiết ở dạng JSON
curl_close($curl);

 ?>