<?php
   include'./lib/database.php';
   include './helper/format.php';
   

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
if( isset($_POST['name']) ){
	$res="";
 	$item=$product->search($_POST['name']);
 	if($item!=NULL)
 		while ($result=$item->fetch_assoc()) {
		 $res.='<a href="pdDetails.php?productID='.$result["productName"].'"><div class="item_cart">
          <img src="./admin2/uploads/'.$result["image"].'" width="70">
          <div class="item_name">&#160&#160'.$result["productName"].'</div>
          <div class="item_price">'.$product->formatMoney($result['price']).'<u>đ</u></div>
      </div> </a>';
 		}
 	else{
 		$res="";
 	}
 		echo $res;
 exit;
}
?>