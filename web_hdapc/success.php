
<?php
  include 'include/header.php';
?>
<?php
	$od=Session::get('odID');
  $cart->delAll();
    $info=$order->showOrder($od);
    if($info!=NULL)
    	$result1=$info->fetch_assoc();
?>
  <div class="container">
  <div class="info_cart">
  	<div class="hdapc"><a href="index.php">HDAPC.COM</a></div>

        <div class="user">
          <div class="icon"><i class="far fa-check-circle"></i></div>
          <div class="ttgh">Đặt hàng thành công</div>
          <span>Mã đơn hàng : <?php echo $result1["odID"];?></span><br>
          <div class="tks">Cám ơn bạn đã mua hàng ! Nhân viên sẽ gọi cho bạn để xác nhận,vui lòng kiểm tra điện thoại !</div>
        </div>

     <div class="ttdh">
     	<div class="hd2">Thông tin đơn hàng</div>
     	<div class="ac"><?php echo $result1["ctName"];?></div>
     	<div class="ac"><?php echo $result1["address"];?></div>
     	<div class="ac"><?php echo $result1["gmail"];?></div>

     	<div class="ac"><?php echo $result1["phone"];?></div>

     	<div class="ac">Vietnam</div>
     	<div class="ac ghtn">Giao hàng tận nơi</div>
     	<div class="ac">Thanh toán khi nhận hàng (COD)</div>
     </div>

    <div class="ttmh"><a href="index.php">Tiếp tục mua hàng</a></div>
    <div class="sp"><i class="fas fa-question-circle"></i>
            Cần hỗ trợ ?<span> Gọi ngay: 17004062</span></div>
  </div>
  <div class="list_cart">
    <?php
        $item=$order->showOdInfo($od);
        if($item!=NULL)
        {
          while ($result=$item->fetch_assoc()) {
            
       
    ?>
    <div class="item_cart">
      <img src="./admin2/uploads/<?php echo $result['pdImage']?>" width="70">
      <div class="sl_item"><?php echo $result['sol']?></div>
      <div class="item_name"><?php echo $result['pdName']?></div>
      <div class="item_price"><?php echo $product->formatMoney($result['price'])?><u>đ</u></div>
    </div>
   <?php
      }
      echo '<hr>';
        }
    ?>
    
    <div ptt>Tạm tính :</div>
    <div class="tamtinh">
		<?php
		    $info=$order->showOrder($od);
		    if($info!=NULL)
		    	$result1=$info->fetch_assoc();
		    echo $product->formatMoney($result1['price']);
		?>
    	<u>đ</u></div>
    <!-- <br> -->
    <div class="pvc">Phí vận chuyển :</div>
    <div class="tamtinh">Miễn phí<u></u></div>
    <hr class="vvvv">
    <div class="tongtien">Tổng tiền :</div>
    <div class="tamtinh total"><?php echo $product->formatMoney($result1['price']);?><u>đ</u></div>
  </div>
  
 <style type="text/css">
 	body{
 		margin:0px;
 		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
 		/*padding-left: 100px;*/
        /*padding-top: 50px;*/
 	}
 	.hd2{
    font-size: 20px;
    margin-bottom: 5px;
    font-weight: 500;
    color: #4e4d4b;
 	}
 .ac{
 	margin-bottom: 2px;
 }
 .sp{
 	margin-top: -35px;
 }
 .sp>span{
 	color:blue;
 }
 .sp>i{
 	color: grey;
 }
 .ghtn{
 	margin-top: 15px;
 }
  .tamtinh{
    float: right;
    margin-top: -22px;
  }
  .ttdh{
  	margin-top: 25px;
    /*border: 1px solid grey;*/
    box-shadow: 0px 0px 2px grey;
    border-radius: 5px;
    padding-top: 7px;
    padding-bottom: 15px;
    width: 85%;
    padding-left: 7px;
  }
  .ttmh{
  	margin-top: 80px;
    height: 50px;
    background: blue;
    width: 200px;
    color: white;
    line-height: 48px;
    border: 1px solid blue;
    border-radius: 3px;
    text-align: center;
    margin-left: 310px;
  }
  .ttmh>a{
  	color:white;
  	font-size: 17px;
  }
  .icon>i{
  	font-size: 60px;
    color: blue;
    font-weight: 200;
    margin-top: 11px;
  }
  .vvvv{
    margin-top: 20px;
  }
  .tongtien{
    font-size: 25px;
    margin-top: 12px;
  }
  .pvc{
    margin-top: 10px;
  }
  .total{
    font-size: 25px;
    font-weight: 600;
    margin-top: -31px;
  }
  .tks{
  	color:#2F2E2E;
  }
  .ppt{
    margin-top: 5px;
  }
  .sl_item{
    margin-left: -14px;
    width: 22px;
    height: 22px;
    margin-top: -7px;
    border: 1px solid grey;
    border-radius: 20px;
    text-align: center;
    background-color: grey;
    color: white;
    line-height: 20px;
    font-size: 13px;
  }
  form{
    margin-top:30px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
  }
  .item_cart{
    display: flex;
    flex-direction: row;
    margin-bottom: 10px;
  }
  .item_cart>img{
    height: 70px;
  }
  .item_name{
    width: 300px;
    padding-left: 10px;
    height: 70px;
    padding-top: 10px;
    color: #2B2A2A;
  }
  .item_price{
    width: 100px;
    height: 70px;
    line-height: 70px;
    text-align: right;
    color: #2B2A2A;
  }
  .txt-container{
    position: relative;
    /*border: 1px solid;*/
    box-shadow: 0px 0px 2px grey;
    width: 90%;
    border-radius: 5px;
    /*color:white;*/
    background-color: white;
  }
  
  
  .tbdn{
    margin-top:10px;
  }
  .tbdn>a{
    color:blue;
    text-decoration: none;
  }
  .header-info{
    visibility: hidden;
  }
  .header-banner{
    visibility: hidden;
  }
  .mnh-container{
    visibility: hidden;
  }
 	.info_cart{
 	width: 45%;
    height: 580px;
    /*border-right: 1px solid grey;*/
    box-shadow: 1px 0px #D3D1D1;
    padding-left: 130px;
    padding-top: 45px;
 	}
 	.hdapc{
    font-size: 35px;
    color: #000000d9;
 	}
  .hdapc>a{
    color:inherit;
    text-decoration: none;
  }
  body{
    background-color:#F4F3F3;
  }

  hr{
    border: none;
    background-color:#BBB9B9;
    height: 1px; 
  }
  .list_cart{
        position: absolute;
        padding-top: 40px;

    width: 450px;
    /*border: 1px solid grey;*/
    top: 0px;
    left: 58%;
    height:580px;
  }
  .icon{
    width: 45px;
    height: 45px;
    line-height: 41px;
     margin-left: -72px;
    font-size: 25px;
    text-align: center;
    border-radius: 5px;
    float: left;
    margin-right: 10px;
  }
  .user{
    margin-top: 10px;
    /*float: left;*/
  }
  .user>span{
    float: left;
    color:#6C6A6A;
  }
  .user>a{
    color: #6C6A6A;
  }
  .ttgh{
    margin-top: 10px;
    font-size: 24px;
    color: #2C2B2B;
    font-weight: 500;
  }
 </style>
 </div>
</body>
</html>