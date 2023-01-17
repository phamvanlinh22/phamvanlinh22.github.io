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
 if(isset($_POST['catID']) && isset($_POST['page']))
 {
 	$catID=$_POST['catID'];
 	$page=$_POST['page'];
 	$pdonPage=20;
 	$vt=($page-1)*$pdonPage;
 	$query="";
 	$query2="";
 	$kt=0;
 	$res="";
 	$res2="";

$pd_count=0;
$bt_amount=0;;

    // if ($catID=='all'){		
    // 	$query="SELECT * from product";
    // 	$kt=0;
    // }
    // elseif ($catID=='lk'){
    // 	$query="SELECT * from product where catID>=7 and catID<=15";
    // 	$kt=1;      
    // }
    // elseif ($catID=='sale'){
    // 	$query="SELECT * from product where sale>0 ";
    // 	$kt=1;      
    // }
    // elseif (is_int($catID)){
    // 	$query="SELECT * from product where catID=".$catID." " ;
    //     $kt=1;     
    // }
    // elseif($catID=="laptop"){ 
    //     $query="SELECT * from product where productName like '%".$catID."%'";
    //     $kt=1;
    //   }
   if (is_numeric($catID)){
    	$query="SELECT * from product where catID=".$catID." " ;
        $kt=1;     
    }
    else{
    switch ($catID) {
    	case 'all':
    		$query="SELECT * from product";
    	    $kt=0;
    		break;
    	case 'lk':
    		$query="SELECT * from product where catID>=7 and catID<=15";
    	     $kt=1;
    		break;
    	case 'sale':
    		$query="SELECT * from product where sale>0 ";
    		$kt=1;
    		break;
    	case 'new':
    		$query="SELECT * from product where new>0 ";
    		$kt=1;
    		break;
    	case 'hot':
    		$query="SELECT * from product order by sold desc limit 20 ";
    		$kt=1;
    		break;
    	case 'gg':
    		$query="SELECT * from product where catID=17 or catID=18 or catID=19 ";
    		$kt=1;
    		break;
    	case 'mbit':
    		$query="  SELECT *from product where note='mbit' ";
    		$kt=1;
    		break;
    	case 'mbamd':
    		$query="  SELECT *from product where note='mbamd' ";
    		$kt=1;
    		break;
    	case '8th':
    		$query="  SELECT *from product where note='8th' ";
    		$kt=1;
    		break;
    	case '9th':
    		$query="  SELECT *from product where note='9th' ";
    		$kt=1;
    		break;
    	case 'rz4':
    		$query="  SELECT *from product where note='rz4' ";
    		$kt=1;
    		break;
    	case 'rz3':
    		$query="  SELECT *from product where note='rz3' ";
    		$kt=1;
    		break;
    	case 'rzdp':
    		$query="  SELECT *from product where note='rzdp' ";
    		$kt=1;
    		break;
    	case '10th':
    		$query="  SELECT *from product where note='10th' ";
    		$kt=1;
    		break;
    	case 'rhpx':
    		$query="  SELECT *from product where catID=9 and brandID=26 ";
    		$kt=1;
    		break;
    	case 'rgs':
    		$query="  SELECT *from product where catID=9 and brandID=25 ";
    		$kt=1;
    		break;
    	case 'rcs':
    		$query="  SELECT *from product where catID=9 and brandID=21 ";
    		$kt=1;
    		break;
    	default:
    		$query="SELECT * from product where productName like '%".$catID."%'";
            $kt=1;
    		break;
    }
}
    


   }
  if(isset($_POST['brand'])){
  	$brand=$_POST['brand'];
  	if($kt==1 and $brand!="" and $brand!=0)
  	$query.=" and  brandID=".$brand." ";
  	elseif($kt==0 and $brand!="" and $brand!=0)
  	$query.=" where brandID=".$brand." ";
    elseif($brand==0)
  	$query.="";

  }
  if(isset($_POST['choice'])){
  	$choice=$_POST['choice'];
  	if($choice==2)
  		$query.=" order by price asc ";
  	elseif($choice==3)
  		$query.=" order by price desc ";
  	elseif($choice==4)
  		$query.=" order by productName asc ";
  	elseif($choice==5)
  		$query.=" order by productName desc ";
  }

 $query2=$query; 
$query.=" LIMIT ".$vt.",".$pdonPage ;
$pdNew=$product->getProduct($query); 
 
        if($pdNew!=NULL){
                $i=0;
              while ($resultN=$pdNew->fetch_assoc()) {
                $i++;          
                
            $res.='<div class="cart">         
            <a  href="pdDetails.php?productID='.$resultN["productName"].'">
              <div class="top-cart">
              <img class="cart-img" 
              src="./admin2/uploads/'.$resultN['image'].'" height="230">
            
              <div class="choose"></div>
              <i class="ct-cart" style="font-size:14px !important;">Click để xem chi tiết</i>
              <div class="mh t611">Mua ngay</div>
              </div>
            </a>';
      
            if($resultN['new']!=0)     
              $res.= '<div class="new"><img src="icon/xmas.png" width="20px"> Mới</div>';
            
            if($resultN['sale']!=0)     
              $res.= '<div class="km"><i class="fas fa-gift"></i> Khuyến Mãi</div>';

			$res.='<div class="info">
              <div class="pd-name">'.$resultN["productName"].'</div>';
  
            if($resultN['sale']!=0){
              $price=$resultN['price'];
              $price_old=$product->formatMoney($price);
              $sale=$resultN['sale'];
              $sale_price=$price-$price*$sale/100;
              $sale_price=$product->formatMoney($sale_price);
              
              $res.= '<div class="old-price">'.$price_old.'<u>đ</u></div>
              <div class="current-price">'.$sale_price.'<u>đ</u></div>

              <div class="sale"><img src="icon/sale4.png" width="52px">
                  <span>'.$sale.'%</span></div>
              <div class="sale2"><img src="icon/sale5.png" width="52px"></div>';

            }
            else
            {   $price=$resultN['price'];
              $price=$product->formatMoney($price);
              $res.= '
              <div class="old-price"></div>
              <div class="current-price">'.$price.'<u>đ</u></div>'; 
            }
            $res.='
            </div>
           </div>';

            if($i%5==0){
              $res.="<br> <br>";
             }
            }


        $rs=$product->getProduct($query2);
    $pd_count=mysqli_num_rows($rs);
    if($pd_count!=NULL){
    $bt_amount=ceil($pd_count/20);
    if($bt_amount<=1){
      if ($pd_count<=5) {
        $res2.= '<style type="text/css"> .list-product{ height:400px;} .footer{margin-top:-30px;}</style>';
      }
      elseif($pd_count<=10)
        $res2.= '<style type="text/css"> .list-product{ height:700px;}</style>';
      elseif($pd_count<=15)
        $res2.= '<style type="text/css"> .list-product{ height:1120px;}</style>';
      else
        $res2.= '<style type="text/css"> .list-product{ height:1480px;}</style>';
    }
    else
    {
      if($page<$bt_amount)
        $res2.= '<style type="text/css"> .list-product{ height:1480px;}</style>';
      else{
        $sosp=$pd_count-($bt_amount-1)*20;
        if($sosp<=5)
           $res2.= '<style type="text/css"> .list-product{ height:400px;}</style>';
        elseif($sosp<=10)
        $res2.= '<style type="text/css"> .list-product{ height:700px;}</style>';
        elseif($sosp<=15)
          $res2.= '<style type="text/css"> .list-product{ height:1120px;}</style>';
        else
          $res2.= '<style type="text/css"> .list-product{ height:1480px;}</style>';
           
      }

      $page_lenght=($bt_amount+2)*37;
      $res2.= '<style type="text/css"> .len{ width:'.$page_lenght.'px;}</style>';
      $k=1;
      if($page>1)
          $res2.= '<div class="page-btn"><a href="pdSearch.php?page='.($page-1).'"><i class="fas fa-angle-left"></i></a></div> ';
       for($k=1;$k<=$bt_amount;$k++)
            {
            if($page!=$k)
            $res2.= '<div class="page-btn"><a href="pdSearch.php?page='.$k.'">'.$k.'</a></div> ';
            else
              $res2.= '<div class="page-btn not-active"><a href="pdSearch.php?page='.$k.'">'.$k.'</a></div> ';
            }
            if($page<$bt_amount)
            $res2.= '<div class="page-btn"><a href="pdSearch.php?page='.($page+1).'"><i class="fas fa-angle-right"></i></a></div> ';
           
    }
    
  }


        }
        else{

          $res='<div class="nfpd" style="width:100%; text-align:center;height:80px;">Không có sản phẩm</div>';
        }


  
    


   $data['item']=$res;
   $data['query']=$query;
   $data['page']=$res2;
   $data['sl']=$pd_count;
   $data['sotr']=$bt_amount;
   echo json_encode($data);    
?>