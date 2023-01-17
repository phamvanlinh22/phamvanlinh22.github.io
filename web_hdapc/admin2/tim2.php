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
if( isset($_POST['name']) ){
	$res="";
 	$item=$product->search($_POST['name']);
 	if($item!=NULL)
 		while ($result=$item->fetch_assoc()) {
		 // $res.='<a href="pdDetails.php?productID='.$result["productName"].'"><div class="item_cart">
   //        <img src="./admin/uploads/'.$result["image"].'" width="70">
   //        <div class="item_name">&#160&#160'.$result["productName"].'</div>
   //        <div class="item_price">'.$product->formatMoney($result['price']).'<u>đ</u></div>
   //    </div> </a>';
      $res.='<div>
                  <input type="checkbox" class="largerCheckbox" name="" value="'.$result["productName"].'" onclick="chonSP(this)" width="50" style="margin-right: 10px;">
                  <img src="uploads/'.$result["image"].'" width="60" height="60">
                  <label style="margin-top: -10px;font-size: 14px;color: #302F2F;">'.$result["productName"].'</label>
                  <span style="font-size:14px; float:right;margin-right: 10px;color:blue;">'.$product->formatMoney($result['price']).'<u>đ</u></span>
                </div>';
 		}
 	else{
 		$res="";
 	}
 		echo $res;
 exit;
}
?>