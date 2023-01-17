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
<?php
     if(isset($_GET['odID'])){
        $od=$_GET['odID']; 
        }
    if( isset($_POST['submit'])){
        $submit=$order->confirmOd($od);
    }
    if( isset($_POST['cancel'])){
        $cancel=$order->deleteOd2($od);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HDA Admin - Thông tin đơn hàng</title>
   <!-- add Tinymce -->
  
<!--     <link rel="stylesheet" href="./bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link href="./summernote/summernote-bs4.css" rel="stylesheet"> -->
    <!-- <script type="text/javascript" src="./js2/table/table.js"></script> -->

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" type="text/css" href="progress_step.css">
  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="CodeSeven-toastr-50092cc/build/toastr.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"  style="height: 1550px;background-color:#224abe !important " id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <img class="d1" src="../icon/weapons.png" width="50px"> </i>
        <div class="sidebar-brand-text mx-3"> HDA Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tổng quan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Sản phẩm
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="./listdm.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Hàng hóa</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="listorder.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Đơn hàng</span></a>
      </li>



      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="khuyenmai.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Khuyến mãi</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php
                  $oduc=$order->showUnconfimred();
                  if($oduc!=NULL){
                    $sl=mysqli_num_rows($oduc);
                    }
                    else
                      $sl="";
                ?>
                <?php if($sl!="") {?>
                <span class="badge badge-danger badge-counter"><?php echo $sl ?></span>
                <?php
                 }
                 ?>

              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Thông báo
                </h6>

                <?php
                $i=0;
                if($sl!=""){
                  while ($result=$oduc->fetch_assoc()){
                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                  
                ?>
                <a class="dropdown-item d-flex align-items-center" href="orderinfo.php?odID=<?php echo $result['odID'] ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary order_color<?php echo $i?>">
                      <style type="text/css">
                        .order_color<?php echo $i?>{
                          background-color: <?php echo $color ?> !important;
                        }
                      </style>
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">
                      <?php echo $result['dateorder']; ?>
                    </div>
                    <span class="font-weight-bold">
                      <?php echo $result['ctName']." đã đặt hàng";  ?>
                    </span>
                  </div>
                </a>
              <?php
                  $i++;}
                }
              ?>
               
                <a class="dropdown-item text-center small text-gray-500" href="">Show All Alerts</a>
              </div>
            </li>

         

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small abc">
                   <?php echo Session::get('adminName');?></span>
                 <style type="text/css">
                   .abc{
                    font-size: 15px;
                    text-transform: capitalize;
                   }
                 </style>
                </span>
                <img class="img-profile rounded-circle" src="../icon/avarta.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
     
<?php

  
    // $od=98876591;
    $info=$order->showOrder($od);
    if($info!=NULL)
    $result1=$info->fetch_assoc();
?>
  <div class="container">
  <div class="info_cart">
    <div class="hdapc"><a href="index.php">Thông tin đơn hàng</a></div>

        <div class="user">
          <!-- <div class="icon"><i class="far fa-check-circle"></i></div> -->
          <!-- <div class="ttgh">Đặt hàng thành công</div> -->
          <span>Mã đơn hàng : <?php echo $od;?></span><br>
          <!-- <div class="tks">Cám ơn bạn đã mua hàng !</div> -->
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

    <!-- <div class="ttmh"><a href="index.php">Tiếp tục mua hàng</a></div> -->
<!--     <div class="sp"><i class="fas fa-question-circle"></i>
            Cần hỗ trợ ?<span> Gọi ngay: 17004062</span></div>
  </div> -->
  <script type="text/javascript">
    function print(url) {
    var printWindow = window.open( url);
    printWindow.print();
    

};
  </script>

  <iframe src="printHD.php?odID=<?php echo $od;?>&ship=<?php echo $result1["shipfee"];?>" name="frame" style="display: none;"></iframe>

<!-- <input type="button"  value="printletter"> -->
  <div class="printt">
    <a class="print2 inhd" onclick="frames['frame'].print()"> <i class="fas fa-print"></i> In hóa đơn</a>
    <?php
      $dcc=$result1['mavd'];
        $dcvd=explode('-',$dcc);
      if(sizeof($dcvd)==1){
        echo '<a class="print2 invd" href="invandon.php?od='.$dcc.'"><i class="fas fa-print"></i> In vận đơn</a></div>';

        $dcvd2=explode('.',$dcc);
        echo '<div style="margin-top:20px;font-weight:bold;"><a class="" href="https://i.ghtk.vn/'.$dcvd2[3].'"><i class="fas fa-shipping-fast"></i> Xem hành trình đơn hàng </a></div>';
        // echo '  <script type="text/javascript">
        //         console.log('.$dcvd2[3].');
        //       </script>';
      }
    ?>
  
  <style type="text/css">
    .printt{
      margin-top: 30px;
      display: flex;
      flex-direction: row;
    }
    .print2{
      margin-right: 30px;
      padding: 7px;
      padding-left: 15px;
      padding-right: 15px;
      cursor: pointer;
      color: white !important;
      font-weight: 600;
      border-radius: 5px;
      background-color: #4bac4d;
    }
    .print2>i{
      color: white !important;
    }
    .inhd:hover{
      text-decoration: none;
      background-color: #258827;
    }
    .invd:hover{
      text-decoration: none;
      background-color: #359DB3 !important;
    }
    .invd{
      background-color:#0CBCE2 !important
    }
  </style>

  <div class="list_cart">
    <?php
        $item=$order->showOdInfo($od);
        if($item!=NULL)
        {
          while ($result=$item->fetch_assoc()) {
            
       
    ?>
    <div class="item_cart">
      <img src="uploads/<?php echo $result['pdImage']?>" width="70">
      <div class="sl_item"><?php echo $result['sol']?></div>
      <div class="item_name"><?php echo $result['pdName']?></div>
      <div class="item_price"><?php echo $product->formatMoney($result['price'])?><u>đ</u></div>
    </div>
   <?php
      }
      echo '<hr id="hr">';
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
    <div class="tamtinh"><?php echo $product->formatMoney($result1['shipfee']);  ?> <u>đ</u></div>
    <hr class="vvvv">
    <div class="tongtien" style="color: #363535;">Tổng tiền :</div>
    <div class="tamtinh total" style="color: blue;"><?php echo $product->formatMoney(intval($result1['price'])+intval($result1['shipfee']));?><u>đ</u></div>
    <?php
      if($result1['status']=='Chờ xác nhận' || $result1['status']=='Đã chuyển khoản'){
    ?>
    <form action="#" method="post">
      <input type="submit" value="&#10060 Hủy đơn hàng" name="cancel" class="sub-btn" />
      <input type="submit" value="&#128668 Xác nhận đơn hàng" name="submit" class="xacnhan"/>
  </form>
  <?php
  }
  ?>
  <?php 
    if($result1['status']!='Chờ xác nhận' && $result1['status']!='Đã chuyển khoản'){
  ?>
  <div class="fullwidth" style="margin-left: -50px;">
      <div class="container separator">
        <h4 style="margin-left: 20px;margin-top: 100px; color: #363535;">Tình trạng đơn hàng :</h3>
        <!-- 10004 --10008  -->
        <ul class="progress-tracker progress-tracker--center" style="width: 500px; margin-top: 30px;">
          <li class="progress-step is-complete" >
            <div class="progress-text">
              <img src="slider/cart121.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#9898" ></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif; font-size: 18px;margin-top: 7px; font-weight: 500;'>Đặt hàng</h4>
              </div>
          </li>

          <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="slider/xacnhan3.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#10004" style="color:white;"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Xác nhận</h4>
              </div>
          </li>
          
          <?php
            if($result1['status']=="Đang vận chuyển" )
              echo '<li class="progress-step is-active">';
            else
              echo '<li class="progress-step is-complete">';
          ?>
          
            <div class="progress-text" >
              <img src="slider/ship.png" width="35">
            </div>
            <?php 
              if($result1['status']=="Đang vận chuyển")
                echo '<div class="progress-marker" data-text="&#127744" ></div>';
              else
                echo '<div class="progress-marker" data-text="&#10004" ></div>';
            ?>
            
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Đang vận chuyển</h4>
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
              <img src="slider/nhanhang2.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#10004"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Đã thanh toán</h4>
              </div>
          </li>
          <?php
              }else{
          ?>
           <li class="progress-step is-complete">
            <div class="progress-text">
              <img src="slider/cancel2.png" width="35">
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
              <img src="slider/finish3.png" width="35">
            </div>
            <div class="progress-marker" data-text="&#11088"></div>
            <div class="progress-text">
                <h4 class="progress-title" style='font-family: "Segoe UI", Helvetica, Arial, sans-serif;font-size: 18px;margin-top: 7px; font-weight: 500;'>Hoàn tất</h4>
              </div>
          </li>
          <?php 
            }elseif($result1['status']=="Đang vận chuyển"){
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
              <img src="slider/delete2.png" width="35">
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
    <?php
      }
    ?>

  </div>
  
  
 <style type="text/css">
  body{
    margin:0px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    /*padding-left: 100px;*/
        /*padding-top: 50px;*/
  }
  .successod{
    margin-top: 70px;
    /* margin-left: 100px; */
    text-align: right;
    font-size: 25px;
    color: green;
    margin-bottom: 50px;
  }
  .shipping{
    margin-top: 70px;
    /* margin-left: 100px; */
    text-align: right;
    font-size: 25px;
    color: #0B6FCC;
    margin-bottom: 50px;
  }
  .hd2{
    font-size: 20px;
    margin-bottom: 5px;
    font-weight: 500;
    color: #4e4d4b;
  }
  .sub-btn{
    border: 1px solid grey;
    border-radius: 3px;
    font-size: 17px;
    height: 40px;
    margin-right: 5px;
    /*color: white;*/
    /*background: #274fc2;*/
    /*border-color: #274fc2;*/
  }
  .xacnhan{
    border: 1px solid grey;
    border-radius: 3px;
    font-size: 17px;
    height: 40px;
    color: white;
    background: #274fc2;
    border-color: #274fc2;
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
    margin-bottom: 50px;
    margin-top:70px;
    margin-left: 50px;
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
    /*height: 580px;*/
    /*border-right: 1px solid grey;*/
    box-shadow: 1px 0px #D3D1D1;
    /*padding-left: 130px;*/
    padding-top: 30px;
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

  #hr{
    border: none;
    background-color:#BBB9B9;
    height: 1px; 
  }
  .list_cart{
        position: absolute;
        padding-top: 40px;

    width: 450px;
    /*border: 1px solid grey;*/
    top: 100px;
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
        <style type="text/css">
       
            .del{
              color:green;
            }
            .tb{
              color:red;
            }
            .dsdm{
              margin-top: 30px;
            }
            .tb-dm{
/*              border-radius: 5px;
              border-collapse: collapse;*/
              border: 1px solid grey;
              width: 100%;
            }
            .ac2{
              padding-left: 5px;

            }
            .id{
              width: 40px;
            }
            .td{
              background-color: grey;
              color: white;
              text-align: center;
              font-size: 14px;
              line-height: 33px;
            }
            .dm{
              width: 130px;
            }
            .th{
              width: 110px;
            }
            .sl{
              width: 40px;
            }
            .img{
              width: 120px;
            }
            .g{
              width: 130px;
            }
            .ac{
              width: 100%;
            }
            .km{
              width: 80px;
            }
            .db{
              width: 70px;
            }
            .tsp{
              width:100px;
            }
            .td2{
              /*line-height: 30px;*/
              color:black;
              background-color: white;
              text-align: center;
              font-size: 14px;
              border-bottom: 2px solid #C2C2C2;
              /*border-left:2px solid #C2C2C2;*/
            }
            .t2{
              border-right: 1px solid #C2C2C2;
              /*font-size: 14px;*/
            }
            .progress-marker::after{
              margin-left: 60px;
            }
            .t3{
              text-align: left;
              padding-left: 10px;
              border-left:1px solid grey;            
            }
            .t4{
              text-align: center;
              /*padding-left: 250px;   */
            }
        </style>
<!--         <h2>Thêm sản phẩm</h2> -->
        
        <style type="text/css">
          .tc{
            color: green;
            position: relative;
            top:-10px;
          }
          .tb{
            color: red;
            position: relative;
            top:-10px;
          }
        .container-fluid{
          height: 550px !important;
        }
      </style>
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <?php
              if(isset($_GET['action']) && $_GET['action']=='logout')
              {
                Session::destroy();
              }
          ?>
          
          <a class="btn btn-primary" href="?action=logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->

    <script type="text/javascript" src="../jquery/jquery-3.5.0.min.js"></script>
         <script src="CodeSeven-toastr-50092cc/build/toastr.min.js"></script>
     <script type="text/javascript">
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
     </script>
     <script type="text/javascript">
      <?php 
      if($submit==1)
        header("Location:listorder.php");
      elseif($submit==0){
        echo 'toastr["error"]("Đơn hàng không hợp lệ, không thể tạo vận đơn","Error !",); ';
      }
      else
        echo 'toastr["error"]('.$submit.',"Error !",); ';


      ?>
      </script>

</body>

</html>
