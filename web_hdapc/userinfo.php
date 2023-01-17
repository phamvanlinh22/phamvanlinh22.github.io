<?php
   include 'include/header.php';
 ?>
<div class="dk-container">
<div class="ttdk">Thông tin của bạn</div>

<?php
    if( isset($_POST['luu'])){
        $ud= $user->update_user($_POST);
    }
    if(isset($ud))
    	echo $ud;
?>
<?php
	$info=$user->showUserInfo();
	$row=$info->fetch_assoc();

?>
<form  action="" method="post" class="form-dk">
	<div>
		<label for="name"><i class="far fa-address-card"></i></label>
		<input type="text" name="name" placeholder="Nhập họ tên..." value="<?php echo $row['ctName']?>" tabindex="1" class="input nhap1" />
		<button type="submit" name="luu" style="margin-left: 30px; cursor: pointer;"><img src="icon/update2.png" width="30" ></button>
	</div>
	<div>
		<label for="name"><i class="fas fa-user-circle"></i></label>
		<input type="text" name="user" placeholder="Tên tài khoản..." value="<?php echo $row['user']?>" tabindex="1" class="input nhap2"/>
	</div>
	<div>
		<label for="name"><i class="fas fa-lock"></i></label>
		<input type="password" id="password" name="password" placeholder="Mật khẩu..." 
		value="<?php echo $row['password']; ?>" tabindex="1" class="input nhap3"/>
		<span id="showpw" onclick="showPassword()" style="cursor: pointer;margin-left: -30px;font-size: 15px;">
			<i class="fas fa-eye"></i></span>
		<script type="text/javascript">
			function showPassword() {
			  var x = document.getElementById("password");
			  var y = document.getElementById("showpw");
			  if (x.type === "password") {
			    x.type = "text";
			    y.innerHTML='<i class="fas fa-eye-slash"></i>';
			  } else {
			    x.type = "password";
			    y.innerHTML='<i class="fas fa-eye"></i>';
			  }
			}
		</script>
	</div>
	<div>
		<label for="textarea"><i class="far fa-envelope"></i></label>
		<input type="text" name="gmail" placeholder="...@gmail.com" value="<?php echo $row['gmail']?>" tabindex="1" class="input nhap4"/>
	</div>
	<div>
		<label for="textarea"><i class="fas fa-mobile-alt"></i></label>
		<input type="text" name="phone" placeholder="Số điện thoại..." value="<?php echo $row['phone']?>" tabindex="1" class="input nhap5"/>
	</div>
	<div>
		<label for="name"><i class="fas fa-map-marked-alt"></i></label>
		<input type="text" name="address" placeholder="Địa chỉ thường dùng để nhận hàng..." value="<?php echo $row['address']?>" class="input nhap6"tabindex="1" />
	</div>
	<div>
		<label for="name"><i class="fas fa-city"></i></label>
		<select id="select" name="tinh">
			<option value='Vĩnh Long'>-----<?php echo $row['city']?>-----</option>
			<option value="An Giang">An Giang
			<option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
			<option value="Bắc Giang">Bắc Giang
			<option value="Bắc Kạn">Bắc Kạn
			<option value="Bạc Liêu">Bạc Liêu
			<option value="Bắc Ninh">Bắc Ninh
			<option value="Bến Tre">Bến Tre
			<option value="Bình Định">Bình Định
			<option value="Bình Dương">Bình Dương
			<option value="Bình Phước">Bình Phước
			<option value="Bình Thuận">Bình Thuận
			<option value="Bình Thuận">Bình Thuận
			<option value="Cà Mau">Cà Mau
			<option value="Cao Bằng">Cao Bằng
			<option value="Đắk Lắk">Đắk Lắk
			<option value="Đắk Nông">Đắk Nông
			<option value="Điện Biên">Điện Biên
			<option value="Đồng Nai">Đồng Nai
			<option value="Đồng Tháp">Đồng Tháp
			<option value="Đồng Tháp">Đồng Tháp
			<option value="Gia Lai">Gia Lai
			<option value="Hà Giang">Hà Giang
			<option value="Hà Nam">Hà Nam
			<option value="Hà Tĩnh">Hà Tĩnh
			<option value="Hải Dương">Hải Dương
			<option value="Hậu Giang">Hậu Giang
			<option value="Hòa Bình">Hòa Bình
			<option value="Hưng Yên">Hưng Yên
			<option value="Khánh Hòa">Khánh Hòa
			<option value="Kiên Giang">Kiên Giang
			<option value="Kon Tum">Kon Tum
			<option value="Lai Châu">Lai Châu
			<option value="Lâm Đồng">Lâm Đồng
			<option value="Lạng Sơn">Lạng Sơn
			<option value="Lào Cai">Lào Cai
			<option value="Long An">Long An
			<option value="Nam Định">Nam Định
			<option value="Nghệ An">Nghệ An
			<option value="Ninh Bình">Ninh Bình
			<option value="Ninh Thuận">Ninh Thuận
			<option value="Phú Thọ">Phú Thọ
			<option value="Quảng Bình">Quảng Bình
			<option value="Quảng Bình">Quảng Bình
			<option value="Quảng Ngãi">Quảng Ngãi
			<option value="Quảng Ninh">Quảng Ninh
			<option value="Quảng Trị">Quảng Trị
			<option value="Sóc Trăng">Sóc Trăng
			<option value="Sơn La">Sơn La
			<option value="Tây Ninh">Tây Ninh
			<option value="Thái Bình">Thái Bình
			<option value="Thái Nguyên">Thái Nguyên
			<option value="Thanh Hóa">Thanh Hóa
			<option value="Thừa Thiên Huế">Thừa Thiên Huế
			<option value="Tiền Giang">Tiền Giang
			<option value="Trà Vinh">Trà Vinh
			<option value="Tuyên Quang">Tuyên Quang
			<option value="Vĩnh Long">Vĩnh Long
			<option value="Vĩnh Phúc">Vĩnh Phúc
			<option value="Yên Bái">Yên Bái
			<option value="Phú Yên">Phú Yên
			<option value="Tp.Cần Thơ">Tp.Cần Thơ
			<option value="Tp.Đà Nẵng">Tp.Đà Nẵng
			<option value="Tp.Hải Phòng">Tp.Hải Phòng
			<option value="Tp.Hà Nội">Tp.Hà Nội
			<option value="TP  HCM">TP HCM

		</select>
	</div>

	<div>
		
	</div>

</form>

<div class="ttdk" style="margin-top: 50px; padding-top: 0px;padding-bottom: 5px;">Lịch sử mua hàng</div>
<div style="margin-top: 50px;">
	<table style="width: 98%;margin-left: 12px;" cellspacing="0" cellpadding="0">
		<tr style="background-color: #646262; color: white;height: 50px;outline :none;font-weight: bold;font-size: 19px;">
			<td class="td id" style="width: 50px;padding-left: 10px;">STT</td>
              <td class="td tsp" style="width: 250px;">Mã đơn hàng</td>
              <td class="td img" style="width: 350px;">Địa chỉ</td>
              <!-- <td class="td sl">Gmail</td> -->
              <td class="td ">Ngày đặt</td>
              <td class="td db">Tổng tiền</td>
              <td class="td g">Tình trạng</td>
		</tr>
		<?php
		$result=$order->showUserOrder();
		$i=0;
		if($result!=null){
		while ($row2=$result->fetch_assoc()) {
			$i++;
		?>
		<tr <?php if($i%2==0) echo 'style="background-color:#D5D3D3;"'; ?>>
              <td class="td2 t3"><?php echo $i ?></td>
              <td class="td2 t4">
                 <a href="orderinfo2.php?odID=<?php echo $row2['odID'] ?>">
                  <?php echo $row2['odID'] ?></a>
               </td>
              <td class="td2"><?php  echo $row2['address'] ?></td>
              <td class="td2"> <?php echo $row2['dateorder'] ?></td>
              <td class="td2"> <?php echo $product->formatMoney($row2['price']) ?><u>đ</u></td>
              <td class="td2 " style=""> <?php echo $row2['status'] ?></td>
         </tr>
         <?php
         	}}
         ?>
	</table>
	<style type="text/css">
		.td2{
			font-family: "Segoe UI", Helvetica, Arial, sans-serif;
			height: 50px;
			font-weight: 500;
			/*border:1px solid ;*/
		}
	</style>
</div>
</div>

<style type="text/css">
  .footer{
    margin-top: 210px;
  }
  .dk-container{
  	position: relative;
    width: 1310px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    /*height: 500px;*/
   	padding-bottom: 50px;
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
<script type="text/javascript">
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
 <div class="footer">
 <?php
  include 'include/footer.php';
?>
</div>