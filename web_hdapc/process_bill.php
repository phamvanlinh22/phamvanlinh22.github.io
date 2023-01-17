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
    if( isset($_POST['submit'])){
        $addOd=$order->addOrder2($_POST);
        if($addOd!=NULL){
          echo $addOd ;
        }
        else
          echo $addOd ;
      exit;
    }
    
?>