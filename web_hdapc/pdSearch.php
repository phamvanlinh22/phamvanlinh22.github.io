<?php
   include 'include/header.php';
 ?>
 <link rel="stylesheet" type="text/css" href="css/pdDetails.css">
 <div class="content-container2">
 	<script type="text/javascript">
	    $(document).ready(function() {
	 	// $('.Danhmuc').click(function(event){
   //      $('.menu-container').addClass('appear');
   //    });

   //    $('.menu-vertical').mouseout(function(event){
   //       $('.menu-container').removeClass('appear');
   //    });
      	 
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
    if(!isset($_GET['cat']) || $_GET['cat']== NULL){
      // echo '<script>window.location=listdm.php</script>';
          // $catName=NULL;
    }
    else
    {
        $catID=$_GET['cat'];
        $catName="";
        if(isset($catID) && $catID=='all'){
        Session::set('catID','all');
        Session::set('catName',"Tất cả sản phẩm");
      }
      elseif(isset($catID) && $catID=='lk'){
        Session::set('catID',$catID);
        Session::set('catName',"Linh kiện máy tính");
      }
      elseif(isset($catID) && $catID=='gg'){
        Session::set('catID',$catID);
        Session::set('catName',"Gaming Gear");
      }
      elseif(isset($catID) && $catID=='sale'){
        Session::set('catID','sale');
        Session::set('catName',"Khuyễn mãi");
      }
      elseif(isset($catID) && $catID=='mbit'){
        Session::set('catID',$catID);
        Session::set('catName',"Mainboard Intel");
      }
      elseif(isset($catID) && $catID=='mbamd'){
        Session::set('catID',$catID);
        Session::set('catName',"Mainboard AMD");
      }
      elseif(isset($catID) && $catID=='8th'){
        Session::set('catID',$catID);
        Session::set('catName',"CPU Intel 8th Gen");
      }
      elseif(isset($catID) && $catID=='9th'){
        Session::set('catID',$catID);
        Session::set('catName',"CPU Intel 9th Gen");
      }
      elseif(isset($catID) && $catID=='10th'){
        Session::set('catID',$catID);
        Session::set('catName',"CPU Intel 10th Gen");
      }
      elseif(isset($catID) && $catID=='rz4'){
        Session::set('catID',$catID);
        Session::set('catName',"CPU AMD Ryzen Gen 2");
      }
      elseif(isset($catID) && $catID=='rz3'){
        Session::set('catID',$catID);
        Session::set('catName',"CPU AMD Ryzen Gen 3");
      }
      elseif(isset($catID) && $catID=='rhpx'){
        Session::set('catID',$catID);
        Session::set('catName',"Ram HyperX");
      }
      elseif(isset($catID) && $catID=='rgs'){
        Session::set('catID',$catID);
        Session::set('catName',"Ram G.kill");
      }
      elseif(isset($catID) && $catID=='rcs'){
        Session::set('catID',$catID);
        Session::set('catName',"Ram Corsair");
      }
      elseif(isset($catID) && $catID=='rzdp'){
        Session::set('catID',$catID);
        Session::set('catName',"CPU AMD Ryzen ThreadDripper");
      }
      elseif(isset($catID) && $catID=='new'){
        Session::set('catID',$catID);
        Session::set('catName',"New Arrivals");
      }
      elseif(isset($catID) && $catID=='ssdkt'){
        Session::set('catID',$catID);
        Session::set('catName',"SSD Kington");
      }
      elseif(isset($catID) && $catID=='ssdit'){
        Session::set('catID',$catID);
        Session::set('catName',"SSD Intel");
      }
      elseif(isset($catID) && $catID=='ssdss'){
        Session::set('catID',$catID);
        Session::set('catName',"SSD Samsung");
      }
      elseif(isset($catID) && $catID=='psucs'){
        Session::set('catID',$catID);
        Session::set('catName',"Nguồn Corsair");
      }
      elseif(isset($catID) && $catID=='psuss'){
        Session::set('catID',$catID);
        Session::set('catName',"Nguồn Seasonic");
      }
      elseif(isset($catID) && $catID=='psuas'){
        Session::set('catID',$catID);
        Session::set('catName',"Nguồn Asus");
      }
      elseif(isset($catID) && $catID=='hddwd'){
        Session::set('catID',$catID);
        Session::set('catName',"HDD Western Digital");
      }
      elseif(isset($catID) && $catID=='hddsg'){
        Session::set('catID',$catID);
        Session::set('catName',"HDD Seagate");
      }
      else
      {
        Session::set('catID',$catID);
        $catName=$cat->getCatbyID($catID);
        $result=$catName->fetch_assoc();
        Session::set('catName',$result['catName']);
      }
      Session::set('tk',0);
    }
    // $abc="";
 ?>
 <?php 
      if (isset($_GET['key'])) {
        $key=$_GET['key'];
        Session::set('catID',$key);
        Session::set('catName',"Tìm kiếm : ".$key);
        Session::set('tk',1);
      }
 ?>
 <style type="text/css">
   .footer{
    margin-top: 40px;
  }
  .mh{
    right: 20px !important;
    font-size: 15px;

  }
  .ct-cart{
    font-size: 14px;
  }
  .choose{
    width: 220px !important;
  }
 </style>

 <!-- <script type="text/javascript">
   alert(Session::get('catID') );
 </script> -->
 <?php
    if(isset($_POST['sort'])){
        $choice=$_POST['sort'];
    }
    else
      $choice='1';
 ?>

	<div class="category" style="font-size: 32px;color:#2A2929;margin-left: 47px;padding-bottom: 10px;">
        <?php echo Session::get('catName'); ?>
  </div>
	<div class="address" style="width: 1270px;margin-left: 44px;">
    <?php
      // if($catName!=""){
      //  $category=$catName->fetch_assoc();
      //  Session::set('cat_name',$category['catName']);
      // }

    ?>
		Bạn đang ở :&#160<a href="index.php">Home</a>&#160<i class="fa fa-caret-right"></i>&#160
    <?php
      echo Session::get('catName');
    ?>
   <?php
   if(Session::get('tk')==0){
   ?>
    <div class="sx sx1" style=" left: 820px;">
      <form action="pdSearch.php" method="post">
          <label for="select-choice">Thương hiệu :</label>
          <select name="sort" class="filter1">
            <option value="0" class="option">Tất cả</option>
            <?php
              $brand1=$product->brand_filter(Session::get('catID'));
              if($brand1!=null)
                while($result=$brand1->fetch_assoc()){
                  $brName=$brand->getBrandbyID($result['brandID'])->fetch_assoc();
                  $br=$brName['brandName'];
            ?>
               <option value="<?php echo $result['brandID'] ?>" ><?php echo $br ?></option>
            <?php
                }
             ?>
          </select>
      </form>
  </div>
     <div class="sx sx2" style="right: 80px;">
      <form action="pdSearch.php" method="post">
          <label for="select-choice">Sắp xếp theo :</label>
          <select name="sort"  class="filter2">
            <option value="1" ><a href="">Sản phẩm nổi bật</a></option>
            <option value="2" ><a href="">Giá:Tăng dần</a></option>
            <option value="3" >Giá:Giảm dần</option>
            <option value="4" >Tên:A-Z</option>
            <option value="5" >Tên:Z-A</option>
          </select>
      </form>
  </div>
<?php 
}
?>
  </div>
  </div>
  <div class="list-product">
       

</div>
<script type="text/javascript">
  $(document).ready(function() {
    var brand="";
    var choice="";
  filt(brand,choice);
  $('.filter1').change(function(){
     brand=$(this).val();
      filt(brand,choice);
    });
   $('.filter2').change(function(){
      choice=$(this).val();
      filt(brand,choice);
    });
  
  function filt(brand){
 
    var catID='<?php echo Session::get('catID')?>';
    var page=1;
    <?php 
      if(!isset($_GET['page']))  
         $cur_page=1;
        else
         $cur_page=$_GET['page'];     
    ?>
    var page=<?php echo $cur_page; ?>;

   $.ajax({
    url:"filt.php",
    method:'post',
    data:{catID:catID ,brand:brand ,choice:choice, page:page },
    dataType:"JSON",
    success: function(data){
            $('.list-product').html(data.item);
            $('.page').html(data.page);
            // alert(data.page+" So san pham :"+data.sl+" So trang "+data.sotr);
            // alert(data.query);
          }
   })

 }
 
   
})

</script>

<div class="page len">
 
</div>

<style type="text/css">
  
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
    top: 242px;
    color: #4b4f56;
    right: 40px;
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
  .cart:hover{
  box-shadow: 0px 1px 7px #E9CB04;
}

.pd-name{
  width: 220px;
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
  .cart{
    margin-top: 25px;
    /*width: 230px;*/
    margin-right: 25px;
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
    margin-top: 20px;
    padding-left: 50px;
  }
  .nfpd{
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    font-size: 18px;
    font-weight: 500;
    padding-top: 10px;
  }
  .content-container2{
  margin-top: 175px;
  width: 100%;
  /*height: 200px;*/
}
.mnh-container{
  width: 1360px !important;
}
  .sx1{
    right: 290px;
  }
  .sx1 select{
  width: 100px;
}
</style>
<div class="footer">
 <?php
  include 'include/footer.php';
?>
</div>
