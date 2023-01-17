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
    if(isset($_GET['delid'])){
        $id=$_GET['delid'];
    $del=$order->endOD($id); 
  }
?>
<?php
    if(isset($_GET['endOD'])){
        $id=$_GET['endOD'];
    $del=$order->deleteOd2($id); 
  }
?>
<?php
    if(isset($_GET['xnid'])){
        $xnid=$_GET['xnid'];
    $xndh=$order->finishOd($xnid); 
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

  <title>Admin - Quản lý danh mục</title>
   <!-- add Tinymce -->
  
<!--     <link rel="stylesheet" href="./bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link href="./summernote/summernote-bs4.css" rel="stylesheet"> -->
    <!-- <script type="text/javascript" src="./js2/table/table.js"></script> -->

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
      <div class="sidebar-heading ahhh">
        Menu
      </div>
      <style type="text/css">
        .ahhh{
          font-weight: normal;
        }
      </style>


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

      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
   <!--    <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
    <!--   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Đối tác</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="addProduct.php">Khách hàng</a>
            <a class="collapse-item" href="listProduct.php">Nhà cung cấp</a>
            <a class="collapse-item" href="listProduct.php">Đối tác giao hàng</a>

        </div>
      </li> -->

      
      <!-- Nav Item - Charts -->
   <!--    <li class="nav-item">
        <a class="nav-link" href="listorder.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Nhân viên</span></a>
      </li> -->

      

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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="key">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="tim">
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
                <span class="badge badge-danger badge-counter od-notice"><?php echo $sl ?></span>
                <?php
                 }
                 ?>

              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in thongbaodh" aria-labelledby="alertsDropdown">
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

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
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
          <h1 class="h3 mb-4 text-gray-800">Đơn hàng từ website</h1>
          <?php
            if(isset($del_product))
                echo $del_product;
              else
                $del_product=NULL;
              ?>
          <table class="tb-dm" border="1">
            <tr>
              <td class="td id">STT</td>
              <td class="td tsp">Mã đơn hàng</td>
              <td class="td dm">Tên khách hàng</td>
              <td class="td th">Số điện thoại</td>
              <td class="td img">Địa chỉ</td>
              <td class="td sl">Gmail</td>
              <td class="td km">Ngày đặt</td>
              <td class="td db">Tổng tiền</td>
              <td class="td g">Tình trạng</td>
              <td class="td ac">Action</td>
            </tr>
            <?php
                if(!isset($_GET['page']))
                  $page=1;
            else
                $page=$_GET['page'];

                 
                if(isset($_POST['tim']))
                {
                 $key=$_POST['key'];
                 
                  $pd_show=$order->timkiem($key);
                  if($pd_show==NULL)
                   echo '<tr><td colspan="10" style="text-align:center; background-color:#FCFBE9;font-weight:600;height:40px;">Không có đơn hàng này</td></tr>';
                }
                else{
                $pd_show=$order->showAllOrder2();
                }
                $i=($page-1)*10;
                  if($pd_show!=NULL){
                    while ($result=$pd_show->fetch_assoc()) {
                      $i++;
              
            ?>     
            <tr>
              <td class="td2 t3"><?php echo $i ?></td>
              <td class="td2 t4">
                 <a href="orderinfo.php?odID=<?php echo $result['odID'] ?>">
                  <?php echo $result['odID'] ?></a>
               </td>
              <td class="td2"> <?php echo $result['ctName']   ?></td>
              <td class="td2"> <?php echo $result['phone']   ?></td>
              <td class="td2"><?php  echo $result['address'] ?></td>
              <td class="td2"> <?php echo $result['gmail'] ?></td>
              <td class="td2"> <?php echo $result['dateorder'] ?></td>
              <td class="td2"> <?php echo $product->formatMoney($result['price']) ?>
                <u>đ</u>
              </td>
              <?php
                if($result['status']!="Đang vận chuyển"){
              ?>
              <td class="td2 "<?php if($result['status']=="Chờ xác nhận" ){
                echo 'style="color:blue;font-weight:bold;"';
              } 
              elseif ($result['status']=="Đã chuyển khoản") {
                echo 'style="color:#5C038F;font-weight:bold;"';
              }
              elseif ($result['status']=="Đã thanh toán") {
                echo 'style="color:#1E9629;font-weight:bold;"';
              }
              elseif ($result['status']=="Không nhận hàng") {
                echo 'style="color:#DD080D;font-weight:bold;"';
              }?> > <?php echo $result['status'] ?></td>
              <td class="td2 ac2">
                <span id="xoa">
                    <a class="lta" href="?endOD=<?php echo $result['odID']?>" onclick="return confirm('Xóa đơn này ?')"><b><i class="fas fa-trash" ></i></b></a>
                  </span>
            
                <?php
                  }
                  else{
                ?>
                <td class="td2 " style="color:#08B2DC;font-weight:bold;"> <?php echo $result['status'] ?></td>
              <td class="td2 ac2">
            
                  <span id="sua">
                    <a href="?xnid=<?php echo $result['odID']?>"><b> <i class="fas fa-check" style="color:inherit;"></i></b></a>
                  </span> &#160|| &#160
                  <span id="xoa">
                    <a  href="?delid=<?php echo $result['odID']?>" onclick="return confirm('Ngừng vận chuyển đơn này ?')"><b><i class="fas fa-times" style="color: red"></i></b></a>
                  </span>
                <?php
                  }
                ?>

              </td>
            </tr>
            <?php
                  }
                  
                }
              ?>

        </table>

        <div class="page">
        <?php
    
    if(isset($_POST['tim'])){
      $key=$_POST['key'];
      $pd_count=NULL;
      $rs=$order->countTimkiem($key);
      if($rs!=NULL){
      $pd_count=mysqli_num_rows($rs);
      }
    }
    else{
      $rs=$order->showAllOrder();
      $pd_count=mysqli_num_rows($rs);
    }
    

    if($pd_count!=NULL){
    $bt_amount=ceil($pd_count/10);

      $page_lenght=($bt_amount+2)*37;
      $k=1;
      if($bt_amount>1){
      if($page>1)
          echo '<div class="page-btn"><a href="?page='.($page-1).'"><i class="fas fa-angle-left"></i></a></div> ';
       for($k=1;$k<=$bt_amount;$k++)
            {
            if($page!=$k)
            echo '<div class="page-btn"><a href="?page='.$k.'">'.$k.'</a></div> ';
            else
              echo '<div class="page-btn not-active"><a href="?page='.$k.'">'.$k.'</a></div> ';
            }
      if($page<$bt_amount)
            echo '<div class="page-btn"><a href="?page='.($page+1).'"><i class="fas fa-angle-right"></i></a></div> ';
           
    }
    
  }
    ?>
    </div>

        <style type="text/css">
            .page{
              display: flex;
              width: <?php echo $page_lenght."px"?>;
              margin: 10px auto;
              padding-left: 20px;
            /* text-align: right; */
            /*float: right;*/
            /*margin-top: 10px;*/
            }
            .lta:hover{
              color: red !important;
            }
            .page-btn{
              width: 30px;
              height: 30px;
              border: 1px solid #797676;
              line-height: 29px;
              text-align: center;
              margin-right: 4px;
            }
            .not-active {
            /*background-color:#F9F471;*/
            background-color: #08EDD5;
            pointer-events: none;
            cursor: default;
            text-decoration: none;
            color: black;
          }
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
              width: 110px;
            }
            .ac{
              width: 80px;
            }
            .km{
              width: 90px;
            }
            .db{
              width: 110px;
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
          .sd-order{
            /*border:1px solid gray;*/
            /*border-radius: 5px;*/
            background: #E0E0E0;
            padding: 15px 15px 15px 15px;
            margin-bottom: 50px;
            color: #2C2C2C;
            /*position: relative;*/
          }
          .stt-order{
            font-size:16px;
            background: #3c62d2;
            padding:5px 5px 5px 15px;
            color: white;
            font-weight: bold;

          }
          .order-item{
            background: white;
            margin-bottom: 15px;
          }
          .order-item span{
            font-weight: 600;
          }
          .sdorder-info{
            display: flex;
          }
          .sdorder-info>div{
            padding: 10px;
            width: 25%;
          }
          .madhsd{
            width: 20% !important;
          }
          .madhsd a{
            font-weight: bold;
          }
          .madhsd2{
            width: 30% !important;
          }
          .sdod-title{
            text-align: center;
            font-weight: 600;
          }
          .bt-huysd{
            margin-right: 20px;
            border:none;
            padding: 5px 30px 5px 30px;
            border-radius: 5px;
            font-variant: 20px;
            font-weight: bold;
            background: #e7e8ea; 
          }
          .bt-xnsd{
            border:none;
            padding: 5px 40px 5px 40px;
            border-radius: 5px;
            font-variant: 20px;
            color: white;
            font-weight: bold;
            background: #db3230
          }
          
        </div>
      </style>
        <!-- /.container-fluid -->
        <h1 class="h3 mb-4 text-gray-800">Đơn hàng từ Sendo</h1>
        <div class="sd-order">          

        </div>
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
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->

    <script type="text/javascript" src="../jquery/jquery-3.5.0.min.js"></script>


     <script type="text/javascript">
      getOrderSendo();
      function getOrderSendo(){
        $.ajax({
                        url:"SDorder.php",
                        method:'post',
                        data:{ getSDorder:1},
                        dataType:"JSON",
                        success: function(data){
                          if(data.result){
                            // alert(data.result);
                            $('.sd-order').html(data.result);
                            // console.log(data.result);
                          }
                      }
          })
      }


      function confirmSDOD(odid,choice){
        $.ajax({
                        url:"SDorder.php",
                        method:'post',
                        data:{ OdsdID:odid ,choice:choice},
                        dataType:"JSON",
                        success: function(data){
                          if(data.result){
                            // alert(data.result+'----'+data.result2);
                            // alert(data.result);
                            getOrderSendo();
                            // $('.sd-order').html(data.result);
                            // console.log(data.result);
                          }
                      }
          })
      }

  var x = document.getElementById("noticee");
  var audio = new Audio('pristine-609.mp3');
                  function notice_order(){
                    setInterval(function(){
                      sl1=parseInt(<?php echo $sl; ?>);
                      
                      sl2=0;
                      $.ajax({
                      url:"order_notice.php",
                      method:'post',
                      data:{ count_od:0},
                      dataType:"JSON",
                      success: function(data){
                            $(".od-notice").html(data.sl);
                            sl2=parseInt(data.sl);
                            $(".thongbaodh").html(data.res);
                              // if(sl2>sl1){
                              //   audio.play();
                              //   sl1=sl2;
                              // }
                              // else
                              //   audio.pause();
                            }
                     })

                    },1000)
                        

                  }

                  notice_order();
  </script>
</body>

</html>
