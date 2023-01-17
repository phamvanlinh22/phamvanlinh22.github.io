<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php
include '../classes/order.php';
include '../classes/product.php';
include '../classes/brand.php';
include '../classes/category.php';
include '../classes/sale.php';
?>
<?php
  $brand=new brand();
  $cat=new category();
  $order=new order();
  $product=new product();
  $sale=new sale();
?>
<?php
  if(isset($_POST['kmDM'])){
    $resultKM=$sale->kmDM($_POST);
  }
  if(isset($_POST['kmSP'])){
    $resultKM=$sale->kmSP($_POST);
  }
  if(isset($_POST['kmTH'])){
    $resultKM=$sale->kmTH($_POST);
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

  <title>HDA Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script type="text/javascript" src="../jquery/jquery-3.5.0.min.js"></script>
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
        <!-- <i class="fas fa-user-shield d"></i>  -->
        <style type="text/css">
          .d{
            font-size: 32px;
            margin-bottom: 5px;
            margin-left: 5px;
            /*color: black;*/
          }
        </style>
         <img class="d1" src="../icon/weapons.png" width="50px">
      <div class="sidebar-brand-text mx-3"> HDA Admin </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tổng quan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
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
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

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
        <div class="container-fluid" style="padding-left: 100px;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin-left: 110px; font-size: 35px;font-weight: bold;">Tạo khuyến mãi</h1>
            
            
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            <!-- <a href="">Tạo khuyến mãi</a> -->
          </div>

          <form action="" method="post" style="margin-top: -10px;">
            <div>
              <label style="color: #232323;margin-right:20px;font-size: 17px;">Tên khuyễn mãi :</label>
              <input type="text" name="tenkm" style="padding-left:10px;width: 270px;border:1px solid #232222;border-radius: 5px;">
            </div>

            <div>
              <label  style="color: #232323;margin-right:20px; font-size: 17px;margin-top: 10px;">Loại khuyến mãi :</label>
              <select id="loaiKM" onchange="luachon()">
                <option value="1">Theo danh mục</option>
                <option value="2">Theo thương hiệu</option>
                <option value="3">Danh mục và thương hiệu</option>
                <option value="4">Theo sản phẩm</option>
              </select>
            </div>

            <div class="chonDM">
              <label style="color: #232323;margin-right:20px; font-size: 17px;margin-top: 10px;">Chọn danh mục :</label>
              <select name="danhmuc">
                <?php 
                    $listCat=$cat->showCat();
                    while ($row=$listCat->fetch_assoc()) {
                      
                ?>
                  <option value="<?php echo $row['catID']; ?>"><?php echo $row['catName']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="chonTH">
              <label style="color: #232323;margin-right:20px; font-size: 17px;margin-top: 10px;">Chọn thương hiệu :</label>
              <select name="thuonghieu">
                <?php 
                    $listBrand=$brand->show_brand();
                    while ($row=$listBrand->fetch_assoc()) {
                      
                ?>
                  <option value="<?php echo $row['brandID']; ?>"><?php echo $row['brandName']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          
          <div class="chonSP" style="margin-top: 10px;">
              <label style="color: #232323;margin-right:20px;font-size: 17px;">Chọn sản phẩm :</label>
              <input type="text" name="" id="tim" oninput="timSP()" placeholder="Tìm...." style="width: 270px;border:1px solid #232222;border-radius: 5px;padding-left: 10px;">
              <div style="padding: 10px; width: 600px; max-height: 320px; overflow:auto;" class="listPD">
                
              </div>
              <div class="spdc" style="width: 300px;margin-top: -490px;float: right;border: 1px solid;
              background-color: #6B6969;border-radius:5px; text-align: center;color: white;font-weight: bold;">
              <div style="margin:3px;">Sản phẩm đã chọn</div>
              <div class="listPDSale" style=" border: 1px solid grey;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;padding: 10px;color:#5B5959;background-color: white;text-align: left;"></div>
              </div>

          </div>

          <div class="ptkm">
              <label style="color: #232323;margin-right:20px;font-size: 17px;">Phần trăm khuyến mãi :</label>
              <input type="number" min="0" name="ptkm" style="width: 200px;border:1px solid #232222;border-radius: 5px;margin-top: 20px;">
            </div>

            <div>
              <label style="color: #232323;margin-right:20px;font-size: 17px;">Ngày kết thúc :</label>
              <input type="date" name="ngaykt" style="width: 200px;border:1px solid #232222;border-radius: 5px;margin-top: 10px;margin-left: 20px;">
            </div>

            <div>
              <input type="submit" name="taoKM" class="taokm" onclick="taokm()" value="Xác nhận" style="margin-top: 30px;margin-left: 150px;background-color: blue;border: 1px solid blue;border-radius: 5px;color: white;padding: 7px;padding-left: 40px;padding-right: 40px;font-weight: bold;">
            </div>

            <div style="visibility: hidden;">
              <label style="color: #232323;margin-right:20px;font-size: 17px;">Sản phẩm:</label>
              <input class="sp" type="text" name="sanpham" style="width: 200px;border:1px solid #232222;border-radius: 5px;margin-top: 20px;">
            </div>
            <?php
              if (isset($resultKM)) {
                  echo $resultKM;
              }
            ?>

          </form>
            <style type="text/css">
                .tc{
                  margin-left: 150px;
                  color: green;
                }
                .tb{
                  margin-left: 150px;
                  color: red;
                }
            </style>

                 </div>
        <!-- /.container-fluid -->
      <script type="text/javascript">
         var key="";
         var sanpham=[];
         var sanpham2=[];

        function timSP() {
         key=$('#tim').val();
        $.ajax({
          url:"tim2.php",
          method: "post",
          data:{ name: key},
          dataType:"text",
          success: function(data){
            $('.listPD').html(data);
          }
        });
         }
          timSP();

        function chonSP(cb){
          if(cb.checked == true){
            sanpham.push(cb.value+"<br>");
            sanpham2.push(cb.value+"-");
          }
          else{
            var pos = sanpham.indexOf(cb.value);
            sanpham.splice(pos, 1);

            var pos = sanpham2.indexOf(cb.value);
            sanpham2.splice(pos, 1);
          }

          $('.listPDSale').html(sanpham);
          var kq="";
          for(i=0;i<sanpham2.length;i++){
              kq=kq+sanpham2[i];
          }
          $('.sp').val(kq);
          // alert($('.sp').val());


          // if(sanpham.length>=1)
          //   $('.container-fluid').css("padding-left","50px;")

        }

        var choice="1";  
        function luachon(){
        choice=$('#loaiKM').val();
        kiemtra();

        }
        function kiemtra(){
          switch (choice){
            case "1" : $('.chonTH').css('visibility','hidden');
                       $('.chonDM').css('visibility','visible');
                       $('.chonSP').css('visibility','hidden');
                       $('.spdc').css('visibility','hidden');
                       $('.ptkm').css('margin-top',"-420px");
                       $(".taokm").attr("name","kmDM");
                       $('.container-fluid').css('padding-left','300px');
                       // var kt=$(".taokm").attr("name");
                       // alert(kt); 
                       break;

            case "2" : $('.chonTH').css('visibility','visible');
                       $('.chonDM').css('visibility','hidden');
                       $('.chonSP').css('visibility','hidden');
                       $('.spdc').css('visibility','hidden');
                       $('.chonTH').css('margin-top',"-45px");
                       $('.ptkm').css('margin-top',"-380px");
                       $('.container-fluid').css('padding-left','300px');
                       $(".taokm").attr("name","kmTH");
                       // var kt=$(".taokm").attr("name");
                       // alert(kt); 
                       break;

            case "3" : $('.chonTH').css('visibility','visible');
                       $('.chonDM').css('visibility','visible');
                       $('.chonSP').css('visibility','hidden');
                       $('.chonTH').css('margin-top',"0px");
                       $('.spdc').css('visibility','hidden');
                       $('.ptkm').css('margin-top',"-380px");
                       $('.container-fluid').css('padding-left','300px');
                       $(".taokm").attr("name","kmDMTH");
                       // var kt=$(".taokm").attr("name");
                       // alert(kt);
                        break;

            case "4": $('.chonTH').css('visibility','hidden');
                       $('.chonDM').css('visibility','hidden');
                       $('.spdc').css('visibility','visible');
                       $('.chonSP').css('visibility','visible');
                       $('.chonSP').css('margin-top','-75px');
                       $('.ptkm').css('margin-top',"20px");
                       $('.container-fluid').css('padding-left','100px');
                       $(".taokm").attr("name","kmSP");
                       
                       // var kt=$(".taokm").attr("name");
                       // alert(kt); 
                       break;

          }
        }

        kiemtra();

        function taokm(){

        }

      </script>

      </div>
      <!-- End of Main Content -->
      <style type="text/css">
        ::placeholder{
          /*padding-left: 10px;*/
          font-size: 15px;
        }

          /*input.largerCheckbox{
          -webkit-appearance:none;
          width:30px;
          height:30px;
          /*background:white;*/
        /*  border-radius:5px;
          border:2px solid #555;
        }*/
      </style>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <!-- <span>Copyright &copy; Your Website 2019</span> -->
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- Biểu đồ doanh thu -->
  
</body>

</html>
