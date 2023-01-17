<?php
   include 'include/header.php';
 ?>
 <?php
    if(isset($_GET['productID'])){
        $pdName=$_GET['productID'];
    $name=$product->getProductbyName($pdName); 
  }
?>
 <link rel="stylesheet" type="text/css" href="css/pdDetails.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="admin2/CodeSeven-toastr-50092cc/build/toastr.min.css"> 
  <script type="text/javascript" src="admin2/CodeSeven-toastr-50092cc/build/toastr.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

 <div class="content-container">

  


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
        if(isset($name))
          $result=$name->fetch_assoc();
    ?>
<?php
    $product= new product();
    if( isset($_POST['submit'])){

        $addCart= $cart->Addcart($pdName);
    }
?>
	<div class="address">
		Bạn đang ở :&#160<a href="index.php">Home</a>&#160<i class="fa fa-caret-right"></i>&#160
   <a href="pdSearch.php?cat=<?php echo $result['catID'] ?>">
      <?php 
          $catshow=$cat->getCatbyID($result['catID'] ) ;
                  $catName=$catshow->fetch_assoc();
                  echo $catName['catName'];?>
                    
    </a>  &#160<i class="fa fa-caret-right"></i> <?php echo $result['productName']?>
    </div>
  <div class="product-info">
    <div class="pdImage">
          <style type="text/css">
            .pdSlide{
              visibility: hidden;
            }
            .active{
              visibility: visible;
            }
            .pdInfo{
              padding-left: 15px;

            }
            .next{
              width: 70px;
              height: 450px;
              right: 0px;
              position: absolute;
              /*background: red;*/
              z-index: 555;
            }
            .previous{
              width: 70px;
              height: 450px;
              position: absolute;
              /*background: red;*/
              z-index: 555;
            }
            /*.btn-slide>li{
              border:2px solid white;
            }*/
            .active-btn{
              border:2px solid #11D3F1;
            }
          </style>
          <?php 
                $img=array();
                $slide=$product->getSlide($pdName);
                if($slide!=NULL){
                  $i=0;
                  while ($slide_image=$slide->fetch_assoc()) {
                    $img[$i]=$slide_image['image'];
                    $i++;
                  }
                }
            ?>
          <div>
            <?php if(count($img)!=0){
              ?>
          <div class="pdSlide first_slide active">
               <img src="admin2/slider/<?php echo $img[0]?>" width="530" height="430">
          </div>
         <div class="pdSlide">
               <img src="admin2/slider/<?php echo $img[1]?>" width="530" height="430" >
          </div>
          <div class="pdSlide">
               <img src="admin2/slider/<?php echo $img[2]?>" width="530" height="430">
          </div>
          <div class="pdSlide">
               <img src="admin2/slider/<?php echo $img[3]?>" width="530" height="450">
          </div>
          <div class="pdSlide">
               <img src="admin2/slider/<?php echo $img[4]?>" width="530" height="450">
          </div>
          <div class="pdSlide last_slide">
               <img src="admin2/slider/<?php echo $img[5]?>" width="530" height="450">
          </div>
         
          
          </div>
          <div class="previous"></div>
          <div class="next"></div>
            <?php 
              }
              else
              {
                echo '<div class="pdSlide last_slide">
               <img src="admin2/uploads/'.$result['image'].'" width="530" height="475"></div>
               <style type="text/css"> .last_slide{visibility:visible;}</style>
               </div>';
              }
              ?>
          <!-- <div class="slide-btn"> -->
          <ul class="btn-slide">
              
             <?php 
                $slide=$product->getSlide($pdName);
                if($slide!=NULL){
                  $i=0;

                  while ($slide_image=$slide->fetch_assoc()) {
             ?>
              <li class="slide-btn <?php if($i==0) echo "active-btn";?> "><img src="admin2/slider/<?php echo $slide_image['image']?>" width="80" height="80"></li>
              <?php
                $i++;} 
              }
              else{
                echo '<style type="text/css"> .btn-slide{ visibility:hidden;}</style>';
              }
              ?>
          </ul>

        
    </div>
    
    <div class="pdInfo">
      <div class="pdName"><?php echo $result['productName']?></div>
      <div class="abc"> <img src="logo/favicon.PNG" width="60"></img>phân phối ở tất cả showroom HDA PC </div>

      <div class="pd brand"> Nhà sản xuất :
                 <span><?php $brandshow=$brand->getBrandbyID($result['brandID'] ) ;
                  $brandName=$brandshow->fetch_assoc();
                  echo $brandName['brandName'];
                  ?>      </span>               
      </div>
      <div class="pd xx"> Xuất xứ : <span>Chính hãng</span> </div>
      <div class="pd bh"> Bảo hành :
      <span><?php  echo $result['bh'] ?> tháng     </span>               
      </div>
      <div class="pd ttsp"> Tình trạng : <span>Mới 100%</span> </div>
      <div class="pd color"> Màu sắc :
              <span><?php  echo $result['color'] ?></span>               
      </div>
      <?php $gny=$product->formatMoney($result['price']);?>
      
  
       <?php 
            if($result['catID']==5 || $result['catID']==6){
         echo '<div class="pd gny"><span>&#9733 GIÁ NIÊM YẾT:&#160</span>'.$gny.'
                 VNĐ </div>';
         echo '<div class="pd gift">&#127873 Quà tặng kèm theo : ';
            if($result['catID']==5){
              echo '<div class="gf1 f1"> &#9989 Túi chống shock HDA <span>trị giá 139,000 VNĐ</span></div>
                    <div class="gf1"> &#9989 Chuột Dare-U LM115G Wireless <span>trị giá 169.000 VNĐ</span></div>';
            }
            else if($result['catID']==6)
            {
              echo '<div class="gf1 f1"> &#9989 Balo HDA <span>trị giá 139,000 VNĐ</span></div>
                    <div class="gf1"> &#9989 Chuột Chuột Logitech G102 Prodigy RGB <span>trị giá 400.000 VNĐ</span></div>
                    <div class="gf1 "> &#9989 Bàn phím I-rock K62E <span>trị giá 599,000 VNĐ</span></div>';
            }
            echo '<div class="httg">&#127775 Hỗ trợ trả góp lãi suất thấp. Xem thêm chi tiết <a class="view-credit" href=credit.php>tại đây</a> (Khách hàng thanh toán tối thiểu 10% giá trị sản phẩm) (Chỉ xét duyệt hồ sơ tại cửa hàng)</div>';
            echo '<div class="ship"><i class="fas fa-shipping-fast"></i> Miễn phí giao hàng</div>';
            if($result['sale']!=0){
              $price=$result['price'];
              $price_old=$product->formatMoney($price);
              $sale=$result['sale'];
              $sale_price=$price-$price*$sale/100;
              $sale_price=$product->formatMoney($sale_price);
              echo '<div class="old_price p1">Giá cũ :&#160&#160&#160 <span class="price1">'.$price_old.'đ</span></div>
                    <div class="sale_price">Giá KM : &#160&#160<span class="price2">'.$sale_price.'</span><span class = "dv">đ</span></div>';
            }else
            {   $price=$result['price'];
                $price=$product->formatMoney($price);
                echo '<div class="sale_price kkm">Giá KM : &#160&#160<span class="price2">'.$price.'</span><span class = "dv">đ</span></div>';
            }
            // echo '<div class="btn-dh"><a href="cartinfo.php?pdid='.$result['productID'].'">Đặt hàng</a></div>';
            if(intval($result['amount'])>0){

             echo '<form action="" method="post">
                    <input class="btn-dh" type="submit" name="submit" value="Đặt hàng" />
                </form>';
            }
            else
              echo '<div class="btn-dh"  value="Hết hàng" >Hết hàng</div>';
            echo ' </div>';

          }
          else
          {
            echo '<div class="pd price_spt">';
            echo '<img src="banner/solid6.jpg" width="500">';
            echo '<div class="ship_spt"><i class="fas fa-shipping-fast"></i> Miễn phí giao hàng</div>';
            if($result['sale']!=0){
              $price=$result['price'];
              $price_old=$product->formatMoney($price);
              $sale=$result['sale'];
              $sale_price=$price-$price*$sale/100;
              $sale_price=$product->formatMoney($sale_price);
              echo '<div class="old_price p1">Giá cũ :&#160&#160&#160 <span class="price1">'.$price_old.'đ</span></div>
                    <div class="sale_price">Giá KM : &#160&#160<span class="price2">'.$sale_price.'</span><span class = "dv">đ</span></div>';
            }else
            {   $price=$result['price'];
                $price=$product->formatMoney($price);
                echo '<div class="sale_price kkm">Giá KM : &#160&#160<span class="price2">'.$price.'</span><span class = "dv">đ</span></div> ';
            }
            // echo '<div class="btn-dh"><a href="cartinfo.php?pdid='.$result['productID'].'">Đặt hàng</a></div>';
            if(intval($result['amount'])>0){

             echo '<form action="" method="post">
                    <input class="btn-dh" type="submit" name="submit" value="Đặt hàng" />
                </form>';
            }
            else
              echo '<div class="btn-dh"  value="Hết hàng" >Hết hàng</div>';
            echo '  </div>';
          }
          ?>

          
      

    </div>
  </div>
  </div>

<style type="text/css">
  .product-info{
      height: 863px;
  }
  
  .menu-vertical{
    top:180px;
    z-index: 999;
  }
  .pdSlide>img{
    top:0px;
  }
  .view-credit{
    padding: 2px 5px 2px 5px; 
    border-radius: 5px;
    /*border: 1px solid purple;*/
    background:#DF8510;
    color: white;
  }
  .kkm{
    margin-top: 40px;
  }
  .pdName{
    font-size: 26px;
  }
  .price1{
    font-size:22px;
    font-weight: 500;
    color: grey ;
    text-decoration: line-through;

  }
  .price_spt{
    top:300px;
  }
  .dv{
    color: red;
    text-decoration: underline;
  }
  .price2{
    font-size:25px;
    font-weight: 500;
    color: red ;
    font-weight: bold;

  }
  .p1{
    margin-top: 25px;
  }
  .btn-dh{
        background-color: #e70202;
    width: 190px;
    color: white;
    text-align: center;
    height: 50px;
    line-height: 46px;
    font-weight: bold;
    cursor: pointer;
    border: 1px solid red;
    border-radius: 5px;
    outline: none;
    font-size: 30px;
    margin-top: 30px;
  }
  .old_price{
    font-size: 21px;
    font-weight: 600;
    color: grey;
  }
  .sale_price{
    font-size: 22px;
    color: #2A2929;
  }
  .btn-dh>a
  {
    color:white;
  }
  .httg{
    width: 630px;
    margin-top: 10px;
    font-size: 20px;
    line-height: 30px;
  }
  .mnh-container{
    width: 1360px;
  }
  .ship{
    color: red;
    margin-top: 10px;
    font-size: 23px;
  }
  .ship_spt{
    color: #0E4BE7;
    margin-top: 10px;
    font-size: 21px;
  }
  .gf1{
    color: #333333;
    font-size: 19px;
    margin-left: 20px;
  }
  .f1{
    margin-top: 10px;
  }
  .gf1>span{
    color: red;
  }
  .btn-slide{
    top:460px;
    left: 40px;
  }
  
  .gift{
    top:345px;
    color: blue;
    font-size: 24px;
  }
  .footer{
    /*position: relative;
    top:200px;*/
    margin-top: 20px;
  }
  .description{
    margin-top: 80px;
    margin-bottom: 30px;
    width: 1310px;
    margin-left: 20px;
    background-color: white;
  }
  .desc-container{
    padding-top: 20px;
    /*border: 1px solid #A0A0A0;*/
    box-shadow: 0px 0px 3px #A0A0A0;
    padding-left: 10px;
    padding-bottom: 20px;
  }
  .desc-title{
    /*background-color: red;*/
    position: relative;
    width: 230px;
    height: 40px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    line-height: 40px;
    padding-left: 10px;
    /*color: wheat;*/
    font-weight: bold;
    font-size: 23px;
    color:#2A2A2A;
    border-top-right-radius: 6px;
    border: 1px solid #C4C3C3;
    border-bottom:2px solid white;
    border-top-left-radius: 6px;
    
  }
  .comment{
        height: 60px;
    line-height: 60px;
    font-family: sans-serif;
    font-size: 29px;
    font-weight: 500;
    padding-left: 10px;
  }
  .address{
    margin-top: -13px
  }
</style>
<div class="description"> <div class="desc-title">Thông tin sản phẩm</div>
    <div class="desc-container">
      <?php
        echo $result['info'];
        ?>
    </div>

    <div class="danhgiasp">
        <div class="titledg">Nhận xét và đánh giá về sản phẩm </div>
        <div class="overviewDG">
          <div class="ov1">
            <div style="font-weight: 500;    font-size: 20px;">Đánh giá trung bình</div>
            <div class="ratemean">4.5/5</div>
            <div>
                <form class="formRate">
                    <i star-rating="1" class="fas fa-star star" ></i>
                    <i star-rating="2" class="fas fa-star star"></i>
                    <i star-rating="3" class="fas fa-star star"></i>
                    <i star-rating="4" class="fas fa-star star"></i>
                    <i star-rating="5" class="fas fa-star star"></i>
                    <input type="number" name="rating" id="ratingInput" value="5" disabled style="display: none;">
                </form>
              
    

            </div>
            <div><i class="fas fa-poll"></i> 4 đánh giá</div>
          </div>

          <div class="ov2">
            <div style="display: flex;flex-direction: row;" class="rateRow">
              <span>5 <i class="fas fa-star"></i></span>
              <div class="progress" progressHeight="12px" data="60" color="hsl(0deg 85% 55%)"></div>
              <span>60%</span>
            </div>
            <div style="display: flex;flex-direction: row;" class="rateRow">
              <span>4 <i class="fas fa-star"></i></span>
              <div class="progress" progressHeight="12px" data="20" color="hsl(344deg 85% 55%)"></div>
              <span>20%</span>
            </div>
            <div style="display: flex;flex-direction: row;" class="rateRow">
              <span>3 <i class="fas fa-star"></i></span>
              <div class="progress" progressHeight="12px" data="10" color="hsl(14deg 85% 55%)"></div>
              <span>10%</span>
            </div>
            <div style="display: flex;flex-direction: row;" class="rateRow">
              <span>2 <i class="fas fa-star"></i></span>
              <div class="progress" progressHeight="12px" data="7" color="hsl(30deg 85% 55%)"></div>
              <span>5%</span>
            </div>
            <div style="display: flex;flex-direction: row;" class="rateRow">
              <span>1 <i class="fas fa-star"></i></span>
              <div class="progress" progressHeight="12px" data="3" color="hsl(53deg 85% 55%)"></div>
              <span>5%</span>
            </div>
            
          </div>

          <div style="display: flex; text-align: center;margin-top: 50px;">

            <div style="margin-right: 20px;">
              <div><i class="fas fa-thumbs-up" style="font-size: 25px; color: #1108D1"></i></div>
              <br>
              <div>3 nhận xét tích cực</div>
            </div>

            <div>
              <div><i class="fas fa-thumbs-down" style="font-size: 25px;"></i></div>
              <br>
              <div>1 nhận xét tiêu cực</div>
            </div>

          </div>
        </div>
    </div>
    <div style="display: flex;background: #f6f6f6;" class="abcde">
      <div class="rvB">
        Bạn chấm sản phẩm này bao nhiêu sao?
          <form class="formRate mkmk">
                    <i star-rating="1" class="fas fa-star star" ></i>
                    <i star-rating="2" class="fas fa-star star"></i>
                    <i star-rating="3" class="fas fa-star star"></i>
                    <i star-rating="4" class="fas fa-star star"></i>
                    <i star-rating="5" class="fas fa-star star"></i>
                    <div id="ratingVal"></div>
                    <input type="number" name="rating" id="ratingInput" value="1" disabled style="display: none;">

          </form>
          
      </div>

      <div class="rvContent">
        <div style="margin-bottom: 7px;">
          <input type="text" class="nameRV" name="" style="border-radius: 5px; padding: 5px;width: 200px;" placeholder="Vui lòng nhập họ tên..">
        </div>
        <textarea id="txtRV" placeholder="Bạn có khuyên người khác mua sản phẩm này không, tại sao ?"></textarea>
        <button id="sendRV" onclick="sendRV()">Gửi đánh giá</button>
      </div>

    </div>

    <div class="list-review">
        <!-- <div class="review-temp">
            <div class="hghghg">
              <img src="icon/anonymous.png" width="50">
              <div class="klklkl">Bùi Thanh Hoàng</div>
              <div>20/5/2020</div>
            </div>

            <div class="ababab">
              <div >
                <i class="fas fa-star star-voted"></i>
                <i class="fas fa-star star-voted"></i>
                <i class="fas fa-star star-voted"></i>
                <i class="fas fa-star star-voted"></i>
                <i class="fas fa-star star-voted"></i>
              </div>
              
              <img src="icon/happy.png" class="sentiment" width="30">
              <div class="ppppp">
                Giao hàng nhanh, sản phẩm đúng như mô tả. Cho 5 sao.
              </div>
            </div>
        </div>

        <div class="review-temp">
            <div class="hghghg">
              <img src="icon/anonymous.png" width="50">
              <div class="klklkl">Bùi Thanh Hoàng</div>
              <div>20/5/2020</div>
            </div>

            <div class="ababab">
              <div >
                <i class="fas fa-star star-voted"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              
              <img src="icon/sad2.png" class="sentiment" width="30">
              <div class="ppppp">
                Pin yếu quá
              </div>
            </div>
        </div> -->

    </div>

    <div class="comment">Bình luận</div>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
<div class="fb-comments" data-href="http://localhost/web_hdapc/pdDetails.php?productID=<?php echo $pdName;?>" data-numposts="5" data-width="1300" style="margin-left: 5px;"></div>
</div>

<div class="footer">
 <?php
  include 'include/footer.php';
?>
</div>

<style type="text/css">
  .list-review{
    font-family: sans-serif;
/*    border:1px solid gray;*/
    padding: 0px 15px 15px 15px;
    width: 65%;
    margin:15px auto;
    border-radius: 3px;
    box-shadow: 0px 0px 1px gray;
  }
  .review-temp{
    padding-top: 15px;
    padding-left: 5px;
    padding-bottom: 15px;
    border-bottom: 1px solid #DCDCDC;
  }
  .star-voted{
    color: #EFB70C;
  }
  .ababab{
    position: relative;
  }
  .sentiment{
    position: absolute;
    top: 0px;
    color: blue;
    font-size:22px;
    right: 10px;
  }
  .list-review>div{
    display: flex;
    flex-direction: row;
  }
  .ppppp{
    margin-top: 30px;
    border-radius: 5px;
    padding: 10px;
    width: 650px;
    background: #f5f5f5;
  }
  .hghghg{
    width: 30%;
  }
  .klklkl{
   margin-top: 5px;
   margin-bottom: 10px;
   color: blue;
  }
  .rvB{
  margin: 0px 10px 0px 10px;
    padding: 10px;
/*    background: #e80000;
    color: white;*/
    padding-top: 35px;
    width: 40%;
    text-align: center;
    font-family: sans-serif;
    font-weight: 500;
    font-size: 18px;
    border-radius: 5px;
}
#ratingVal {
    position: absolute;
    color: white;
    font-size: 17px;
    background: rgba(0, 0, 0, 0.9);
    padding: 10px 10px;
    font-family: sans-serif;
    border-radius: 5px;
    margin-left: 10px;
}
.rvContent{
  width: 70%;
  padding:20px;
  /*display: flex;*/
  position: relative;
}
.rvContent>button{
  height: 35px;
  position: absolute;
  right: 40px;
  top: 70px;
  cursor: pointer;
  border-radius:5px;
  width: 120px;
  outline: none;
  border: none;
  margin-left: 10px;
  background: #cb1c22;
  color: white;font-size: 16px;font-size: font-weight:500;
}
.rvContent>textarea{
  width: 80%;
  height: 55px;
  border-radius: 5px;
  font-family: sans-serif;
  font-size: 16px;
  padding:5px;
  padding-right: 140px;
}
.mkmk{
  margin-left: -100px;
}
/*.abcde>div{
  width: 50%;
}*/
</style>

<script type="text/javascript">
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

var hues = [53, 30, 14, 344, 0]; 
$(document).ready(function() {
  getReview();
  $(".progress").each(function()
  {
    var data,progressHeight, color;
    data = $(this).attr('data');
    progressHeight = $(this).attr('progressHeight');
    color = $(this).attr('color');
    $(this).css('height', 10);
    var barSpan = '<span class="bar"></span>';
    var valueSpan = '<span class="value"></span>';
    $(this).append(barSpan);
    $(this).append(valueSpan);
    $(this).children(".bar").css('width', data+'%');
    $(this).children(".bar").css('background-color', color);
  })


  var stars = $(".star");
    var rating = parseInt($("#ratingInput").val());
    const ratingPreview = $("#ratingVal");
    
  var Star = {
    onClicked: function() {
            // Determine Input Value
        $("#ratingInput").val($(this).attr("star-rating"));
            rating = parseInt($("#ratingInput").val());
            judgeRating(ratingPreview, rating);
            
            // Assign Colors
      $(this).siblings()
                .filter(".star").removeClass("clickedStars"); // Reset Color
      assignColor(hues[rating - 1], "Color");
      $(this).prevAll().addBack().addClass("clickedStars");
    },

    onHovered: function() {
      const currIndex = $(this).index();
            var ratingIdx = rating - 1; // Rating Index
      if (currIndex > ratingIdx) {
        assignColor(hues[currIndex], "Color");
      }

      $(this).prevAll().addBack().addClass("hoveredStars");
            
            let hovRating = parseInt($(this).attr("star-rating"));
            judgeRating(ratingPreview, hovRating);
    },
        
        unHover: function() {
            // Reset Color
        $(this).prevAll().addBack()
        .removeClass("hoveredStars");
            assignColor(hues[rating - 1], "Color");
            
            // Change Rating Text
            if (rating) { judgeRating(ratingPreview, rating); }
            else { ratingPreview.text("Click on the Stars to Rate them!"); }
    }
  };
    
    /* INIT: Set up stars beforehand */
    init(stars, rating);
    
    /* Star Events */
  stars.click(Star.onClicked);
  stars.hover(Star.onHovered, Star.unHover);
});

// Functions

function init(obj, initRating) {
    judgeRating($("#ratingVal"), initRating);
    
    initRating--; // Convert to Array Index
    let initStar = obj.get(initRating);
            
    // Assign Colors
  $(initStar).siblings()
        .filter(".star").removeClass("clickedStars"); // Reset Color
  assignColor(hues[initRating], "Color");
  $(initStar).prevAll().addBack().addClass("clickedStars");
}

function assignColor(hue, assignedVar) {
  const sat = "85%",
            val = "55%"; // Saturation & Value
  document.documentElement.style.setProperty(
    "--" + assignedVar,
    "hsl(" + hue + "," + sat + "," + val + ")"
  );
}

function judgeRating(selector, rating) {
    var reaction = (rating) => {
        switch(rating) {
            case 1:
                return "Không thích"
                break;
            case 2:
                return "Tạm được"
                break;
            case 3:
                return "Bình thường"
                break;
            case 4:
                return "Hài lòng"
                break;
            case 5:
                return "Tuyệt vời"
                break;
            default:
                return "ERR: you shouldn't be able to see this value..."
        }
    };
    selector.text(
      reaction(rating)
    );
}


</script>

<script type="text/javascript">
  function sendRV(){
    var txt = $('#txtRV').val();
    var vote=$('.mkmk > .clickedStars').length;
    var pdid=<?php echo $result['productID']?>;
    var reviewer=$('.nameRV').val();
    // alert(reviewer);
    if(reviewer==""){
      toastr["error"]("Bạn chưa nhập tên","Thông báo !",);
    }
    else if(txt==""){
      toastr["error"]("Bạn chưa nhập nội dung","Thông báo !",);
    }
    else if(vote==0){
      toastr["error"]("Bạn chưa vote sao","Thông báo !",);
    }
    else{
        $.ajax({
        url: 'RVprocess.php',
        type: 'post',
        data: { pdid:pdid , vote:vote, message:txt, reviewer:reviewer},
        dataType:"JSON",
        beforeSend: function() {
        $('#sendRV').html('Đang gửi...');
      },
        success: function(data){
            if(data.result!=""){
                  $('#sendRV').html('Gửi bình luận');
                  $('.nameRV').val('');
                  $('#txtRV').val('');
                  toastr["info"]("Đã tải lên nhận xét của bạn,xin cám ơn!","Thông báo !",);
                  getReview();
            }
            // else 
            //     alert('Lỗi');
                  
            },
    });
    }

}

  function getReview(){
    var pdid=<?php echo $result['productID']?>;
    $.ajax({
        url: 'RVprocess.php',
        type: 'post',
        data: { getRV:pdid},
        dataType:"JSON",
        success: function(data){
            if(data.result){
                  // alert(data.result);
                  $('.list-review').css('visibility','visible');
                  $('.list-review').html(data.result);
            }
            // else 
            //     alert('Lỗi');
                  
            },
        error: function (jqXHR) {
            // alert('Lỗi');
            $('.list-review').css('visibility','hidden');
       }
    });
  }
</script>
