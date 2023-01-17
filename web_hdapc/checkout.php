
<?php
  include 'include/header.php';
?>
        

<link rel="stylesheet" type="text/css" href="admin2/CodeSeven-toastr-50092cc/build/toastr.min.css">
  <div class="container">
  <div class="info_cart">
  	<div class="hdapc"><a href="index.php">HDAPC.COM</a></div>

  	<div class="address2"><a href="cartinfo.php"> Giỏ hàng</a>&#160 <i class="fas fa-angle-right"></i>&#160Thông tin giao hàng</div>
    <div class="ttgh">Thông tin giao hàng</div>
      <?php
      if(Session::get('user_login')==true){
       
        ?>
        <div class="user">
          <div class="icon"><i class="far fa-user"></i></div>
          <span><?php echo Session::get('user_name').' ('.Session::get('user').')';?></span><br>
          <a href="?action=logout" onclick="return confirm('Bạn muốn đăng xuất')">Đăng xuất</a>
        </div>
        <?php
      }
      else
        echo '<div class="tbdn">Bạn có tài khoản ? <a href="dangnhap.php"> Đăng nhập</div></a>';

    ?>

    <form class="dkgh" action="" method="post" id="dkgh">

      <div class="txt-container txt2">
        <label for="name">Họ tên</label>
        <input type="text" name="ctname" id="ip2" class="hotenn" maxlength="50"
        value="<?php if(Session::get('user_login')==true)
                      echo Session::get('user_name');
           ?>" tabindex="1" />
      </div>

      <div class="txt-container txt3">
        <label for="name">Số điện thoại</label>
        <input type="text" name="phone" id="ip3" class="sdttt" maxlength="10"
        value="<?php if(Session::get('user_login')==true)
                      echo Session::get('phone');
           ?>" tabindex="1" />
      </div>

      <div class="txt-container txt3">
        <label for="name">Gmail</label  >
        <input type="text" name="gmail" id="ip3"  class="gmaill" maxlength="50"
        value="<?php if(Session::get('user_login')==true)
                      echo Session::get('gmail');
           ?>" tabindex="1" />
      </div>
    
      <div class="txt-container sl1" style="width: 180px !important;">
        <label for="city">Tỉnh/thành</label>
        <select name="city" id="city" onchange="getQH()" >
          <?php  

          ?>
          <option value="<?php if(Session::get('user_login')==true)
                      echo Session::get('city'); else echo "Tỉnh Vĩnh Long";
           ?>">
            <?php if(Session::get('user_login')==true)
                      echo Session::get('city'); else echo "Tỉnh Vĩnh Long";
           ?></option>
           <!-- <option value="Vĩnh Long">Vĩnh Long</option> -->
            <?php
              $province=$user->getProvince();
              while ($pv_name=$province->fetch_assoc()) {
                $pvvv=$pv_name['name'];
              ?>
              <option value="<?php echo $pvvv; ?>"><?php echo $pvvv; ?></option>

              <?php  
              }
            ?>
        </select>
      </div>

      <div class="txt-container sl2" style="width: 180px !important;" >
        <label for="city">Quận/Huyện</label>
        <select name="district" id="district" class="sl-qh" onchange="getPX()">

           <!-- <option value="Vietnam">Vietnam</option> -->
      
        </select>
      </div>
      <div class="txt-container sl3" style="width: 180px !important;" >
        <label for="city">Phường/Xã</label>
        <select name="ward" id="select-choice" class="sl-px">

           <!-- <option value="Vietnam">Vietnam</option> -->
      
        </select>
      </div>

      <div class="txt-container txt1">
        <label for="name">Địa chỉ cụ thể</label>
        <input type="text" name="address" id="ip1" maxlength="100"
           value="<?php if(Session::get('user_login')==true)
                      echo Session::get('address');
           ?>" tabindex="1" />
      </div>
      <input type="text" name="shipfee" class="shipfeeee" style="display: none;" >
      <br>
      <span class="abb" style="font-size:20px;margin-bottom: 10px;">Phương thức giao hàng</span>
      <span style="margin-left: 20px;padding-right: 7px;">(<img src="icon/ghtk.png" width="23" > Giao hàng tiết kiệm)</span>
      <div class="txt-container tt">
        <i class="fas fa-dot-circle" style="margin-right: 10px;"></i>  &#160Giao hàng tận nơi
        
        
      </div>
   <?php $ttp=$cart->totalPrice();
            if($ttp!=NULL){
              $tt=$ttp->fetch_assoc();
              
              Session::set('tt_price',$tt['tongtien']);
            }?>
    <span class="abb" style="font-size:20px;margin-bottom: 20px;">Phương thức thanh toán</span>
      <div class="txt-container tt">
         <i class="fas fa-dot-circle"></i>
        <select class="sl-pttt" onchange="chonPTTT(this)" style=" font-size: 13px;color: #656161; margin-top: -10px;padding-top: 2px;font-weight: 600; margin-left: 5px;">
          <?php
            if(intval($tt['tongtien'])>=20000000)
              echo '<option value="2">Thanh toán trực tuyến</option>';
            else
            {
              echo '<option value="1">Thanh toán khi nhận hàng</option>
                    <option value="2">Thanh toán trực tuyến</option>';
            }
          ?>
        
      </select>
      <div style="font-size: 14px; font-weight: 500;color: #060688;">(Chỉ nhận thanh toán trước với đơn hàng trên 20,000,000 vnđ)</div>
       
      </div>
    
      <textarea placeholder="Ghi chú..." name="note" style="margin-top: 25px;"></textarea>

      <div class="lastdiv">
        <a href="cartinfo.php"><i class="fas fa-angle-left"></i> Quay lại giỏ hàng</a>
        <div class="submit2" onclick="thanhtoan()">Hoàn tất đơn hàng</div>
        <input type="submit" id="htdhh" value="Hoàn tất đơn hàng" name="submit" class="submit" />

      </div>
  
     <select class="tran_type" name="tranport" style="position: relative;
    top: -435px;
    border: none;
    left: 420px;
    font-size: 13px;
    font-weight: 600;
    color: #494949;" onchange="feeShip()">
          <option value="road">Đường bộ</option>
          <option value="fly">Đường hàng không</option>
      </select>
  </div>
  </form>


  <div class="list_cart">
    <?php
        $item=$cart->showCart();
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
    <div class="tamtinh" tongtien="<?php echo $tt['tongtien'] ?>" style="color: blue"><?php echo $product->formatMoney($tt['tongtien']); ?>
            <u>đ</u></div>
    <!-- <br> -->
    <?php $trong_l=$cart->sumWeight(); ?>
    <div style="margin-top: 15px;margin-bottom: 15px;">
      Trọng lượng : <span class="weightt" w='<?php  echo $trong_l; ?>' style="position: relative; left: 310px; color: #4C15B2;">
        <?php  echo $trong_l; ?>g</span>
    </div>
    <div class="pvc">Phí vận chuyển :</div>
    <div class="tamtinh pvc-ghtk" pvc='0' >Miễn phí<u></u></div>
    <hr class="vvvv">
    <div class="tongtien">Tổng tiền :</div>
    <div class="tamtinh total" tt='<?php echo $tt['tongtien'] ?>'><?php echo $product->formatMoney($tt['tongtien']);
    ?><u>đ</u></div>
  </div>



<script src="admin2/formatMoney/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script>
<script src="admin2/CodeSeven-toastr-50092cc/build/toastr.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      getQH();
      chonPTTT();


        });

  var tinh="";
  function getQH(){
    tinh=$('#city').val();
    $.ajax({
              url:"./admin2/lhth.php",
              method:'post',
              data:{ tinh :tinh },
              dataType:"JSON",
              success: function(data){
                   $('.sl-qh').html(data.qh);
                  feeShip();
                  getPX();
                  }
             })
    
  }

  var qh="";
  function getPX(){
    qh=$('#district').val();
    $.ajax({
              url:"./admin2/lhth.php",
              method:'post',
              data:{ qh :qh },
              dataType:"JSON",
              success: function(data){
                   $('.sl-px').html(data.px);
          
                  }
             })
  }

        

  // function checkPTTT(){
  //   ttdh=$('.tamtinh').attr('tongtien');
  //   ttdh=parseInt(ttdh);
  //   if(ttdh>=20000000){
  //     $('.sl-pttt').htmt('<option value="2">Thanh toán trực tuyến</option>');
  //   }
  // }

  var sum_w=0;
  var district="";
  var tran_type="road";

  function feeShip(){
    tinh=$('#city').val();
    district=$('.sl-qh').val();
    sum_w=$('.weightt').attr("w");
    tran_type=$('.tran_type').val();
    $.ajax({
              url:"./admin2/shipfee.php",
              method:'post',
              data:{ tinh :tinh,district:district,weight:sum_w,transport:tran_type},
              dataType:"JSON",
              success: function(data){
                   $('.pvc-ghtk').html(data.fee+"<u>đ</u>");
                   $('.shipfeeee').val(data.fee2);
                    $('.pvc-ghtk').attr("pvc",data.fee2);
                    totalP();
                  }
             })
  }

  function chonPTTT(obj){
    pttt=$('.sl-pttt').val();
    if(pttt==1){
      $('.submit').css('z-index','100');
      $('.submit2').css('z-index','10');
    }
    else{
       $('.submit2').css('z-index','100');
      $('.submit').css('z-index','10');
    }
  }


  function thanhtoan(){
    pttt=$('.sl-pttt').val();
    amountt=$('.total').attr('tt');
    if(pttt=2){
      $.ajax({
              url:"vnpay_php/vnpay_create_payment.php",
              method:'post',
              data:{ order_id:<?php echo rand(1,1000);?>,amount:amountt, },
              dataType:"JSON",
              success: function(data){
                   if (data.code === '00') {
                            // if (window.vnpay) {
                            //     vnpay.open({width: 768, height: 600, url: x.data});
                            // } else {
                                location.href = data.data;
                                // alert(x.data);
                            // }
                            return false;
                        } else {
                            alert(data.Message);
                        }
                  }
             })
    }
    
  }

  function totalP(){
    pvc=$('.pvc-ghtk').attr("pvc");
    tt=$('.total').attr("tt");
    tt2=parseInt(pvc)+parseInt(tt);
    $('.total').html(tt2);
    $(".total").simpleMoneyFormat();
    tt3=$('.total').html()+"<u>đ</u>";
    $('.total').html(tt3);
  }



  // $(".sdttt").focusout(function(){
  //   var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
  //   // alert( $(this).val());
  //   var mobile = $(this).val();
  //   if(mobile !==''){
  //       if (vnf_regex.test(mobile) == false) 
  //       {
  //           toastr["warning"]("Số điện thoại không đúng định dạng","Warning !",);  
  //       }
  //   }else{
  //       toastr["error"]("Chưa nhập số điện thoại","Error !",);  
  //   }
  // });

  <?php
    // if(Session::get('user_login')==true)
    //   echo 'var valid=1; ';
    // else
    //   echo 'var valid=0; ';
  ?>
   
  var  format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
  toastr.options = {
              "closeButton": true,
              "debug": true,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-bottom-right",
              "preventDuplicates": false,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

  //   $(".gmaill").focusout(function(){
  //   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  //     if($(this).val()==""){
  //       toastr["error"]("Chưa nhập email","Error !",);  
  //     }
  //     else if  (re.test($(this).val())==false){
  //       toastr["error"]("Email không hợp lệ","Error !",);  
  //     }


  // });




    function chuanHT(ht){
      xau=ht
      kq="";
      i=0;
      xau = xau.trim().toLowerCase();
            for (i = 0; i < xau.length; i++)
            {
                if (i == 0)
                    kq += xau[i].toUpperCase();
                else
                    kq += xau[i];
                if (xau[i] == ' ')
                {
                    while (xau[i] == ' ')
                    {
                        i++;
                    }
                    kq += xau[i].toUpperCase();
                }
            }
      return kq;
    }

    var ckht=0;

    $(".hotenn").focusout(function(){
      $(this).val(chuanHT($(this).val()));
      // checkHoten();
  });

    // function checkHoten(){
    //   hten=$(".hotenn").val();

    //   abc=hten.split(" ");
    //   if(abc.length<2){
    //     toastr["error"]("Họ tên ít nhất 2 kí tự","Error !",);  
    //     $(".hotenn").focus();
    //   }
    //   else if(format.test(hten)==1){
    //     toastr["error"]("Họ tên có kí tự đặc biệt","Error !",); 
    //       $(".hotenn").focus();
    //    }
    //    else if(/\d/.test(hten)==1){
    //     toastr["error"]("Họ tên không được có số","Error !",); 
    //       $(".hotenn").focus();
    //    }
    //    else
    //     return 1;
    // }



    // $('.submit').hover(function(){
    //   if(valid==0){
    //      $(this).css('pointer-events','none');
    //      $(this).attr('disable','no-drop');
    //      // $(this).prop('title','Thông tin không hợp lệ');
    //   }
     

    // });

    // $('.submit2').hover(function(){
    //   if(valid==0){
         
    //      $(this).css('pointer-events','none');
    //      $(this).css('cursor','no-drop');
    //      // $(this).prop('title','Thông tin không hợp lệ');
    //   }
     

    // });
   


</script>

<script type="text/javascript">
      <?php 
          if(isset($addOd))
             echo $addOd;
      ?>
      </script>

  <script type="text/javascript">
    $('#ip1').click(function(event){
         $('.focus').removeClass('focus');
          $('.txt1').addClass('focus'); 
          });
    $('#ip2').click(function(event){
          $('.focus').removeClass('focus');
          $('.txt2').addClass('focus');  
          });
    $('#ip3').click(function(event){
          $('.focus').removeClass('focus');
          $('.txt3').addClass('focus');
          });
    $('.sl1').click(function(event){
          $('.focus').removeClass('focus');
          });
    $('.sl2').click(function(event){
          $('.focus').removeClass('focus');
          });

  </script>

  <script type="text/javascript">
    function doStuff() {
      abcd=$('.shipfeeee').val();
    if(abcd!='') {//we want it to match
        document.getElementById("htdhh").click();
        return;
    }
    doStuff();
    }
  </script>

  <?php
    if(isset($_GET['success'])){
      $kqq=$_GET['success'];
      if($kqq=="false")
        echo '<script type="text/javascript">toastr["error"]("Thanh toán thất bại, vui lòng chọn hình thức thanh toán khác","Error !",); </script>';
      else
        echo '<script type="text/javascript"> setTimeout(function(){ document.getElementById("htdhh").click(); }, 1000);
      ; </script>';
    }
  ?>

  <?php

    if( isset($_POST['submit']) && isset($_GET['success'])){
        $addOd=$order->addOrder($_POST,1);
        if($addOd!=NULL){
          echo '<script type="text/javascript">'.$addOd.'</script>';
        }

    }
    elseif( isset($_POST['submit']) ){
        $addOd=$order->addOrder($_POST,0);
        if($addOd!=NULL){
          echo '<script type="text/javascript">'.$addOd.'</script>';
        }

    }
?>


 <style type="text/css">
 	body{
 		margin:0px;
 		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
 		/*padding-left: 100px;*/
        /*padding-top: 50px;*/
 	}
  .tamtinh{
    float: right;
    margin-top: -22px;
  }
  textarea{
    padding: 5px;
        width: 89%;
    height: 70px;
    border: 1px solid darkgrey;
    border-radius: 2px;
    margin-top: 10px;
  }
  textarea::placeholder{
    padding:7px 10px 7px 10px;
    color: #343232;
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
  .focus{
    border:2px solid #0566CA;
    box-shadow: none;
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
  .submit2{
    width: 200px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    font-weight: 600;
    position: relative;
    left: 155px;
    top:-30px;
    font-size: 14px;
    z-index: 1;
    /*display: none;*/
    border: 1px solid #338dbc;
    border-radius:4px;
    cursor: pointer;
    background: #2887B8;
    color: white;
    margin-left: 231px;
  }
    .submit{
    width: 200px;
    height: 51px;
    font-size: 14px;
    line-height: 50px;
    border: 1px solid #338dbc;
    border-radius:4px;
    position: relative;
    top:-97px;
    z-index: 10;
    left: 155px;
    cursor: pointer;
    background: #338dbc;
    color: white;
    margin-left: 231px;
  }
  .submit:hover{
    background-color: #0B0FC4;
  }
  .submit2:hover{
    background-color: #0B0FC4;
  }
  .tt{
    width: 87%;
    height: 40px;
    line-height: 40px;
    margin-top: 10px;
    color: #6A6767;
    padding-left: 20px;
    font-size: 14px;
  }
  .txt-container>label{
    position: absolute;
    font-size: 13px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    /*font-weight: bold;*/
    color: #6A6767;
    /*color:grey;*/
    top:3px;
    left: 10px;
  }
  .tt>i{
    color:#074CBD;
    font-size: 20px;
    /*line-height: 40px;*/
    vertical-align: middle;
  }
  .abb{
    font-style: 25px;
  }
  .tt>span{
    float: right;
    margin-right: 20px;
  }
  .lastdiv{
    margin-top: 25px;
  }
  .lastdiv>a{
    color:blue;
  }
  .txt-container>input{
        border: none;
    font-size: 16px;
    margin-top: 21px;
    color: #272626;
    margin-left: 17px;
    margin-bottom: 2px;
    width: 92%;
  }
  .sl1{
    width: 43%;
  }
  select{
    font-size: 14px !important;
  }
  .sl2{
    /*width: 43%;*/
        margin-top: -57px;
    margin-left: 200px;
  }
  .sl3{
    /*width: 43%;*/
        margin-top: -56px;
    margin-left: 400px;
  }
  .txt-container>select{
        border: none;
    font-size: 15px;
    margin-top: 21px;
    color: #403F3F;
    margin-left: 17px;
    margin-bottom: 3px;
    width: 90%;
  }
  .clear: {
    clear: both;
  }
  form div{
    margin-bottom: 15px;
  }
  .txt-container>input:focus{
    border:none;
    box-shadow: none;
    outline: none;
  }
  .txt-container>select:focus{
    border:none;
    box-shadow: none;
    outline: none;
  }
  .txt-container:focus.txt-container{
    border:2px solid blue;
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
 	width: 47%;
    height: 980px;
    /*border-right: 1px solid grey;*/
    box-shadow: 1px 0px #D3D1D1;
    padding-left: 100px;
    padding-top: 45px;
 	}
 /*	.container{
 		width: 100%;
    height: 625px;
    border-right: 1px solid grey;
 	}*/
 	.hdapc{
 		    font-size: 33px;
    color: #000000d9;
 	}
  .hdapc>a{
    color:inherit;
    text-decoration: none;
  }
  body{
    background-color:#F4F3F3;
  }
 	.address2{
 		margin-top: 5px;
 		font-size: 15px
 	}
 	.address2>a{
 		text-decoration: none;
    color: blue;
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
    height: 100%;
  }
  .icon{
        width: 45px;
    height: 45px;
    background:#ABABAB;
    color: white;
    line-height: 41px;
    font-size: 25px;
    text-align: center;
    border: 1px solid #ABABAB;
    border-radius: 5px;
    float: left;
    margin-right: 10px;
  }
  .user{
    margin-top: 20px;
    /*float: left;*/
  }
  .user>span{
    float: left;
  }
  .user>a{
    color: blue;
  }
  .ttgh{
        margin-top: 18px;
    font-size: 25px;
    color: #2C2B2B;
  }
 </style>
 </div>

 <script src="admin2/formatMoney/numeral.min.js"></script>
</body>
</html>