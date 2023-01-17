<?php
   include'../lib/database.php';
   include '../helper/format.php';

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
   $kq=0;
   if(isset($_POST)){
      $result=$product->update_product3($_POST);
      if($result==1)
         $kq=1;
       else
      $kq=0;
   }
  

   $data['kq']=$kq;
   echo json_encode($data); 
?>
