<?php
   include 'include/header.php';
 ?>
<div class="dk-container">
<div class="ttdk">Đăng ký tài khoản</div>

<?php
    if( isset($_POST['submit'])){
        $dk= $user->insert_user($_POST);
    }
    if(isset($dk))
    	echo $dk;
?>

<form action="dangky.php" method="post" class="form-dk">
	<div>
		<label for="name"><i class="far fa-address-card"></i></label>
		<input type="text"  name="name" placeholder="Nhập họ tên..." value="" tabindex="1" class="input nhap1" />
	</div>
	<div>
		<label for="name"><i class="fas fa-user-circle"></i></label>
		<input type="text" name="user" placeholder="Tên tài khoản..." value="" tabindex="1" class="input nhap2"/>
	</div>
	<div>
		<label for="name"><i class="fas fa-lock"></i></label>
		<input type="password" name="password" placeholder="Mật khẩu..." value="" tabindex="1" class="input nhap3"/>
	</div>
	<div>
		<label for="textarea"><i class="far fa-envelope"></i></label>
		<input type="text" name="gmail" placeholder="...@gmail.com" value="" tabindex="1" class="input nhap4"/>
	</div>
	<div>
		<label for="textarea"><i class="fas fa-mobile-alt"></i></label>
		<input type="text" name="phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Số điện thoại..." value="" tabindex="1" class="input nhap5"/>
	</div>
	<div>
		<label for="name"><i class="fas fa-map-marked-alt"></i></label>
		<input type="text" name="address" placeholder="Địa chỉ thường dùng để nhận hàng..." value="" class="input nhap6"tabindex="1" />
	</div>
	<div>
		<label for="name"><i class="fas fa-city"></i></label>
		<select id="select" name="tinh">
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

	<div>
		<input type="submit" value="Hủy" name="cancel" class="submit h" />
		<input type="submit" value="Xác nhận" name="submit" class="submit xn" />
		
	</div>

</form>
</div>
<script type="text/javascript">
    $(".nhap1").focusout(function(){
      xau=$(this).val();
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

      
        $(this).val(kq);
  });
</script>
<style type="text/css">
  .footer{
    margin-top: 210px;
  }
  .dk-container{
  	position: relative;
    width: 1310px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    height: 500px;
    margin-left: 20px;
    background: white;
    top: 180px;
    text-align: center;

  }
	.tc{
    color: green;
    margin-top: 10px;
    margin-bottom: -10px;
  }
  .tc>a{
  	font-style: italic;
  	color: #02B0DB;
  }
  .tb{
  	color:red;
  	 margin-top: 10px;
    margin-bottom: -10px;
  }
  .ttdk{
  	padding-top: 20px;
  	font-size: 36px;
  	font-weight: 600;
  	color: #191919;
  }
  .form-dk{
  	text-align: left;
  	padding-left: 485px;
  	margin-top: 20px;
  }
  label{
  	font-size: 21px;
  }
  .input{
  	width: 250px;
  	height: 27px;
  	line-height: 27px;
  	border:1px solid grey;
  	/*box-shadow: 0px 0px 3px  grey;*/
  	border-radius: 4px;
  	/*margin-left: 20px;*/
  	padding-left: 10px;
  }
  select{
  	width: 180px;
  	height: 27px;
  	line-height: 27px;
  	border:1px solid grey;
  	/*box-shadow: 0px 0px 3px  grey;*/
  	border-radius: 4px;
  	margin-left: 20px;
  	padding-left: 10px;
  	text-align: center;
  }
  option{
  	text-align: center;
  }
  form>div{
  	margin-bottom: 5px;
  }
  .nhap1{
  	margin-left: 20px;
  }
  .nhap2{
  	margin-left: 23px;
  }
  .nhap3{
  	margin-left: 25px;
  }
  .nhap4{
  	margin-left: 24px;
  }
  .nhap5{
  	margin-left: 30px;
  }
  .nhap6{
  	margin-left: 20px;
  	width: 500px;
  }
  #country{
  	margin-left: 25px;
  }
  .submit{
  	width: 150px;
    height: 35px;
    line-height: 33px;
    margin-top: 25px;
    font-size: 21px;
    font-weight: bold;
    border:1px solid grey;
    border-radius: 5px;
    margin-left: 10px;
    cursor: pointer;
  }
  .h{
  	background-color: #EBE7E7;
  }
  .xn{
  	background-color: #C3C2C2;
  }


</style>
 <div class="footer">
 <?php
  include 'include/footer.php';
?>
</div>