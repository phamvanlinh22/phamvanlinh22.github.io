<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php
include '../classes/category.php';
include '../classes/brand.php';
include '../classes/product.php';
include '../classes/order.php';
?>

<?php
  $product= new product();
  $cat=new category();
  $brand=new brand();
  $order=new order();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		if(isset($_GET['ship']))
			$ship=$_GET['ship'];
		else
			$ship="Miễn phí";
		if(isset($_GET['odID']))
			$id=$_GET['odID'];
			$orderr=$order->showOrder($id);
			$result=$orderr->fetch_assoc();
			$od_info=$order->showOdInfo($id);

		    $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
		    //date_default_timezone_set('Brazil/East');

		    $datetime = new DateTime();
		    $datetime->setTimezone($tz_object);
		    echo $datetime->format('d/m/Y\ - h:i:s');

	?>
	<title>In hóa đơn</title>
</head>
<body style="font-family: Segoe UI, Helvetica, Arial, sans-serif;padding: 10px 20px 10px 20px;">
<div >
<div style="text-align: center; font-weight: 600;">
	Thông tin hóa đơn
</div>
<div style="text-align: center;font-weight: bold;margin-top: 25px;">Cửa hàng HDA PC</div>
</div>
<div style="text-align: center;margin-top: 3px;">Vĩnh Long</div>
<div style="text-align: center;margin-top: 3px;">0368877443</div>
<div style="border-bottom: 1.5px dotted gray; margin-top: 20px;"></div>
<div style="text-align: center;font-weight: bold;margin-top: 20px;">CHI TIẾT HÓA ĐƠN</div>
<div style="display: flex;flex-direction: row;margin-top: 10px;position: relative;">
	<div>Mã hóa đơn: <?php echo $result['odID']; ?></div>
	<div style="position: absolute;right: 0px">Ngày mua: <?php echo $result['dateorder']; ?></div>
</div>
<div style="border-bottom: 1.5px solid #282727; margin-top: 25px;"></div>
</div>
<div style="margin-top: 20px;font-weight: 400;">Khách hàng: <?php echo $result['ctName']; ?></div>
<div style="margin-top: 7px;font-weight: 400;">Điện thoại: <?php echo $result['phone']; ?></div>
<div style="margin-top: 7px;font-weight: 400;">Địa chỉ: <?php echo $result['address']; ?></div>
<div style="border-bottom: 2px dotted gray; margin-top: 20px;"></div>
<table style="width: 100%;margin-top: 4px;" border="0" cellspacing="0" cellpadding="0">
	<tr style="font-weight: 600;">
		<td style="width: 40%; border-bottom: 1px solid #262424;padding-bottom: 5px;">Sản phẩm</td>
		<td style="width: 20%;text-align: center;border-bottom: 1px solid #262424;padding-bottom: 5px;">Đơn giá</td>
		<td style="width: 40%;text-align: right;border-bottom: 1px solid #262424;padding-bottom: 5px;">Thành tiền</td>
	</tr>
	<?php 
		$tongtien=0;
		if($od_info!=NULL){
			while ($rs=$od_info->fetch_assoc()) {
				
		
	 ?>
	<tr >
		<td style="border-bottom: 1px dotted #262424;padding-top:10px;padding-bottom: 10px;"><?php echo $rs['pdName']." -".$rs['sol']?></td>
		<td style="text-align: center;border-bottom: 1px dotted #262424;"><?php echo $product->formatMoney($rs['price'])?></td>
		<td style="text-align: right;border-bottom: 1px dotted #262424;">
			<?php  
				$price=intval($rs['price'])*intval($rs['sol']);
				$tongtien=$tongtien+$price;
				echo $product->formatMoney($price);
			?>
		</td>
	</tr>
	<?php
		}
		}
	?>
</table>
<table style="width: 100%;margin-top: 4px;" border="0" cellspacing="0" cellpadding="0">
	
	<tr >
		<td style="width: 40%;padding-top:5px;padding-bottom: 5px;"><span style="font-weight: 500">Tổng tiền hàng</span></td>
		<td style="width: 20%;"></td>
		<td style="width: 40%;text-align: right;"><?php echo $product->formatMoney($tongtien); ?> đ</td>
	</tr>
	<tr >
		<td style="width: 40%;padding-top:5px;padding-bottom: 5px;"><span style="font-weight: 500">Phí vận chuyển</span></td>
		<td style="width: 20%;"></td>
		<td style="width: 40%;text-align: right;"><?php echo $product->formatMoney($ship) ?></td>
	</tr>
	<tr >
		<td style="width: 40%;padding-top:5px;padding-bottom: 5px;"><span style="font-weight: 500">Khách phải trả</span></td>
		<td style="width: 20%;"></td>
		<td style="width: 40%;text-align: right;"><?php echo $product->formatMoney($tongtien+intval($ship)); ?> đ</td>
	</tr>
	
</table>
<br>
<div style="text-align: center;margin-top: 15px;"><i>Cám ơn quý khách. Hẹn gặp lại</i></div>
</body>
<style type="text/css">
@page
{
  size: a4;
  margin: 0;
}
#print-btn
{
  display: none;
  visibility: none;
}
</style>
<script type="text/javascript">
	// if(window.print()){
		// window.location="admin2/listdm.php";
	// }
	
</script>
</html>