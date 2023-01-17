<?php     
$to_email = 'pxyn02@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: pxyn00@gmail.com';
mail($to_email,$subject,$message,$headers);
?>