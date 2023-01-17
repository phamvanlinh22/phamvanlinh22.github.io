<?php
   include'lib/database.php';
   include 'helper/format.php';
   include 'lib/session.php';
   // session_start();
   spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
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
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['getcode'])){
    $username=$_POST['getcode'];
    $name = "HDA PC";
    $code="";
    for($i=0;$i<4;$i++){
        $code.=rand(0,9);
    }

    $gmaill="";
    $us=$user->getUser($username);
    if($us!=null){
        $result=$us->fetch_assoc();
        $gmaill=$result['gmail'];
    }
    $data['gmail']=$gmaill;
    $body ="Mã xác nhận tài khoản HDAPC của m là : $code";

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();


    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "pxyn00@gmail.com";
    $mail->Password = '01269537028F';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($gmaill, $name);
    $mail->addAddress("$gmaill");
    $tieude="Mã xác nhận";
    $tieude= "=?utf-8?b?".base64_encode($tieude)."?=";
    $mail->Subject = ($tieude);
    $mail->Body = $body;

    $data['code']=$code;

 
    if($gmaill!=""){
        if($mail->send()){
            $data['rs']=1;
        }
        else
        {
            $data['rs']=0;
        }
    }
    
     echo json_encode($data); 

}
elseif(isset($_POST['new_pass'])){
    $new_pass=$_POST['new_pass'];
    $user=$_POST['user'];
    $conn=new mysqli("localhost","root","","hda_pc");
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    if(strlen($new_pass)<6){
            $data['dmk']=0;
          }
    if(strlen($new_pass)>30){
            $data['dmk']=0;
          }
    elseif(preg_match('/[^a-zA-Z\d]/',$new_pass)==1)
            $data['dmk']=0;
    else{
        $new_pass=md5($new_pass);
    $query="UPDATE customer set password='$new_pass' where user='$user'";
    $result = mysqli_query($conn,$query);
    
    if($result){
        $data['dmk']=1;
    }
    else
        $data['dmk']=0;
    }
    echo json_encode($data); 
}

?>
