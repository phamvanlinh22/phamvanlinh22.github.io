<?php
   include 'include/header.php';
 ?>
 <link rel="stylesheet" type="text/css" href="css/pdDetails.css">
 <div class="content-container2">
 	<script type="text/javascript">
	    $(document).ready(function() {
      	 
      	$('.Danhmuc').click(function(event){
      		if ($('.menu-vertical').css('visibility')=='visible') {
      			$('.menu-vertical').addClass('hidden2'); 
      			$('.menu-vertical').removeClass('appear');
      		}
      		else {
      			$('.menu-vertical').addClass('appear');
      			$('.menu-vertical').removeClass('hidden2');
      		}
        	});
        	
   
	});
</script>
 <?php
   include 'include/menu.php';
 ?>
<?php
    if( isset($_POST['submit'])){
        $sl=$_POST['sl'];
        $id=$_POST['cartID'];
        $ud_check=$cart->update_Cart($sl,$id);
    }
?>
<?php
    if(isset($_GET['delid'])){
        $delid=$_GET['delid'];
    $del_cart=$cart->delCartbyID($delid); 
  }
?>
<div class="category" style="text-align: center; padding-top: 25px; font-size:32px;font-weight: 600;">
	<i class="fas fa-shopping-cart"></i>

GIỎ HÀNG

  </div>

  </div>
  </div>
  <div class="list-product">
       <table class="tb-dm" border="1" cellpadding="0" cellspacing="0">
          <tr>
          	<td class="f1">STT</td>
          	<td class="f1">Sản phẩm</td>
          	<td class="f1">Tên sản phẩm</td>
          	<td class="f1">Số lượng</td>
          	<td class="f1">Giá</td>
          	<td class="f1">Xóa</td>
          </tr>
          <?php
                $cart_item=$cart->showCart(); 
          		if($cart_item!=NULL){
          			$i=1;
          			while ($item=$cart_item->fetch_assoc()) {
          				
          		
          ?>
          <tr>
          	<td class="f2"><?php echo $i ?></td>
          	<td class="f2 pd-image"><img src="admin2/uploads/<?php echo $item['pdImage']?>"width="90" ></td>
          	<td class="f2 link"><a class="btd" href="pdDetails.php?productID=<?php echo $item['pdName'] ?>">
              <?php
              $thuyan=$product->getProductbyID($item['pdID']);
              $ta=$thuyan->fetch_assoc();
              $tonkho=$ta['amount'];
              ?>
          		<?php echo $item['pdName'] ?>
          	</a></td>
          	<td class="f2 osl">
          		<form action="" method="post">
          			<input type="hidden" name="cartID" value="<?php echo $item['pdID'] ?>">
          			<input type="number" class="ipsl" name="sl"  value="<?php echo $item['sol'] ?>" on min="1" max="<?php echo $tonkho; ?>" >
                    <input class="btn-ud" type="submit" name="submit" value="&#10004" />
                </form>

           </td>
        <!--    <script type="text/javascript">
           	$('.ipsl').on('input', function(){
				    $('.btn-ud').addClass('activebt');
				});
           </script> -->
          	<td class="f2 price"><?php echo $product->formatMoney($item['price']) ?><u>đ</u></td>
          	<td class="f2 del"><a  href="?delid=<?php echo $item['pdID']?>" onclick="return confirm('Bạn muốn xóa mục này ?')"><b><i class="fas fa-trash-alt del"></i> </b></a></td>
          </tr>
          <?php
          		$i++;}
          	}
          	// else
          	// 	header("Location:index.php");
          ?>
     <!--      <tr>
          	<td colspan="3">Tổng tiền</td>
          	<td colspan="3">1,000,000</td>
          </tr> -->
        </table>
	<div class="action">
		<div class="total">Tổng tiền :&#160&#160&#160&#160&#160
				<span><?php $ttp=$cart->totalPrice()->fetch_assoc();
						if($ttp['tongtien']!=NULL){
							// $tt=$ttp->fetch_assoc();
							echo $product->formatMoney($ttp['tongtien']);
						}
						else
							echo '0';
				 ?><u>đ</u></span></div>
		<!-- <i class="fas fa-dollar-sign"></i> -->
    <?php 
        $sl=$cart->amountCart()->fetch_assoc();
        if($sl['soluong']!=NULL)
		     echo '<div class="pay"><a href="checkout.php">Thanh toán</a></div>';
    ?>
		<!-- <i class="fas fa-sync-alt"></i> -->
		<!-- <div class="update"><a href="">Cập nhật</a></div> -->
		
	</div>

  <script type="text/javascript">
    function checkSL(obj){
      alert(obj.value);
    }
  </script>

      <style type="text/css">
      	table{
      		    width: 90%;
			    /*border: 1px solid;*/
			    outline: none;

			    margin:0px auto;

      	}

      	.btd{
      		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
      		font-size: 20px;
      		font-weight: bold;
      		color:#046EB8;
      	}
      	input{
      		padding-left: 20px;
      		width:45px;
      		 height:20px;
      		 font-family: "Segoe UI", Helvetica, Arial, sans-serif;
      		 font-weight: bold;
      		 border:1px solid grey;
      		 outline: none;
      		 border-radius: 1px;
      	}
      	.osl{
      		width: 120px;
      	}
      	.pd-image{
      		width: 150px;
      	}
      	.del{
      		width: 60px;
      		color:black;
      		font-size: 19px;
      	}
      	.del:hover{
      		color: red;
      	}
      	.link{ 
      		width: 650px;
      		/*text-align: left;*/
      		/*padding-left: 80px;*/
      	}
      	.f1{
      		height: 50px;
      		line-height: 50px;
      		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
			font-weight: bold; 
			font-size: 19px;
			color: #272626;
			outline: none;
      		border: 1px solid grey;
      	}
        .pay:hover{
          background-color:#1D1C1C;
          border-color: black;
        }
      	.price{
      		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
      		font-size: 18px;
      		color: #222121;
			font-weight: 500; 
			width: 150px;
      	}
      	.btn-ud{
      		padding:0px;
      		/*float: left;*/
      		/*visibility: hidden;*/
      		cursor: pointer;
		    background: blue;
		    color: white;
		    border: 1px solid blue;
      		width: 25px;
      	}
      	.activebt{
			/*visibility: visible;*/
		}
      	.f1{
      		/*height: 50px;*/
      		/*line-height: 50px;*/
      		/*font-family: "Segoe UI", Helvetica, Arial, sans-serif;*/
			/*font-weight: bold; */
			/*font-size: 19px;*/
			/*color: #272626;*/
			outline: none;
      		border: 1px solid grey;
      	}
      	.action{
      		/*padding-right: 200px;*/
            padding-top: 20px;
            margin-bottom: 30px;
      	}
      	.total{
      		margin-bottom: 20px;
      		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
      		font-size: 18px;
      		color: #292828;
      		font-weight: bold;
      		margin-left:830px;
      	}
      	.update{
      		float: right;
      		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
      		font-size: 20px;
      		width: 100px;
      		height: 37px;
      		line-height: 37px;
      		background-color: red;
      		color: white;
      		margin-top: 10px;
      		font-weight: 500;
      		border: 1px solid red;
      		border-radius: 5px;
      		margin-right: 10px;
      	}
      	.update>a{
			color:white;
			display: block;
      	}
      	.pay>a{
			color:white;
			display: block;
      	}
      	.pay{
      		float: right;

      		font-family: "Segoe UI", Helvetica, Arial, sans-serif;
      		font-size: 20px;
      		width: 120px;
      			margin-top: 10px;
      		height: 37px;
      		line-height: 37px;
      		font-weight: 500;
      		background-color: red;
      		color: white;
      		border: 1px solid red;
      		border-radius: 5px;
      		margin-right: 120px;
      	}

      </style>

</div>

<style type="text/css">
  .footer{
    margin-top: 100px;
  }
  .appear{
    margin-top:4px;
    z-index: 999999999;
  }
  .page{
    margin-top: 40px;
    margin: 10px auto;
    height: 30px;
    /*border: 1px solid grey;*/
    text-align: center;
  }
  .not-active {
  background-color:#F9F471;
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
}
  .sx{
    position: absolute;
    top: 233px;
    color: #4b4f56;
    right: 50px;
    font-size: 16px;
  }
  .sx select{
    font-family: inherit;
    height: 23px;
    color: #4b4f56;
    width: 130px;
    /* font-weight: 600; */
    border-radius: 3px;
  }

  .page-btn{
    width: 30px;
    margin-right: 5px;
    height: 30px;
    color: #0591A1;
    line-height: 30px;
    border: 1px solid #CCCECE;
    box-shadow: 0px 0px 2px grey;
    align-self: center;
    float: left;
  }
  body{
    background-color: white;
  }
  .page-btn>a{
    display: block;
    color: inherit;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    font-size: 16px;
  }
  .list-product{
    background: white;
    position: relative;
    text-align: center;
    margin-top: 20px;
    padding-left: 20px;
  }
  .content-container2{
  margin-top: 175px;
  width: 100%;
  /*height: 200px;*/
}
</style>
<div class="footer">
 <?php
  include 'include/footer.php';
?>
</div>
