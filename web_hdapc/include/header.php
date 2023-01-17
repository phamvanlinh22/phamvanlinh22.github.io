
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
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
   $product=new product()
?>
<?php
include './lib/session.php';
Session::init();
?>
<?php
    if(isset($_GET['action']) && $_GET['action']=='logout'){
      Session::set('user_login',false);
      header('Location:index.php');
    }
        
?>
<!DOCTYPE html>
<html>
<head>
    
	<title> NL PC - Hi End PC and Gaming Gear </title>
	<META NAME=”description” CONTENT="- HDA PC - Cung cấp linh kiện máy tính và thiết bị chơi game chuyên nghiệp uy tín tại Vĩnh Long ">
	 <meta name="keywords" content="hdapc,pcvinhlong">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
	
	<link rel="stylesheet" href=".\font_awesome\css/all.min.css" >
	 <link rel="short cut icon " type="image/png " href="./logo/logo98.PNG" >
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

	 <link rel="stylesheet" type="text/css" href="./css/dinhdang.css">
	 <script type="text/javascript" src="./\jquery/jquery-3.5.0.min.js"></script>
	 <script type="text/javascript" src="./\jquery/efect.js"></script>
   <script type="text/javascript" src=".//jquery/product_slide.js"></script>
   </head>

<body>

	<!-- <div class="header"> -->
	<div class="header-banner" width="1360"><img src="./banner/top_banner4.png"> </div>

	<div class=header-info width="1360">

		<div id="logo"> 

			<a href="index.php"> 
				<img src="./\logo\logo98.PNG" height="100px" width="180px">	
				<span id="diachi"> LINH STORE </span>
			<span id="slogan"> LINH KIỆN MÁY TÍNH & GAMING GEAR </span>
			</a>

		</div>

	<!-- 	<div class="searchbar"> 

			<input class="search-txt" oninput="timkiem()" type="text" name="name" placeholder="Nhập mã hoặc tên sản phẩm..." style="width:480px; height:37px" >   
				<a id="tim" class="search-bt" href="">
              		 <i class="fas fa-search"></i>
				</a>
    </div> -->

    <form class="searchbar" action="pdSearch.php" method="get"> 
      <!-- <form action="" method="get"> -->
    
      <input class="search-txt" oninput="timkiem()" type="text" name="key" placeholder="Nhập mã hoặc tên sản phẩm..." style="width:480px; height:37px" >   
       <!-- </form> -->
        <button id="tim" type="submit" class="search-bt" href="" style="outline: none;border: none;">
                   <i class="fas fa-search"></i>
        </button>
    </form>

		<div class="dangky">
      <?php
          
          if(Session::get('user_login')==true){
			       echo '<a class = "dn" href="userinfo.php"> 
        <span id="icon-dn"> <i class="fas fa-user-circle"></i>  </span>
         ';
        echo '<style type="text/css">.dangky{bottom:38px;left:815px;}.dn{font-size:17px;cursor}</style>'.Session::get('user')."</a>";
           }
           else{
              echo '<a class = "dk" href="dangky.php"> 
              <img id="dk-img" src="./\icon/dangky.png"/>  ĐĂNG KÝ   
            </a>  ';
           }
           ?>
		</div>

		<div class="dangnhap">
       <?php
          if(Session::get('user_login')==true){
			  
           echo '<a class = "dk" href="?action=logout" onclick="return confirm(';
           echo "'Bạn muốn đăng xuất')" ;
           echo ' ">  <i class="fas fa-sign-out-alt"></i>&#160 ĐĂNG XUẤT  
            </a>  ';
            }
          else {
            echo '<a class = "dn" href="dangnhap.php"> 
           <span id="icon-dn"> <i class="fas fa-user-circle"></i>  </span>';
            echo "ĐĂNG NHẬP </a>  ";
            }
        ?>
			
		</div>
		<style type="text/css">
      .dk >i{
        font-size: 32px;
       vertical-align: middle;
      }  
    </style>
		<div class="tintuc">
			<a class = "tt" href="https://news.gearvn.com/" > 
				<img id="icon-tt" src="./\icon/newspaper.png"   />  TIN TỨC	
			</a>	
		</div>
        
        <div class="giohang">
        	<div class="logo-gh">
        		<a class = "gh" href="./cartinfo.php"> 
					<img id="icon-gh" src="./\icon/shopping-cart.png"   />  GIỎ HÀNG
			    </a>
        	</div>
			<div id="sl"><?php $sl=$cart->amountCart()->fetch_assoc();
                if($sl['soluong']>=1)
                 echo $sl['soluong'] ;
               else{
                  echo '0'; 
               } ?>

       </div>	
		</div>

        <div class="diachi">
        	ĐC : 73 NGUYỄN HUỆ PHƯỜNG 2 THÀNH PHỐ VĨNH LONG  &#160 &#160 &#160 | &#160  &#160&#160 <img src="./\banner/phone.png" width="20px"> &#160 TỔNG ĐÀI TƯ VẤN: 1700 4062 &#160 &#160 |  &#160 &#160&#160 &#160&#160
        </div>

        <div id="youtube">
        	<a class="logo-ytb" href="https://www.youtube.com/"> 
 				<img id= "icon-ytb"src="./\icon/youtube.png" width="25px" /> &#160 VIDEO &#160 &#160&#160 |
        	 </a>
        </div>

        <div id="facebook">
        	<a class="fb" href="https://www.facebook.com/profile.php?=75816879"> 
 				<img id= "icon-fb"src="./\icon/facebook.png" width="22px" /> &#160 FANPGAGE &#160 &#160&#160 |
        	 </a>
        </div >
                
      </div>
    </div>

    

    

     <div class="mnh-container" >
    <div class="Danhmuc"> 
        <a class="dm" href="#">
        <span class="icon-list"> 
        	<i class="fas fa-bars"></i> 
        </span> Danh mục sản phẩm </a>     
    </div>
   
    <div class="menu-horizon">
    	<div  class="item items1" > 
			<a class="mnh-it1" href="pdSearch.php?cat=sale">
            <span class="icon-list"> 
            	<i class="fas fa-gift"></i> 
            </span> KHUYẾN MÃI </a>     
    	</div>

    	<div class="item items2">
			<a class="mnh-it2" href="https://gearvn.com/pages/huong-dan-thanh-toan-gearvn">
            <span class="icon-list"> 
            	<i class="fas fa-money-check-alt"></i> 
            </span> HƯỚNG DẪN THANH TOÁN </a>     
    	</div>
    	<div class="item items3"> 
           <a class="mnh-it3" href="hdtg.php">
            <span class="icon-list">
             <i class="fas fa-comments-dollar"></i> 
            </span> HƯỚNG DẪN TRẢ GÓP </a>     
    	 </div>
    	<div class="item items4"> 
			<a class="mnh-it4" href="csbh.php">
            <span class="icon-list">
            	<i class="fas fa-tools"></i> 
            </span> CHÍNH SÁCH BẢO HÀNH </a>  
    	 </div>
    	<div class="item items6"> 
			<a class="mnh-it5" href="https://gearvn.com/pages/chinh-sach-giao-hang">
            <span class="icon-list"> 
            	<i class="fas fa-truck"></i> 
            </span> CHÍNH SÁCH VẬN CHUYỂN </a>  
    	 </div>
    </div >

    <div class="rsSearch">
        <!-- <div class="item_cart">
          <img src="./admin/uploads/30245fb7ac.webp" width="80">
          <div class="item_name">&#160&#160Chuột Logitech G403 Wireless Super Power</div>
          <div class="item_price">15,000,000<u>đ</u></div>
      </div> -->
    </div>

         </div>

  <style type="text/css">
        .item_cart{
          display: flex;
          flex-direction: row;
          margin-bottom: 10px;
          height: 70px;
        }
        .item_cart>img{
          height: 70px;
        }
        .search-bt{
          /*margin-top: -39px;*/
        }
        .item_name{
          width: 400px;
          font-family: "Segoe UI", Helvetica, Arial, sans-serif;
          padding-left: 10px;
          height: 70px;
          font-size: 14px;
          padding-top: 12px;
          color: #2B2A2A;
        }
        .item_cart:hover{
          /*box-shadow: 0px -0px 10px inset red;*/
          /*background-color: #F0EDED;*/
          /*background-image: linear-gradient(to left, #E8E5E5, white);*/
          background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 32%, rgba(231,231,231,1) 76%, rgba(205,205,205,0.76234243697479) 100%);
        }
        .item_price{
          width: 100px;
          font-family: "Segoe UI", Helvetica, Arial, sans-serif;
          height: 70px;
          padding-top: 11px;
          color: red;
          padding-right: 7px;
          /*font-weight: 500;*/
          font-size: 15px;
          line-height: 70px;
          text-align: right;
          /*color: #2B2A2A;*/
        }
        .rsSearch{
          position: relative;
          z-index: 9999;
          left: 252px;
          visibility: hidden;
          width:485px;
          top:-44px;
          background-color: white;
        }
        .searchbar{
          overflow: visible;
        }
        .search-bt{
          border-top-right-radius: 17px;
          border-bottom-right-radius: 17px;
        }
        .hienthi4{
          visibility: visible;
        }
        .hidden4{
          
        }
      </style>
    </div>

    <script type="text/javascript">
      // $('.search-txt').keyup(function(event){
      //     if(event==13)
      //       $('.search-bt').click();
      // });
      // 
      $('.search-txt').on("keyup", function (event) {
        if (Number(event.which) == 13) {
        $('#tim').click();
          // $("#tim").trigger('click');
        // timkiem();
        
        // $('.bt-right').trigger('click');
          // $('.search-bt').trigger('click');
        //   var key=$('.search-txt').val();
        // $(".search-bt").attr("href","pdSearch.php?key="+key);
        // alert("ok");
       }
});  
      function timkiem(){

        var key=$('.search-txt').val();
        $(".search-bt").attr("href","pdSearch.php?key="+key);
        if(key!=""){
          $('.rsSearch').addClass('hienthi4');
        $.ajax({
          url:"search.php",
          method: "post",
          data:{ name: key},
          dataType:"text",
          success: function(data){
            $('.rsSearch').html(data);
          }
        })
        }
        else
          $('.rsSearch').removeClass('hienthi4');

      }
    </script>
  
<style type="text/css">
  .header-banner{
    width: 1360px;
  }
  .header-info{
    width: 1360px;
  }
  .mnh-horizon{
    width: 1360px;
  }
</style>
