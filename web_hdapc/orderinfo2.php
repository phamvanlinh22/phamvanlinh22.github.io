<?php
   include 'include/header.php';
 ?>

 <?php
  if(isset($_GET['odID'])){
        $od=$_GET['odID']; 
        $info=$order->showOrder($od);
    if($info!=NULL)
    $result1=$info->fetch_assoc();
    }
 ?>
 <link rel="stylesheet" type="text/css" href="admin2/progress_step.css">

 <div class="container-fluid" style="padding-left: 50px;">
  <div class="info_cart">
    <div class="hdapc" style="font-size: 30px; font-weight: 500">Thông tin đơn hàng</div>

        <div class="user" style="margin-bottom: 10px;margin-top: 20px;">
          <!-- <div class="icon"><i class="far fa-check-circle"></i></div> -->
          <!-- <div class="ttgh">Đặt hàng thành công</div> -->
        <!--   <span style="font-size: 18px; font-style: italic;">Mã đơn hàng :<span style="font-weight: bold;"> </span></span><br> -->
          <!-- <div class="tks">Cám ơn bạn đã mua hàng !</div> -->
        </div>

     <div class="ttdh" style="border: 2px solid #3C3C3C; width: 450px; padding: 10px;padding-left: 20px; border-radius: 10px;font-size: 18px;">
      <!-- <div class="hd2" style="font-weight: bold;">Thông tin khách hàng</div> -->
      <div class="ac" style="margin-bottom: 10px; margin-left: 100px;">Mã đơn hàng : <span style="font-weight: 500;"><?php echo $od ?></span></div>
      <div class="ac">&#160<i class="fas fa-user-circle"></i> : <?php echo $result1["ctName"];?></div>
      <div class="ac"><i class="fas fa-map-marked-alt"></i> : <?php echo $result1["address"];?></div>
      <div class="ac"><i class="far fa-envelope"></i> : <?php echo $result1["gmail"];?></div>

      <div class="ac">&#160<i class="fas fa-mobile-alt"></i>&#160 : <?php echo $result1["phone"];?></div>

      <div class="ac" style="margin-bottom: 10px; "><i class="fas fa-globe-asia"></i> : Vietnam</div>
      <div style="margin-left: 10px;margin-top: 20px;"><i class="fas fa-shipping-fast" style="font-size: 30px; font-style: normal;"></i></div>
      <div style="margin-left: 70px; margin-top: -40px;">
	      <div class="ac ghtn">Giao hàng tận nơi</div>
	      <div class="ac" >Thanh toán khi nhận hàng (COD)</div>
      </div>

     </div>

  <div class="list_cart">
    <?php
        $item=$order->showOdInfo($od);
        if($item!=NULL)
        {
          while ($result=$item->fetch_assoc()) {
            
       
    ?>
    <div class="item_cart">
      <img src="admin2/uploads/<?php echo $result['pdImage']?>" width="70">
      <div class="sl_item"><?php echo $result['sol']?></div>
      <div class="item_name" style="font-size: 16px;"><?php echo $result['pdName']?></div>
      <div class="item_price" style="font-weight: 500;color: blue;"><?php echo $product->formatMoney($result['price'])?><u>đ</u></div>
    </div>
   <?php
      }
      echo '<hr id="hr">';
        }
    ?>
    
    <div ptt style="font-size: 18px;">Tạm tính :</div>
    <div class="tamtinh" style="font-size: 18px;font-weight: 500;color: #474646" >
    <?php
        $info=$order->showOrder($od);
        if($info!=NULL)
          $result1=$info->fetch_assoc();
        echo $product->formatMoney($result1['price']);
    ?>
      <u>đ</u></div>
    <!-- <br> -->
    <div class="pvc" style="font-size: 18px; margin-top: 10px;">Phí vận chuyển :</div>
    <div class="tamtinh" style="font-size: 18px;">Miễn phí<u></u></div>
    <hr class="vvvv">
    <div class="tongtien" style="color: #363535;font-size: 23px;font-weight: 500;">Tổng tiền :</div>
    <div class="tamtinh total" style="color: #0505AE;font-size: 23px;font-weight: 500;"><?php echo $product->formatMoney($result1['price']);?><u>đ</u></div>


  
  

  </div>
  <div class="fullwidth" style="margin-left: -50px;">
      <div class="container separator">
        <h2 style="margin-left: 20px;margin-top: 100px; color: #363535;">Tình trạng đơn hàng :</h3>
        <!-- 10004 --10008  -->
        <ul class="progress-tracker progress-tracker--center" style="width: 700px; margin-top: 30px;">
          <li class="progress-step is-complete" >
            <div class="progress-text">
              <img src="admin2/slider/cart121.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#9898" ></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif; font-size: 18px;margin-top: 7px; font-weight: 500;'>Đặt hàng</h4>
              </div>
          </li>
			<?php 
			    if($result1['status']!='Chờ xác nhận'){
			  ?>
          <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="admin2/slider/xacnhan3.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#10004" style="color:white;"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Xác nhận</h4>
              </div>
          </li>
          <?php
          	}else{
          ?>

          <li class="progress-step is-active">
            <div class="progress-text">
              <img src="admin2/slider/xacnhan3.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#127744" style="color:white;"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Chờ xác nhận</h4>
              </div>
          </li>

          <?php 
          	}
          ?>
          <?php
            if($result1['status']=="Đang vận chuyển" )
              echo '<li class="progress-step is-active">';
	         elseif($result1['status']=="Chờ xác nhận" )
	              echo '<li class="progress-step">';
            else
              echo '<li class="progress-step is-complete">';
          ?>
          	
          	<?php
					if($result1['status']=="Chờ xác nhận")
	              	echo '<div class="progress-text" style="margin-top: 35px;">';
	              else
	                echo '<div class="progress-text" >
              <img src="admin2/slider/ship.png" width="35">';
				?>
            
            </div>
            <?php 
              if($result1['status']=="Đang vận chuyển")
                echo '<div class="progress-marker" data-text="&#127744" ></div>';
              elseif($result1['status']=="Chờ xác nhận")
              	echo '<div class="progress-marker" ></div>';
              else
                echo '<div class="progress-marker" data-text="&#10004" ></div>';
            ?>
            
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>
				<?php
					if($result1['status']=="Chờ xác nhận")
	              	echo '';
	              else
	                echo 'Đang vận chuyển';
				?>
               </h4>
              </div>
          </li>

          <?php
             if($result1['status']=="Đang vận chuyển" ){
          ?>
            <li class="progress-step">
            <div class="progress-text" style="margin-top: 35px;">
              
            </div>
            <div class="progress-marker" ></div>
          </li>
          <?php
            }
            elseif($result1['status']=="Đã thanh toán" ){
          ?>
              <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="admin2/slider/nhanhang2.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#10004"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Đã thanh toán</h4>
              </div>
          </li>

           <?php
            }
            elseif($result1['status']=="Chờ xác nhận" ){
          ?>
              <li class="progress-step ">
            <div class="progress-text" style="margin-top: 35px;">
              <!-- <img src="admin/slider/nhanhang2.png" width="35"> -->
            </div>
            <div class="progress-marker"></div>
            <div class="progress-text">
                <!-- <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Đã thanh toán</h4> -->
              </div>
          </li>

          <?php
              }else{
          ?>
           <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="admin2/slider/cancel2.png" width="35">
            </div>
            <!-- 10071 -->
            <div class="progress-marker" data-text="&#11093"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Không nhận hàng</h4>
              </div>
          </li>
          <?php
            }
          ?>

          <?php
            if($result1['status']=="Đã thanh toán" ){
          ?>
          <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="admin2/slider/finish3.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#11088"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Hoàn tất</h4>
              </div>
          </li>
          <?php 
            }elseif($result1['status']=="Đang vận chuyển" || $result1['status']=="Chờ xác nhận"){
          ?>
          <li class="progress-step ">
            <div class="progress-text" style="margin-top: 35px;">
            
            </div>
            <div class="progress-marker" ></div>
            <div class="progress-text">
                
              </div>
          </li>

 

          <?php
            } else{
          ?>
            <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="admin2/slider/delete2.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#10060"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Hủy bỏ</h4>
              </div>
          </li>

          <?php
            }
          ?>
         
        </ul>

      </div>
    </div>


<style type="text/css">
	.progress-marker::after {
		margin-left: 75px;
	}
	.container-fluid{
		width: 1250px;
		height: 1100px;
		margin-top: 185px;
		background-color: white;
		padding-top: 10px;
		margin-left: 20px;
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
	.tamtinh{
    float: right;
    margin-top: -22px;
  }
	.list_cart{
		width: 600px;
    margin-left: 45%;
    margin-top: -19%;
    /*border-left: 1px solid;*/
    padding-left: 30px;
	}
	body{
		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
	}
</style>

  
 <div style="margin-top: 0px;margin-left: -65px">
  <?php
  include 'include/footer.php';
?>
</div>

