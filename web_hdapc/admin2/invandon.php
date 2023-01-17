<?php
if(isset($_GET['od'])){
	$od=$_GET['od'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/label/".$od,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
        "Token: 619e0d588C37a33Ae36e35a22582e845a7f773C5",
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$path="vandon.pdf";
file_put_contents($path, $response);

header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');

// force download dialog
header('Content-Type: application/force-download');
header('Content-Type: application/octet-stream', false);
header('Content-Type: application/download', false);

// use the Content-Disposition header to supply a recommended filename
header('Content-Disposition: attachment; filename="'.basename($path).'";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($path));
header('Content-Type: application/pdf', false);

// send binary stream directly into buffer rather than into memory
readfile($path);

// make sure stream ended
exit();
}
?>