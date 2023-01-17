<?php
include '../lib/session.php';
Session::checkSession();
// session_start();
include '../classes/category.php';
include '../classes/brand.php';
include '../classes/product.php';

?>
<?php
include '../classes/order.php';
?>
<?php
  $order=new order();
?>

<?php
    $product=new product();
    $cat= new category();
    $brand= new brand();
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HDA Admin - Quản lý danh mục</title>

  <!-- Custom fonts for this template-->
  
  <!-- <link rel="stylesheet" href="https://unpkg.com/growl-alert/dist/growl-alert.css"></link> -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="./template_css/ckb.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./CodeSeven-toastr-50092cc/build/toastr.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="height: 1550px;">

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
        
            <h1 class="h3 mb-4 text-gray-800 dsdm" style="margin-top: 25px; font-size: 27px;     font-family: Arial,Helvetica,sans-serif;">Danh mục hàng hóa</h1>
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
        
        
          
            <div >
              <div>
                <i class="fas fa-search" style="position: relative;z-index: 200; margin-right: -30px;"></i>
                <input class="tk-sp" type="text" name="name" id="name" oninput="search(this)" tabindex="1" placeholder="Theo mã, tên hàng" />
                <i class="fas fa-caret-down tk-dd"style="position: relative;z-index: 200; margin-left: -37px;font-weight: bold; cursor: pointer; color: #606060 ;width: 26px;
          height: 26px;text-align: center; line-height: 25px;"></i>
              </div>
   
            </div>
          <div class="tk-choice">
            <div class="sl-count"><span class="sol-sl" style="color: #177BD0; cursor: pointer;">9 mục</span> được chọn</div>
            <div class="btn-xoasp" data-toggle="modal" data-target="#xoanhieu" >&#160&#160 Xóa
              <i class="far fa-trash-alt"></i>
            </div>
            <div class="themsp btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'"> 
              <i class="fas fa-plus"></i>&#160&#160 Thêm mới
            </div>
            <div class="excel" data-toggle="modal" data-target="#thh-excel"> 
              <i class="fas fa-file-import"></i>&#160&#160 Import
            </div>
            <div class="excel" onclick="location.href='export.php'"> 
              <i class="fas fa-file-download"></i>&#160&#160 Xuất file
              </div>
              
                
            <!-- <button class="excel" style="border-color: "  onclick="location.href='export.php'">Xuất file</button> -->
              
              <!-- </form> -->
            <!-- </div> -->
            <div class="column"> 
              <img src="../icon/two.png" style="font-weight: bold;" style="display: block;"> &#160&#160
              <i class="fas fa-caret-down"></i>
            </div>

        </div>
        
        <table class="columns-choice hidden">
              
              <tr>
                <td class="coll f1"> 
                  <input class="ckb" id="mah" type="checkbox" name="" value=1 onclick="addColumn(this)" checked="true">
                  <label for="mah">Mã hàng</label></td>
                <td class="coll f1"> 
                  <input class="ckb" id="ms" type="checkbox" name="" value=9 onclick="addColumn(this)">
                  <label for="ms">Màu sắc</label>
                </td>    
              </tr>
              <tr>
                <td class="coll"> 
                  <input class="ckb" id="ha" type="checkbox" name="" value=2 onclick="addColumn(this)" checked="=true">
                  <label for="ha">Hình ảnh</label></td>
                <td class="coll"> 
                  <input class="ckb" id="vt" type="checkbox" name="" value=10 onclick="addColumn(this)">
                  <label for="vt">Trọng lượng</label>
                </td>    
              </tr>
              <tr>
                <td class="coll">  
                  <input class="ckb" id="tenh" type="checkbox" name="" value=3 onclick="addColumn(this)" checked="true">
                  <label for="tenh">Tên hàng</label></td>
                <td class="coll"> 
                  <input class="ckb" id="ncc" type="checkbox" name="" value=11 onclick="addColumn(this)">
                  <label for="ncc">Nhà cung cấp</label>
                </td>    
              </tr>
              <tr>
                <td class="coll"> 
                  <input class="ckb" id="lh" type="checkbox" name="" value=4 onclick="addColumn(this)" checked="true">
                  <label for="lh">Loại hàng</label></td>
                <td class="coll"> 
                  <input class="ckb" id="db" type="checkbox" name="" value=12 onclick="addColumn(this)">
                  <label for="db">Đã bán</label>
                </td>    
              </tr>
              <tr>
                <td class="coll"> 
                  <input class="ckb" id="th" type="checkbox" name="" value=5 onclick="addColumn(this)">
                  <label for="th">Thương hiệu</label></td>
                <td class="coll"> 
                  <input class="ckb" id="ngn" type="checkbox" name="" value=13 onclick="addColumn(this)">
                  <label for="ngn">Ngày nhập</label>
                </td>    
              </tr>
              <tr>
                <td class="coll"> 
                  <input class="ckb" id="tk" type="checkbox" name="" value=6 onclick="addColumn(this)" checked="true">
                  <label for="tk">Tồn kho</label></td>
                <td class="coll"> 
                  <input class="ckb" id="tt" type="checkbox" name="" value=14 onclick="addColumn(this)">
                  <label for="tt">Tình trạng</label>
                </td>    
              </tr>
              <tr>
                <td class="coll"> 
                  <input class="ckb" id="gn" type="checkbox" name="" value=7 onclick="addColumn(this)" checked="false">
                  <label for="gn">Giá nhập</label></td>
                <td class="coll"> 
                  <input class="ckb" id="bh" type="checkbox" name="" value=15 onclick="addColumn(this)">
                  <label for="bh">Bảo hành</label>
                </td>    
              </tr>

              <tr>
                

                <td class="coll "> 
                  <input id="gb" class="ckb" type="checkbox" name="" value=8 onclick="addColumn(this)" checked="true">
                  <label for="gb">Giá bán</label></td>
                <td class="coll rl"> <input class="ckb" id="gc" type="checkbox" name="" value=16 onclick="addColumn(this)">
                  <label for="gc">Ghi chú</label></td>
              </tr>
            </table>
        <div style="margin-top: -10px;padding: 0px; margin-left: -7px; width: 860px;overflow: auto; ">
          
       
        <table class="dssp" style="" border="0" >
          
        </table>

        

        <style type="text/css">
          
          .pd-name{
            width: 310px; overflow: scroll; padding-left: 10px;
          }
          
        </style>

         </div>

         <div class="pagee">
      
          <div class="page_num">1</div>
          <div class="page_num">2</div>
          <div class="page_num">3</div>
          <div class="page_num">4</div>
          <div class="page_num">5</div>
    
        </div>

        <style type="text/css">
          .pagee{
            
            width: 830px;
            margin-left:-5px;
            padding-left: 330px;
            margin-top: 15px;
            display: flex;
            flex-direction:row;
          }
          .pageee{
            display: flex;
            flex-direction:row;
            /*margin: 0px auto;*/
          }
          .page_num{
              border:1px solid gray;
              width: 30px;
              text-align: center;
              line-height: 27px;
              cursor: pointer;
              margin-right: 5px;
              color: #075DDE;
              height: 27px;
          }
          .page_num>a{
            display: block;
            text-decoration: none;
          }
          .page_num:hover{
            background-color: #76F7FF;

            /*border-color: cyan;*/
          }
          .activee{
            background-color: #0ECEDA;
            pointer-events: none;
            cursor: default;
          }
        </style>


         <div class="filterr" >
          <!-- <div class="ft-box2 ">
             <i class="fas fa-sliders-h"></i>&#160 <span>Lọc hàng hóa</span>
            </div> -->
            



           <div class="ft-box ft-lh">
                 <div style="padding-top: 9px; padding-left: 12px;"> <span class="ft-title ft-lhh">Loại hàng</span> 
                  <!-- <img src="./img/add6.png" class="kh2" width="18"> -->
                  <i class="far fa-plus-square kh2" style="margin-top: 9px;" data-toggle="modal" data-target="#exampleModal"></i>
                  <i class="fas fa-angle-down kh" stt="1" onclick="dongmo(this)" style="padding-top: 1px;padding-left: -3px; width: 26px;height: 26px; border-radius:26px; text-align: center;position: relative;left: 100px; line-height: 26px; top:1px; cursor: pointer;"></i> 
                </div>
                <div style="margin-top: 8px;" class="hhhhh">
                 <img src="./img/loupe.png" width="16" style="margin-top: -3px; margin-left: 15px;">
                 <input type="text" name="" oninput="search_cat(this)" placeholder="Tìm kiếm loại hàng" class="tk-lh" >
                 <hr class="underlinee" >
               </div>

               <div class="ctn-lh" style="height: 100px; overflow: auto; margin-top: -5px; ">
                
  
               </div>
               

           </div>

           <div class="ft-box ft-tinhtrang">
             <div style="padding-top: 9px; padding-left: 12px;"> <span class="ft-title">Tình trạng</span> 
              <i class="fas fa-angle-down kh" onclick="dongmo2()" stt="2" style="padding-top: 1px;padding-left: -3px; width: 26px;height: 26px; border-radius:26px; text-align: center;position: relative;left: 98px; line-height: 26px; top:1px; cursor: pointer;"></i> 
            </div>
            <div style="margin-top: 8px; padding-left: 30px;" class="ctn-tt">
                  <div>
                    <input type="radio" id="all" name="status" checked="true" style="margin-right: 5px;" value="all" onclick="chonTT(this)">
                    <label for="all" name="status" style="color: #383737;">Tất cả</label>
                </div>
                <div>
                    <input type="radio" id="dkd" name="status" style="margin-right: 5px; " value="Đang kinh doanh" onclick="chonTT(this)">
                    <label for="dkd" name="status" style="color: #383737;">Đang kinh doanh</label>
                </div>
                <div>
                    <input type="radio" id="nkd" name="status" style="margin-right: 5px;" value="Ngừng kinh doanh" onclick="chonTT(this)">
                    <label for="nkd" name="status" style="color: #383737;">Ngừng kinh doanh</label>
                </div>
                <div>
                    <input type="radio" id="hh" name="status" style="margin-right: 5px;" value="Hết hàng" onclick="chonTT(this)">
                    <label for="hh" name="status" style="color: #383737;">Hết hàng</label>
                </div>
                
           </div>
         </div>

           <div class="ft-box ft-sx">
             <div style="padding-top: 9px; padding-left: 12px;"> <span class="ft-title">Sắp xếp</span> 
              <i class="fas fa-angle-down kh" stt="3" onclick="dongmo3()" style="padding-top: 1px;padding-left: -3px; width: 26px;height: 26px; border-radius:26px; text-align: center;position: relative;left: 115px; line-height: 26px; top:1px; cursor: pointer;"></i> 
            </div>
            <div style="margin-top: 8px; padding-left: 30px;" class="ctn-sx">
                  <div>
                    <input type="radio" id="tc" name="sx" checked="true" style="margin-right: 5px;"value="all" onclick="chonSX(this)" >
                    <label for="tc" name="sx" style="color: #383737;">Tất cả</label>
                </div>
                <div>
                    <input type="radio" id="az" name="sx" style="margin-right: 5px;" value="order by productName asc" onclick="chonSX(this)">
                    <label for="az" name="status" style="color: #383737;">A-Z&#160 <span style="color:#8D8D8D; font-size: 14px; ">(Tên hàng)</span></label>
                </div>
                <div>
                    <input type="radio" id="za" name="sx" style="margin-right: 5px;" value="order by productName desc" onclick="chonSX(this)">
                    <label for="za" name="sx" style="color: #383737;">Z-A&#160 <span style="color:#8D8D8D; font-size: 14px; ">(Tên hàng)</span></label>
                </div>
                <div>
                    <input type="radio" id="td" name="sx" style="margin-right: 5px;" value="order by price asc" onclick="chonSX(this)" >
                    <label for="td" name="sx" style="color: #383737;">Giá tăng dần</label>
                </div>
                <div>
                    <input type="radio" id="gd" name="sx" style="margin-right: 5px;" value="order by productName desc" onclick="chonSX(this) ">
                    <label for="gd" name="sx" style="color: #383737;">Giá giảm dần</label>
                </div>
                
           </div>
         </div>


           

         

           <div class="ft-box ft-th">
             <div style="padding-top: 9px; padding-left: 12px;"> <span class="ft-title">Thương hiệu</span> 
              <!-- <img src="./img/add6.png" class="kh2" width="18"> -->
              <i class="far fa-plus-square kh2 kh5" data-toggle="modal" data-target="#exampleModal22" style="margin-top: 9px;"></i>
              <i class="fas fa-angle-down kh" stt="4" onclick="dongmo4()" style="padding-top: 1px;padding-left: -3px; width: 26px;height: 26px; border-radius:26px; text-align: center;position: relative;left: 80px; line-height: 26px; top:1px; cursor: pointer;"></i> 
            </div>
            <div style="margin-top: 8px;" class="ctn-thh">
             <img src="./img/loupe.png" width="16" style="margin-top: -3px; margin-left: 15px;">
             <input type="text" name="" oninput="search_br(this)"  placeholder="Tìm kiếm thương hiệu" class="tk-th">
             <hr class="underline2" >
           </div>
           <div class="ctn-th" style="height: 100px; overflow: auto; margin-top: -5px; ">
          
                
  
               </div>

           

           </div>

         </div>

      <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<div class="modal md-xoasp" id="xoasp" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px; !important;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #333232;font-weight: 600;">Xóa sản phẩm</h5>
        <button type="button" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Bạn thật sự muốn xóa mặt hàng này ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="xoaSP()" style="font-weight: 600;" onclick="xoaSP()"  class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="far fa-trash-alt">&#160</i> Đồng ý</button>
        <button type="button" style="margin-left: 8px; font-weight: 600;" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
      </div>
    </div>
  </div>
</div>

<div class="modal md-xoanhieu" id="xoanhieu" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px; !important;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #333232;font-weight: 600;">Xóa sản phẩm</h5>
        <button type="button" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Bạn thật sự muốn xóa mặt hàng này ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="xoanhieu()" style="font-weight: 600;" onclick="xoaSP()"  class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="far fa-trash-alt">&#160</i> Đồng ý</button>
        <button type="button" style="margin-left: 8px; font-weight: 600;" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade md-xoasp" id="xoasp" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px; !important;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header" style="border: none !important;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #333232;font-weight: 600;">Xóa sản phẩm</h5>
        <button type="button" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn thực sự muốn xóa mặt hàng này ?
      <div class="modal-footer"  style="border: none !important; margin-top: 10px;">
        
        <button type="button" onclick="xoaSP()" style="font-weight: 600;" onclick="xoaSP()"  class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="far fa-trash-alt">&#160</i> Đồng ý</button>
        <button type="button" style="margin-left: 8px; font-weight: 600;" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade md-tth" id="exampleModal22" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px; !important;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header" style="border: none !important;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #333232;font-weight: 600;">Thêm thương hiệu</h5>
        <button type="button" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width: 100%;">
          <tr>
              <td style="color: #434242;font-size: 15px;font-weight: bold;">Tên thương hiệu</td>
              <td><input type="text" class="txt-tenth" oninput="getTHH(this)"  name="" style="border: none;margin-left:23px;width: 90%;border-bottom:1px solid #C7C6C6;padding-bottom: 3px;"></td>
          </tr> 
        </table>
      </div>
      <div class="modal-footer"  style="border: none !important; margin-top: 10px;">
        
        <button type="button" style="font-weight: 600;" onclick="themThuongHieu()" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-save">&#160</i> Thêm</button>
        <button type="button" style="margin-left: 8px; font-weight: 600;" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade md-tlh" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px; !important;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header" style="border: none !important;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #333232;font-weight: 600;">Thêm loại hàng</h5>
        <button type="button" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width: 100%;">
          <tr>
              <td style="color: #434242;font-size: 15px;font-weight: bold;">Tên loại hàng</td>
              <td><input type="text" class="txt-tenlh"   name="" style="border: none;margin-left:23px;width: 90%;border-bottom:1px solid #C7C6C6;padding-bottom: 3px;"></td>
          </tr> 
        </table>
      </div>
      <div class="modal-footer"  style="border: none !important; margin-top: 10px;">
        
        <button type="button" style="font-weight: 600;" onclick="themLoaiHang()" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-save">&#160</i> Thêm</button>
        <button type="button" style="margin-left: 8px; font-weight: 600;" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade md-thhex" id="thh-excel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="thh-excel" aria-hidden="true" style="z-index: 1055 !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px; !important;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel" style="color: #333232;font-weight: 600;">Thêm hàng hóa từ file</h5>
        <button type="button" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       
          
        <table style="width: 100%; margin-top: -10px;" border="0">
          <tr>
            <td rowspan="2">
              <div class="img-bt file-btn" style="position: relative;" > 
                <!-- <span style="">+ Thêm</span> -->
                <input   type="file" id="file_excel" multiple onchange="checkFile(this)" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%; z-index: 10;" />
                <img class="imgabc" src="img/file.png" width="70" style="position: absolute; top: 17px; left: 17px; bottom: 0; right: 0; z-index: 5;">
                
                </div>
                <div class="sl-file" style="margin-top: 7px;text-align: center;"></div>
              </td>
            <td>
              <div style="font-size: 15px; font-weight: bold; padding: 10px;color: #494747;">Chú ý</div>
              <div style="padding-left: 20px; font-size: 15px; color: #525151;font-weight: 600;margin-top: -5px; border-bottom: 1px solid #EAEAEA; padding-bottom:10px;">
              <div>Chỉ nhập được file .xlsx hoặc .csv</div>
              <div>File nhập có dung lượng tối đa là 3MB và 5000 bản ghi.</div>
              </div>
            </td>
          </tr> 
          <tr>
            <td style="padding-left: 10px; padding-top:10px;font-weight: 600;color: #494747;">
              Tải file mẫu  <a href="test5.xlsx" download="filemau">tại đây.</a>
            </td>
          </tr>
        </table>
        


      </div>
      <div class="modal-footer"  style=" margin-top: 0px;">
        
        <button type="button" name="submit"  style="font-weight: 600;"class="btn btn-primary" data-dismiss="modal" onclick="sendfile()" ><i class="fas fa-save">&#160</i> Thêm</button>
        <button type="button" style="margin-left: 8px; font-weight: 600;" onclick="document.getElementById('staticBackdrop').style.zIndex ='1052'" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade md-slh" id="suath"  tabindex="-1" role="dialog" aria-labelledby="suath" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px !important ;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header" style="border: none !important;">
        <h5 class="modal-title" id="sualhLabel" style="color: #333232;font-weight: 600;">Sửa thương hiệu</h5>
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width: 100%;">
          <tr>
              <td style="color: #434242;font-size: 15px;font-weight: bold;">Tên thương hiệu</td>

              <td><input type="text" class="txt-tenth tth2" oninput="getBrandname(this)" name="" style="border: none;margin-left:23px;width: 90%;border-bottom:1px solid #C7C6C6;padding-bottom: 3px;"></td>
          </tr> 
        </table>
      </div>
      <div class="modal-footer"  style="border: none !important; margin-top: 10px; margin-bottom: 4px;">
        
        <button type="button" style="font-weight: 600;" onclick="suaThuongHieu(this)" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-save">&#160</i> Lưu</button>

        <button type="button" style="margin-left: 8px; font-weight: 600;" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
        <button type="button" style="font-weight: 600; background-color: #db4e65;border-color: #db4e65;" onclick="xoaThuongHieu(this)" class="btn btn-primary btn-xoalh" data-dismiss="modal" aria-label="Close"><i class="far fa-trash-alt">&#160</i> Xóa</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade md-slh" id="sualh"  tabindex="-1" role="dialog" aria-labelledby="sualh" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 450px !important ;margin:0px auto; padding-left: 8px;padding-right: 8px;">
      <div class="modal-header" style="border: none !important;">
        <h5 class="modal-title" id="sualhLabel" style="color: #333232;font-weight: 600;">Sửa loại hàng</h5>
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width: 100%;">
          <tr>
              <td style="color: #434242;font-size: 15px;font-weight: bold;">Tên loại hàng</td>

              <td><input type="text" class="txt-tenlh tlh2" oninput="getcatname(this)" name="" style="border: none;margin-left:23px;width: 90%;border-bottom:1px solid #C7C6C6;padding-bottom: 3px;"></td>
          </tr> 
        </table>
      </div>
      <div class="modal-footer"  style="border: none !important; margin-top: 10px; margin-bottom: 4px;">
        
        <button type="button" style="font-weight: 600;" onclick="suaLoaiHang(this)" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-save">&#160</i> Lưu</button>

        <button type="button" style="margin-left: 8px; font-weight: 600;" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban">&#160</i> Hủy</button>
        <button type="button" style="font-weight: 600; background-color: #db4e65;border-color: #db4e65;" onclick="xoaLoaiHang(this)" class="btn btn-primary btn-xoalh" data-dismiss="modal" aria-label="Close"><i class="far fa-trash-alt">&#160</i> Xóa</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade md-thh" id="staticBackdrop"  data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 950px !important; margin-left: -225px;">
      <div class="modal-header md-tt">
        <h5 class="modal-title " id="staticBackdropLabel"><span style="color: #2D2C2C !important; font-weight: bold; font-size: 18px;padding-left: 15px;">Thêm hàng hóa</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearFrm()">
          <span aria-hidden="true">&times;</span>
        </button>
        
        </div>
      <div class="modal-body" style="padding: 0px;">
        <div class="mdtt-ctn">
            <div class="thongtin tt1" chosee="1" onclick="choose(this)">
                <span>Thông tin</span>
              </div>
            <div class="thongtin" chosee="2" onclick="choose(this)">
                <span>Mô tả chi tiết</span>
            </div>
            <div class="thongtin" chosee="3" onclick="choose(this)">
                <span>Ghi chú</span>
            </div>
        </div>

        <form method="post" id="insert_frm" class="bth" style="padding: 30px 30px 25px 30px;">
            <div class="mota" style="display: none;">
              <textarea id="editor1" name="desc"  class="txt-edit" ></textarea>
            </div>
            <div class="ghichu" style="display: none;">
                <div style="border:1px solid #ddd; padding: 0px; border-radius: 4px; width: 886px;">
                  <div style="background-color: #ececee; height: 35px;color: #373636;font-weight: bold;padding-left: 15px; line-height: 35px;">Ghi chú</div>
                  <textarea class="txt-gc" style="min-height: 100px; max-height: 500px;width: 100%;border: none;padding:15px; font-size: 15px; margin:0px;"></textarea>
                </div>
            </div>
            <div class="ttchung">
            <table class="frm-tsp" border="0" cellspacing="15px" >
              <tr class="zczc">
                  <td class="lb_col">Mã hàng</td>
                  <td class="txt-thsp "><input class="c1c" type="text" name="" style="pointer-events: none;
            cursor: default;"  placeholder="Mã hàng tự động"></td>
                  <td class="txt-col2 lb_col">Giá nhập</td>
                  <td class="txt-thsp "><input class="c2c gianhap"  oninput="formatNumber(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="0" style="text-align: right;padding-right: 5px;" tabindex="6"></td>
                  <td class="donvi">đ</td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col" style="padding-right: 42px;">Tên sản phẩm</td>
                  <td class="txt-thsp "><input class="c1c" id="tenspp" type="text" name="" tabindex="1"></td>
                  <td class="txt-col2 lb_col">Giá bán</td>
                  <td class="txt-thsp "><input class="c2c giaban" oninput="formatNumber2(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="0" style="text-align: right; padding-right: 5px;" tabindex="7"></td>
                  <td class="donvi">đ</td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Loại hàng</td>
                  <td class="txt-thsp ">
                      <select class="sl-lh" tabindex="2">
                        <option value="0">---Lựa chọn---</option>
                        <?php 
                            $showCat=$cat->showCat();
                           if($showCat){
                            while($result=$showCat->fetch_assoc()){
                        ?>
                            <option class="op-lh" value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                        <?php 
                            }
                          }
                        ?>
                      </select>
                      <!-- <i class="fas fa-plus" style="margin-left: 10px;"></i> -->
                      <!-- <img src="./img/plus2.png" width="15"> -->
                      <div class="pluss" data-toggle="modal" data-target="#exampleModal" onclick="document.getElementById('staticBackdrop').style.zIndex ='1000'">&#43</div>
                  </td>
                  <td class="txt-col2 lb_col">Tồn kho</td>
                  <td class="txt-thsp "><input class="c2c tonkho" style="text-align: right;padding-right: 5px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="" tabindex="8" ></td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Thương hiệu</td>
                  <td class="txt-thsp ">
                      <select class="sl-lh sl-th" tabindex="3">
                        <option value="0">---Chọn thương hiệu---</option>
                        <?php
                          $showBrand=$brand->show_brand();
                          if($showBrand){
                            while($result=$showBrand->fetch_assoc()){

                      ?>
                          <option class="op-lh" value="<?php echo $result['brandID']?>"><?php echo $result['brandName']?></option>
                          

                      <?php
                             }
                          }
                      ?>
                      </select>
                      <!-- <i class="fas fa-plus" style="margin-left: 10px;"></i> -->
                      <!-- <img src="./img/plus2.png" width="15"> -->
                      <div class="pluss">&#43</div>
                  </td>
                  <td class="txt-col2 lb_col" style=" padding-right: 37px;">Trọng lượng</td>
                  <td class="txt-thsp "><input class="c2c trongluong"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="0" style="text-align: right; padding-right: 5px;" tabindex="9"></td>
                  <td class="donvi">g</td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Màu sắc</td>
                  <td class="txt-thsp "><input class="c1c colorr" type="text" name="" tabindex="4"></td>
                  <td>
                    <div class="abcc">
                      <input type="radio" name="baohanh" class="ckb-bh bhh" checked="true" id="bh12" value="12" ><label for="bh12">BH 12 tháng</label>
                    </div>
                  </td>
                  <td class=""><div  class="abcc" style="margin-left: 30px;">
                      <input type="radio" name="baohanh" id="bh24" class="ckb-bh bhh" value="24"><label for="bh24">BH 24 tháng</label>
                    </div></td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Ngày nhập</td>
                  <td class="txt-thsp "><input class="c1c dtpk" type="date" value="<?php echo date('Y-m-d'); ?>" tabindex="5" ></td>
                  <td colspan="2">
                    <div  class="abcc" >
                      <input type="radio" name="baohanh" id="bhtd" class="ckb-bh  bhh" value="100"><label for="bhtd">Trọn đời</label>
                    </div>
                  </td>
              </tr>
            </table>
            <div class="upload_img">
              <form method="post" action="" enctype="multipart/form-data" id="myform">
              <div class="img-bt" style="position: relative;" > 
                <span >+ Thêm</span>
                <input   type="file" name="files" id="files_img" multiple onchange="readURL(this)" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%; z-index: 10;" />
                <img class="img1 i1" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" id="file" style="position: relative;" > 
                <!-- <span >+ Thêm</span> -->
               <!--  <input   type="file" id="file2" onchange="readURL(this)" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%; z-index: 10;" /> -->
                <img class="img2 i2" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 

                <img class="img3 i3" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 
 
                <img class="img4 i4" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 

                <img class="img5 i5" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 

                <img class="img6 i6" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
              
              </form>
            </div>
          </div>

        </form>
        
        
      </div>
      <div class="modal-footer md-ft" >    
        <!-- <button type="button " class="btn btn-primary bttt" onclick="themsp()"><i class="fas fa-save">&#160</i>Lưu</button> -->
        <button type="button " class="btn btn-primary bttt" onclick="themsp()"><i class="fas fa-save">&#160</i>Lưu</button>
        <button type="button" class="btn btn-secondary btth" data-dismiss="modal" onclick="clearFrm()"><i class="fas fa-ban">&#160</i>Hủy</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade md-suahh" id="suahh"  data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 950px !important; margin-left: -225px;">
      <div class="modal-header md-tt">
        <h5 class="modal-title " id="staticBackdropLabel"><span style="color: #2D2C2C !important; font-weight: bold; font-size: 18px;padding-left: 15px;">Sửa hàng hóa</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearFrm()">
          <span aria-hidden="true">&times;</span>
        </button>
        
        </div>
      <div class="modal-body" style="padding: 0px;">
        <div class="mdtt-ctn">
            <div class="thongtin tt1" chosee="1" onclick="choose(this)">
                <span>Thông tin</span>
              </div>
            <div class="thongtin" chosee="2" onclick="choose(this)">
                <span>Mô tả chi tiết</span>
            </div>
            <div class="thongtin" chosee="3" onclick="choose(this)">
                <span>Ghi chú</span>
            </div>
        </div>

        <form method="post" id="insert_frm" class="bth" style="padding: 30px 30px 25px 30px;">
            <div class="mota" style="display: none;">
              <textarea id="editor2" name="desc2"  class="txt-edit" ></textarea>
            </div>
            <div class="ghichu" style="display: none;">
                <div style="border:1px solid #ddd; padding: 0px; border-radius: 4px; width: 886px;">
                  <div style="background-color: #ececee; height: 35px;color: #373636;font-weight: bold;padding-left: 15px; line-height: 35px;">Ghi chú</div>
                  <textarea class="txt-gc txt-gc2" style="min-height: 100px; max-height: 500px;width: 100%;border: none;padding:15px; font-size: 15px; margin:0px;"></textarea>
                </div>
            </div>
            <div class="ttchung">
            <table class="frm-tsp" border="0" cellspacing="15px" >
              <tr class="zczc">
                  <td class="lb_col">Mã hàng</td>
                  <td class="txt-thsp "><input class="c1c txt-mhh" type="text" name="" style="pointer-events: none;
            cursor: default;"  placeholder="Mã hàng tự động"></td>
                  <td class="txt-col2 lb_col">Giá nhập</td>
                  <td class="txt-thsp "><input class="c2c gianhap gianhap2" oninput="formatNumber(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="0" style="text-align: right;padding-right: 5px;" tabindex="6"></td>
                  <td class="donvi">đ</td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col" style="padding-right: 42px;">Tên sản phẩm</td>
                  <td class="txt-thsp "><input class="c1c tenspp tenspp2" id="tenspp" type="text" name="" tabindex="1"></td>
                  <td class="txt-col2 lb_col">Giá bán</td>
                  <td class="txt-thsp "><input class="c2c giaban giaban2" oninput="formatNumber2(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="0" style="text-align: right; padding-right: 5px;" tabindex="7"></td>
                  <td class="donvi">đ</td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Loại hàng</td>
                  <td class="txt-thsp ">
                      <select class="sl-lh sl-lh2" tabindex="2">
                        <option value="0">---Lựa chọn---</option>
                        <?php 
                            $showCat=$cat->showCat();
                           if($showCat){
                            while($result=$showCat->fetch_assoc()){
                        ?>
                            <option class="op-lh" value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                        <?php 
                            }
                          }
                        ?>
                      </select>
                      <!-- <i class="fas fa-plus" style="margin-left: 10px;"></i> -->
                      <!-- <img src="./img/plus2.png" width="15"> -->
                      <div class="pluss" data-toggle="modal" data-target="#exampleModal" onclick="document.getElementById('staticBackdrop').style.zIndex ='1000'">&#43</div>
                  </td>
                  <td class="txt-col2 lb_col">Tồn kho</td>
                  <td class="txt-thsp "><input class="c2c tonkho tonkho2" style="text-align: right;padding-right: 5px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="" tabindex="8" ></td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Thương hiệu</td>
                  <td class="txt-thsp ">
                      <select class="sl-lh sl-th sl-th2" tabindex="3">
                        <option value="0">---Chọn thương hiệu---</option>
                        <?php
                          $showBrand=$brand->show_brand();
                          if($showBrand){
                            while($result=$showBrand->fetch_assoc()){

                      ?>
                          <option class="op-lh" value="<?php echo $result['brandID']?>"><?php echo $result['brandName']?></option>
                          

                      <?php
                             }
                          }
                      ?>
                      </select>
                      <!-- <i class="fas fa-plus" style="margin-left: 10px;"></i> -->
                      <!-- <img src="./img/plus2.png" width="15"> -->
                      <div class="pluss">&#43</div>
                  </td>
                  <td class="txt-col2 lb_col" style=" padding-right: 37px;">Trọng lượng</td>
                  <td class="txt-thsp "><input class="c2c trongluong trongluong2"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="" placeholder="0" style="text-align: right; padding-right: 5px;" tabindex="9"></td>
                  <td class="donvi">g</td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Màu sắc</td>
                  <td class="txt-thsp "><input class="c1c colorr colorr2" type="text" name="" tabindex="4"></td>
                  <td>
                    <div class="abcc">
                      <input type="radio" name="baohanh2" class="ckb-bh bhh2" id="bh12" value="12" ><label for="bh12">BH 12 tháng</label>
                    </div>
                  </td>
                  <td class=""><div  class="abcc" style="margin-left: 30px;">
                      <input type="radio" name="baohanh2" id="bh24" class="ckb-bh bhh2" value="24"><label for="bh24">BH 24 tháng</label>
                    </div></td>
              </tr>
              <tr class="zczc">
                  <td class="lb_col">Ngày nhập</td>
                  <td class="txt-thsp "><input class="c1c dtpk dtpk2" type="date" value="<?php echo date('Y-m-d'); ?>" tabindex="5" ></td>
                  <td colspan="2">
                    <div  class="abcc" >
                      <input type="radio" name="baohanh2" id="bhtd" class="ckb-bh  bhh2" value="100"><label for="bhtd">Trọn đời</label>
                    </div>
                  </td>
              </tr>
            </table>
            <div class="upload_img">
              <form method="post" action="" enctype="multipart/form-data" id="myform">
              <div class="img-bt" style="position: relative;" > 
                <span >+ Thêm</span>
                <input   type="file" name="files2" id="files2" multiple onchange="readURL(this)" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%; z-index: 10;" />
                <img class="img1 uu1" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" id="file" style="position: relative;" > 
                <img class="img2 uu2" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 
                <img class="img3 uu3" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt " style="position: relative;" > 
                <span >+ Thêm</span>

                <img class="img4 uu4" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 

                <img class="img5 uu5" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
            <div class="img-bt" style="position: relative;" > 

                <img class="img6 uu6" src="./img/abcd.png" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;z-index: 5;">
            </div>
              
              </form>
            </div>
          </div>

        </form>
        
        
      </div>
      <div class="modal-footer md-ft" >    
        <button type="button " class="btn btn-primary bttt" data-dismiss="modal" onclick="suaSP()"><i class="fas fa-save">&#160</i>Lưu</button>
<!--         <button type="button " class="btn btn-primary bttt" onclick="themsp2()"><i class="fas fa-save">&#160</i>Lưu & Thêm mới</button> -->
        <button type="button" class="btn btn-secondary btth" data-dismiss="modal" onclick="clearFrm()"><i class="fas fa-ban">&#160</i>Hủy</button>
      </div>
    </div>
  </div>
</div>


      <style type="text/css">
        .ctn-lh::-webkit-scrollbar{
          display: none;
        }
        .donvi{
          /*font-weight: 600;*/
          color: #383636;
        }
        .kh:hover{
            background-color: #E3E0DD;
            border-color: #E3E0DD;
        }
        .md-ft{
          border: none !important;margin-bottom: 20px !important;;
          padding-right: 40px;
        }
        .bttt{
          background-color: #4bac4d !important;
          border-color: #4bac4d;
          font-size: 15px;
          margin-left: 8px !important;
           font-weight: bold !important;
        }
        .bttt:hover{
          background-color: #388E3A !important;
          border-color: #388E3A;
        }
        .btth{
          margin-left: 8px !important;
          font-weight: bold !important;
        }
        .btth:hover{
          background-color: #424242 !important;
          border-color: #424242;
        }
        .md-tlh:nth-of-type(even) {
              z-index: 1054 !important;
          }
        .md-tth{
              z-index: 1054 !important;
          }
          .md-tlh{
            z-index: 1054 !important;
          }
        .md-xoasp:nth-of-type(even){
              z-index: 1052 !important;
          }
        .md-xoanhieu{
              z-index: 1052 !important;
          }
        .md-thh:nth-of-type(even) {
              z-index: 1052;
          }
        .md-slh{
              z-index: 1054 !important;
          }
        .md-suahh{
          z-index: 1052;
        }
        .modal-backdrop.show:nth-of-type(even) {
              z-index: 1051 !important;
        }
        .logoutt{
          z-index: 1054 !important;
        }
        .btn-xoalh:hover{
          background-color: #ac2925;
          border-color: #ac2925;
        }
        .upload_img{
          margin-top: 20px;
          display: flex;
          flex-direction: row;
        }
        .img-bt{

          background-image: url('./img/abcd.png');
          width: 100px;
          height: 90px;
          cursor: pointer;
          margin-right: 10px; 
          border: 1.5px dashed #BCB9B9;
          border-radius: 2.5px;
          padding-left: 18px;
          color: #6F6C6C;
          line-height: 87px;
          
        }
        .img-bt>span{
          position: relative;
          z-index: 20;
          visibility: hidden;
        }
        .file-btn{
          /*padding: 10px;*/
          width: 100px;
          height: 110px;
          cursor: pointer;
          margin-right: 10px; 
          border: 1.5px dashed #39B462;
          border-radius: 2.5px;
          padding-left: 18px;
          color: #6F6C6C;
          line-height: 87px;
          /*background-image: url('./img/upload.png') !important;*/
        }
        .img-item{
          
          /*background-image: url("./img/default-image.png");*/
        }
        .img-bt:hover{
          border: 1.8px dashed #5E5B5B;
          box-shadow: 0px 0px 10px #8F8E8E inset;
          
        }
        .img-bt:hover>span{
          visibility: visible;
        }
        .ckb-bh{
          
          /*padding-left: 20px;*/
          cursor: pointer;
          /*margin-left: 20px;*/
        }
          .abcc{
            margin-left: 50px;
            font-size: 12.5px;
            padding-top: 10px;
            margin-top: 10px;

          }
          .abcc>label{
            color: #5E5C5C;
            font-weight: 700;
            cursor: pointer;
            margin-left: 10px;
          }
        .pluss{
          font-size: 30px;
           color: #575555;
           display: inline;
            position: relative;
          top: 5px;
          left: 10px;
          cursor: pointer;
        }
        .pluss:hover{
          font-weight: bold;
          color: #0853EB;
        }
        .zczc{
          height: 45px;
        }
        .op-lh{
          padding-left: 20px;
        }
        .lb_col{
          font-size: 14.5px;
          font-weight: bold;
          /*padding-top: 2px;*/
          color: #484747;
          padding-right:50px;
        }
        .c1c{
          /*outline: none;*/
          font-size: 15px;
          width: 380px;
        }
        .sl-lh{
          border: none;
          width: 340px;
          font-size: 15px;
          padding-bottom: 3px;
          color: #343333;
          border-bottom: 1.1px solid #C2C1C1;
        }
        .sl-lh:focus{
          border-bottom: 2px solid #4bac4d;
          transition-timing-function: ease-out;
          transition: 0.1s;
          
        }
        .c1c:focus{
          border-bottom: 2px solid #4bac4d;
          transition-timing-function: ease-out;
          transition: 0.1s;
          
        }
        .txt-tenlh:focus{
          /*border: none !important;*/
          border-bottom: 2px solid #4bac4d !important;
          transition-timing-function: ease-out;
          transition: 0.1s;
        }
        .txt-tenth:focus{
          /*border: none !important;*/
          border-bottom: 2px solid #4bac4d !important;
          transition-timing-function: ease-out;
          transition: 0.1s;
        }
        .c2c:focus{
          border-bottom: 2px solid #4bac4d;
          transition-timing-function: linear;
          transition: 0.1s;
          
        }
        .c2c{
          width: 180px;
          font-size: 15px;
        }
        .c2c::placeholder{
          /*font-size: 14px;*/
          /*font-weight: 600;*/
          text-align: right;
        }
        .txt-thsp>input{
          outline: none;

          border: none;
          padding-bottom: 3px;
          border-bottom: 1.1px solid #C2C1C1;
        }
        .txt-thsp>input::placeholder{
          font-size: 14px;
          font-weight: 600;
        }
        .edit-lh:hover{
          visibility: visible;

        }
        .mdtt-ctn{
          display: flex !important;
          flex-direction: row !important;
          background-color: #ededed;
          border-bottom: 1px solid #E3E3E3;
        }
        .txt-col2{
          padding-left: 50px;
        }
        .tt1{
          border-bottom: 2px solid #4bac4d;
          color: #1D1C1C;
          font-weight: 600;
        }
        .hrr{
          margin:0px;
        }
        .thongtin{
          margin-bottom: -1.7px;
          color: #151515;
          cursor: pointer;
          padding:3px 30px 5px 30px;
        }
        .md-tt{
          background-color: #ededed;
          border-top-left-radius: 5px;
          border-top-right-radius: 5px;
          border-bottom-color: #ededed;
        }
        .pd-name::-webkit-scrollbar{
          display: none;
        }
        .ctn-th::-webkit-scrollbar{
          display: none;
        }
        
        .container{
          display: inline-block;
          position:relative;
          cursor:pointer;
          font-size:30px;
          user-select: none;
          padding-left:40px;
          margin-bottom:10px;
        }
        .lh-name{
          width: 80%;
          padding: 3px 3px 3px 15px;
          /*border:1px solid grey;*/
          border-radius: 4px;
          font-size: 14px;
          font-weight: 600;
          cursor: pointer;
          color: #363535;
          margin: auto;
        }
        .edit-lh:hover{
          background-color: #969595;
          color: white !important;
        }
        .selected{
          background-color: #EDECEB;
          font-weight: bold;
        }
        .dssp{
          /*border-radius: 3px;*/
        }
        .dssp>tr{
          text-align: center;

        }
        .row-bor{
          border-left: 1px solid #DDDDDD;
          border-bottom: 1px solid #DDDDDD;
          border-right: 1px solid #DDDDDD !important;       }
        .selected2{
          /*background-color: #EDECEB;*/
          font-weight: bold;
        }
        .selected-th{
          background-color: #EDECEB;
          font-weight: bold;
        }
        .lh-name:hover{
          background-color: #EDECEB;
        }
        /*.categoryy:hover .edit-lh{
          visibility: hidden;
        }*/
        .container input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
        }
        .checkmark{
          position:absolute;
          top:0;
          left:0;
          width:30px;
          height:30px;
          background:#eee;
          border-radius:50%;
        }
        .container:hover .checkmark{
          background:#ccc;
        }
        .checkmark:after{
          content:"";
          position:absolute;
          display:none;
        }
        .container .checkmark:after{
          top:50%;
          left:50%;
          width: 15px;
          height: 15px;
          border-radius:50%;
          border: solid 3px white;
          transform:translate(-50%,-50%) rotate(45deg);
        }
        .container input:checked ~ .checkmark{
          background:#2196F3;
        }
        .container input:checked ~ .checkmark:after{
          display:block;
        }
        .columns-choice{
          position: absolute;
          background-color: white;
          border-radius: 5px;
          box-shadow: 0px 3px 13px #B3B3B3;
          top: 135px;
          z-index: 999;
          right: 50px;

        }
        .tk-lh{
          width: 160px;
          outline: none;
          padding-left: 7px;
          border: none;
        }
        .tk-lh::placeholder{
          font-size: 15px;
        }
        .tk-th{
          width: 160px !important;
          outline: none;
          padding-left: 7px;
          border: none;
        }
        .tk-th::placeholder{
          font-size: 15px;
        }
        .ft-title{
          font-weight: bold;
          font-size: 15px;
          /*font-family: Arial,Helvetica,sans-serif;*/
          color: #272525;

        }
        .underlinee{
          position: relative;
          width: 80%;
          margin-top: 5px;
        }
        .underline2{
          position: relative;
          width: 80%;
          margin-top: 5px;
        }
        .kh{
          position: absolute;
          right: 20px;
          margin-top: 4px;
          font-size: 17px;
        }
        .kh2{
          position: absolute;
          right: 52px;
          cursor: pointer;
          margin-top: 3px;
          font-size: 18px;
        }
        .kh2:hover{
          color:blue;
        }
        .filterr{
          position: absolute;
          top:154px;
          width: 16.7%;
          right: 30px;

          /*border: 1px solid gray;*/
        }
        .ft-lh{
          height: 200px;
          overflow: visible;
        }
        .ft-th{
          height: 200px;
          overflow: visible;
        }
        .ft-box{
          background-color: white;
          width: 100%;
          margin-bottom: 15px;
          padding-bottom: 10px;
          border-radius: 5px;
          box-shadow: 0px 0px 10px #E1E1E1;
        }
        .ft-box2{
          /*background-color: white;*/
          color: #373636;
          font-size: 20px;
          font-weight: bold;
          width: 100%;
          padding-top: 7px;
          padding-left: 25px;
          margin-bottom: 1px;
          padding-bottom: 10px;
          border-radius: 5px;
          /*box-shadow: 0px 0px 10px #E1E1E1;*/
        }
        .hidden{
          visibility: hidden;
        }
        .appear{
          visibility: visible;
        }
        .coll{
          padding-top: 7px;
          padding-left: 20px;
          padding-right: 20px;

        }
        .coll>label{
          margin-left: 10px;
          cursor: pointer;
          color: #1D1D1D;
          font-size: 15px;
        }
        .f1{
          padding-top: 12px;
        }
        .title {
          text-align: center;
          background-color: #dcf4fc;
          border: 1px solid #B6E2F1;
        }
        .tk-sp{

          line-height: 32px;
          width: 500px;
          position: relative;
          z-index: 100;
          border: 1px solid #b7b9cc;
          border-radius: 4px;
          padding-left: 40px;
          padding-right: 40px;

        }
        .sl-count{
          padding-top: 8px;
          margin-right: 10px;
          visibility: hidden;
          font-size: 14px;
          font-weight: 600;
        }
        .pdinfo{
          display: none;
        }
        .tk-choice{
          top: -37px; 
          left: 355px;
          display: flex;
          flex-direction: row;
          position: relative;
        }
        .btn-xoasp{
          padding: 7px 23px 6px 16px;
          border-radius: 5px;
          background-color: #DC2E2E !important;
          color: white;
          border-color: #0CBCE2 !important;
          font-size: 15px;
          /*line-height: px;*/
          margin-right: 20px;
          visibility: hidden;
          font-weight: bold;
          cursor: pointer;
        }
        .btn-xoasp:hover{
          background-color: #A51919 !important;;
          border-color: #A51919 !important;;
        }
        .tk-sp:focus{
          box-shadow: 0px 0px 6px #9C9696;
        }
        .tk-sp::placeholder {
          font-size: 15px;
          color: #8E8B8B;
        }
        .tk-dd:hover{
          border-radius: 26px;
          background-color: #F1EAEA;
          
        }
        .themsp{
          padding: 6px 23px 6px 18px;
          border-radius: 5px;
          background-color: #0CBCE2 !important;
          color: white;
          border-color: #0CBCE2 !important;
          font-size: 15px;
          font-weight: bold;
          cursor: pointer;
        }
        .themsp:hover{
          background-color: #1873EF !important;
          border-color: #1873EF !important;
        }
        .title>td{
          padding: 10px;
          color: black;
          font-size: 15px;
          font-weight: 600;
          border-radius: 1px;

        }
        .roww{
          height: 50px !important;
          /*line-height: 65px;*/
          overflow: hidden;
          
          /*font-weight: 600;*/
          /*border-radius: 1px;*/

        }
        .roww:hover{
          background-color: #EDF8FC !important;
          cursor: pointer;

        }
        .roww>td{
          color: #313030;
          font-size: 14.5px;
        }
        .excel{
          padding: 6px 22px 6px 22px;
          border-radius: 5px;
          background-color: #4bac4d;
          color: white;
          margin-left:10px;
          font-size: 15px;
          font-weight: bold;
          cursor: pointer;
        }
        .column{
          padding: 6px 15px 6px 15px;
          border-radius: 5px;
          color: white;
          margin-left:10px;
          font-size: 15px;
          display: block;
          font-weight: bold;
          cursor: pointer;
          background-color: #676767;
        }
        .column:hover{
          background-color: #2C2C2C;
        }
        .focus{
          background-color: green;
          height: 1.1px;
          transition: 0.5s;
        }
        .excel:hover{
          background-color: #2F8731;
        }
        
        .checkbox:checked{
          background-color: green;
        }
        .not_found{
          text-align: center;
          color: #3C3939;
          padding-top: 10px;
          background-color: #F8FFBD;
          padding-bottom: 10px;
          border-left: 1px solid #DDDDDD;
          border-bottom: 1px solid #DDDDDD;
          border-right: 1px solid #DDDDDD;
          /*line-height: 50;*/
        }
        .chosed-img{
          border:2px solid cyan !important;
        }
      </style>

      

     

        
        
        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
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
  <div class="modal fade logoutt" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->

        <div class="modal-footer" >
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
  <!-- <script src="./formatMoney/accounting.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./CodeSeven-toastr-50092cc/build/toastr.min.js"></script>
  <script src="./formatMoney/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script>
 

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

<script type="text/javascript">
      var a=[1,2,3,4,6,7,8];
      var brandname="";
        var catname="";
        var status="all";
        var sort_choice="all";
        var columns_choose=[];
        var sql_col=[];
        var totalfiles=0;
        var file_ex;
        var tab_title="";
        var key="";
        var ttc="";


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
        

      $(document).ready(function() {
        
        // if(checkX=1){
        //   toastr["success"]("Xóa thành công","Success !",);
        // }
      // checkkk();
      showBrandd();
      showCatt();
      columns_choose=num2col(a);
      tab_title=drawTable(columns_choose);
      // $('.title').html(tab_title);
      showProduct();

      ttc=$(".bth").html();

        $('.column').click(function(event){
          
          if ($('.columns-choice').css('visibility')=='visible') {
            $('.columns-choice').addClass('hidden'); 
            $('.columns-choice').removeClass('appear');
            $('.column').html('<img src="../icon/two.png" style="font-weight: bold;" style="display: block;"> &#160&#160<i class="fas fa-caret-down"></i>')
          }
          else {
            $('.columns-choice').addClass('appear');
            $('.columns-choice').removeClass('hidden');
            $('.column').html('<img src="../icon/two.png" style="font-weight: bold;" style="display: block;"> &#160&#160<i class="fas fa-caret-up"></i>')
          }
          });

          


          
          });

        $(".tk-lh").focus(function(){
        $(".underlinee").addClass("focus")
        // $(".underlinee").css("height","1.1px");
          });

        $(".tk-lh").focusout(function(){
          $(".underlinee").removeClass("focus")
          });

        $(".tk-th").focus(function(){
        $(".underline2").addClass("focus")
        // $(".underlinee").css("height","1.1px");
          });

        $(".tk-th").focusout(function(){
          $(".underline2").removeClass("focus")
          });




      var columns = [{
          "stt" : 1,
           "name" : "ID",
           "sql_name" : "productID",
           "width" :  40,
        },
        {
          "stt" : 2,
           "name" : "",
           "sql_name" :"image",
           "width" : 40,
        },
        {
          "stt" : 3,
           "name" : "Tên hàng",
           "sql_name" : "productName",
           "width" : 320,
        },
        {
          "stt" : 4,
           "name" : "Loại hàng",
           "sql_name" : "catID",
           "width" : 105,
        },
        {
          "stt" : 5,
           "name" : "Thương hiệu",
           "sql_name" :"brandID",
           "width" : 100,
        },
        {
          "stt" : 6,
           "name" : "Tồn kho",
           "sql_name" : "amount",
           "width" : 80,
        },
        {
          "stt" : 7,
           "name" : "Giá nhập",
           "sql_name" : "import_price",
           "width" : 110,
        },
        {
          "stt" : 8,
           "name" : "Giá bán",
           "sql_name" :"price",
           "width" : 110,
        },
        {
          "stt" : 9,
           "name" : "Màu sắc",
           "sql_name" :"color",
           "width" : 80,
        },
        {
          "stt" : 10,
           "name" : "Trọng lượng",
           "sql_name" :"weight",
           "width" : 110,
        },
        {
          "stt" : 11,
           "name" : "Nhà cung cấp",
           "sql_name" :"NCC",
           "width" : 130,
        },
        {
          "stt" : 12,
           "name" : "Đã bán",
           "sql_name" :"sold",
           "width" : 70,
        },
        {
          "stt" : 13,
           "name" : "Ngày nhập",
           "sql_name" :"import_date",
           "width" : 90,
        },
        {
          "stt" : 14,
           "name" : "Tình trạng",
           "sql_name" :"status",
           "width" : 110,
        },
        {
          "stt" : 15,
           "name" : "Bảo hành",
           "sql_name" :"bh",
           "width" : 90,
        },
        {
          "stt" : 16,
           "name" : "Ghi chú",
           "sql_name" :"note",
           "width" : 90,
        }];

        function showFile(){
          // alert($('.img1').val());
          var fd= new FormData();
          var files =$('.img1')[0].files[0];
          alert(files);
          // fd.append('file',files);
        }

        var loadFile = function(event) {
        var image = document.getElementsByClassName('img_display');
        image.src=URL.createObjectURL(event.target.files[0]);
      };

      

        function processURL(img_class,input,i){
            var reader = new FileReader();

                reader.onload = function (e) {
                    $(img_class).attr('src',e.target.result);
                };

                reader.readAsDataURL(input.files[i]);
        }

        function setDefaultIMG(){
          for(i=0;i<totalfiles;i++){
                j=i+1;
                img_tag=".img"+j;
                $(img_tag).attr('src','img/abcd.png');
            }
        }

        function setDefaultIMG2(){
          for(i=0;i<totalfiles;i++){
                j=i+1;
                img_tag=".i"+j;
                $(img_tag).attr('src','img/abcd.png');
            }
        }
      

        var c1=0;
        function chonLH(obj){
          if(obj.getAttribute("catID")=="all"){
            catname="";
            obj.classList.add("selected2");
            $(".selected").removeClass("selected");
          }
          else{
          catname=obj.getAttribute("catID");
          if(c1>0){
              $(".selected").removeClass("selected");
              $(".selected2").removeClass("selected2");
           }
           $(".selected2").removeClass("selected2");
        obj.classList.add("selected");
            c1=c1+1;
          }


            showProduct();
          }

        var c2=0;
        function chonTH(obj){
          if(obj.getAttribute("brandID")=="all"){
            brandname="";
            obj.classList.add("selected2");
            $(".selected-th").removeClass("selected-th");
            
          }
          else{
          brandname=obj.getAttribute("brandID");
          
          if(c2>0){
              $(".selected-th").removeClass("selected-th");
              $(".selected2").removeClass("selected2");
           }
           $(".selected2").removeClass("selected2");
        obj.classList.add("selected-th");
            c2=c2+1;

          }
          showProduct();
          }

        function chonSX(obj){
          sort_choice=obj.value;
          showProduct();

        }
        function chonTT(obj){
          status=obj.value;
          showProduct();

        }
        
        function addColumn(ckb){
          var index=parseInt(ckb.value);
          if(ckb.checked!=false){
            a.push(index);
         
          }
          else{
            var pos = a.indexOf(index);
            a.splice(pos, 1);
          }
          sapxep(a);
          columns_choose=num2col(a);
          tab_title=drawTable(columns_choose);
          showProduct();

          }

          function sapxep(mang){
            size=mang.length
            for(i=0 ; i< size-1 ; i++){
              for(j=i+1; j< size; j++){
                if(mang[i] > mang[j]){
                  temp=mang[i];
                  mang[i]=mang[j]
                  mang[j]=temp;
                }
              }
            }
            return mang;
          }

          var col_width=[];
          var tab_wid=0;
          function num2col(col_index){
            col_width=[];
            sql_col=[];
            tab_wid=0;
            col_name=[];
            for(i =0; i< col_index.length ; i++){
              for( col in columns){
                if( columns[col].stt == col_index[i]){
                  col_name.push(columns[col].name);
                  col_width.push(columns[col].width);
                  tab_wid=tab_wid+parseInt(columns[col].width);
                  sql_col.push(columns[col].sql_name);

                  }
              }
              
            }
            $(".dssp").width(tab_wid+55);
            return col_name;
          }

          function choose(obj){
            $(".tt1").removeClass("tt1");
            obj.classList.add("tt1");
            if(obj.getAttribute("chosee")=="1"){
              $(".mota").css("display","none");
              $(".ghichu").css("display","none");
              $(".ttchung").css("display","block");

            }
            else if(obj.getAttribute("chosee")=="2"){
              $(".mota").css("display","flex");
              $(".ghichu").css("display","none");
              $(".ttchung").css("display","none");
            }
            else{
              $(".mota").css("display","none");
              $(".ghichu").css("display","flex");
              $(".ttchung").css("display","none");
            }

          }

          function drawTable(cols){
            str="<tr class='title' ><td><input type='checkbox' name='' onclick='getAll(this)' style='width:19px;height:19px;'></td>";
            for(i in cols){
              str=str+'<td style="width:'+col_width[i]+'px;">'+cols[i]+"</td>";
            }
            str=str+" </tr>";
            return str;
          }

          function search(obj){
            key=obj.value;
            showProduct();
            // alert(key);
          }


          function formatNumber(num) {

            $(".gianhap").simpleMoneyFormat();

          }
          function formatNumber2(num) {

            $(".giaban").simpleMoneyFormat();

          }
          function formatNumber3(num) {

            $(".trongluong").simpleMoneyFormat();

          }

          function showProduct(){

              <?php 
                if(!isset($_GET['page']))  
                   $cur_page=1;
                  else
                   $cur_page=$_GET['page'];     
              ?>
              var page=<?php echo $cur_page; ?> ;

             $.ajax({
              url:"showpd.php",
              method:'post',
              data:{ title:tab_title,key:key,columns:sql_col,catID:catname ,brand:brandname ,choice_sx:sort_choice,status:status, page:page },
              dataType:"JSON",
              success: function(data){
                      $('.dssp').html(data.item);
                      $('.pagee').html(data.page);
                    }
             })

           }

           function exportExcel(){
             $.ajax({
              url:"export_excel.php",
              method:'post',
              data:{ pdex :"all" },
              dataType:"JSON",
              success: function(data){
                    var $a = $(".asdf");
                    $a.attr("href",data.file);
                    $("body").append($a);
                    $a.attr("download","file.xls");
                    $a[0].click();
                    $a.remove();
                    }
             })

           }

           var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

           function themLoaiHang(){
              // var page=1;
              tenlh= $(".txt-tenlh").val();
              format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
              if(tenlh==""){
                toastr["warning"]("Chưa nhập tên loại hàng","Warning",);
                $(".txt-tenlh").focus();
              }
              else if(format.test(tenlh)==1){
                toastr["warning"]("Tên loại hàng không chứa kí tự đặc biệt","Warning",);
                $(".txt-tenlh").focus();
              }
              else if(tenlh.length<3 || tenlh.length>30){
                toastr["warning"]("Tên loại phải từ 1-30 kí tự","Warning",);
                $(".txt-tenlh").focus();
              }
              else{
             $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  tenlh:tenlh},
              dataType:"JSON",
              success: function(data){
                      // $('.dssp').html(data.item);
                      // $('.pagee').html(data.page);
                      if(data.tlh==1){
                        toastr["success"]("Thêm loại hàng thành công","Success !",);
                      }
                      else{
                        toastr["error"]("Không thể thêm","eEror !",);
                      }
                      $(".txt-tenlh").val("");
                      showCatt();
                      // $('#modal').modal().hide();
                      document.getElementById('staticBackdrop').style.zIndex ='1052';
                    }
             })
              }
           }

           function themThuongHieu(){
              // var page=1;
              format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
              tenth= $(".txt-tenth").val();
              if(tenth==""){
                toastr["warning"]("Chưa nhập tên thương hiệu","Warning",);
              }
              else if(format.test(tenth)==1){
                toastr["warning"]("Tên thương hiệu không chứa kí tự đặc biệt","Warning",);
              }
              else if(tenth.length<3 || tenth.length>30){
                toastr["warning"]("Tên thương hiệu phải từ 1-30 kí tự","Warning",);
              }
              else{


             $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  tenth:tenth},
              dataType:"JSON",
              success: function(data){
                      // $('.dssp').html(data.item);
                      // $('.pagee').html(data.page);
                      if(data.tth==1){
                        toastr["success"]("Thêm thương hiệu thành công","Success !",);
                      }
                      else{
                        toastr["error"]("Không thể thêm","Error !",);
                      }
                      $(".txt-tenth").val("");
                      // location.reload();
                      showBrandd();
                      // $('#modal').modal().hide();
                      document.getElementById('staticBackdrop').style.zIndex ='1052';
                    }
             })
             }

           }

           function getSrc(obj){
            src=obj.getAttribute("src");
            $(".chosed-img").removeClass("chosed-img");
            obj.classList.add("chosed-img");
            $(".main-img").attr("src",src);
           }

          var itemm=[];
          var itemmm="";
          var hhheight=1050;
          var demm=0;
           function showInfo(obj){
            id="#pd"+obj.getAttribute("pdID");

            // $(".navbar-nav bg-gradient-primary sidebar sidebar-dark accordion").css("height","1550");
            itemm.push(id);
            // alert(itemm);
            // alert(itemm+"  "+itemm.length);
            
            if($(id).hasClass("pdinfo")==true)
              $(id).removeClass("pdinfo");
            else
              $(id).addClass("pdinfo");

            if(itemm.length>=2){
              if(itemm[0]==id && itemm[1]==id)
              itemm=[];
            else{
              if(itemm.indexOf(id)!=-1){
                $(itemm[0]).addClass("pdinfo");
                itemm.shift();
              }
              else
                itemm.shift();
            }
          }
            
           }

            var it_select=[];
           function getAll(obj){
            if(obj.checked==true){
              sta=1;
              $('.tk-sp').css("width","350");
              $('.btn-xoasp').css("visibility","visible");
              $('.sl-count').css("visibility","visible");
            // alert(sta);
            $.ajax({
              url:"lhth.php",
              method:'post',
              data:{ getall:sta},
              dataType:"JSON",
              success: function(data){
                      it_select=data.getall;
                      $('.sol-sl').html(it_select.length+" mục");
                      checkkk();

                    }
             });
              }
              else{
                // alert(it_select);
                checkkk2();
              $('.tk-sp').css("width","500");
              $('.btn-xoasp').css("visibility","hidden");
              $('.sl-count').css("visibility","hidden");
                it_select=[];
                $('.sol-sl').html(it_select.length+" mục");
              }
           }
           function checkkk(){
            for(i=0;i<it_select.length;i++){
              idsp="#sp"+it_select[i];
              if($(idsp)){
                
                $(idsp).prop('checked', true);
              }
            }
           }

           function checkkk2(){
            for(i=0;i<it_select.length;i++){
              idsp="#sp"+it_select[i];
              if($(idsp)){
                
                $(idsp).prop('checked',false);
              }
            }
           }

          function selectPD(obj){
            if(obj.checked==true){  
              it_select.push(obj.getAttribute("pdID"));  
              
              
            }
            else
              {
               
                vt=it_select.indexOf(obj.getAttribute("pdID"));
                it_select.splice(vt, 1);
              } 
            if(it_select.length>0){
              $('.tk-sp').css("width","350");
              $('.btn-xoasp').css("visibility","visible");
              $('.sol-sl').html(it_select.length+" mục");
              $('.sl-count').css("visibility","visible");
            }
            else
            {
               $('.tk-sp').css("width","500");
              $('.btn-xoasp').css("visibility","hidden");
              $('.sol-sl').html(it_select.length+" mục");
              $('.sl-count').css("visibility","hidden");
            }
            // alert(it_select);
          }
         

           var delID;
           function getDelID(obj){
            delID=obj.getAttribute("pdID");
            // alert(delID);
           }

           var malh;
           function getCatID(obj){
            malh=obj.parentElement.getAttribute("catID");
            $.ajax({
              url:"lhth.php",
              method:'post',
              data:{ catIDD:malh},
              dataType:"JSON",
              success: function(data){
                      $(".txt-tenlh").val(data.catName);
                    }
             })
           }

           var math;
           function getBrandID(obj){
            math=obj.parentElement.getAttribute("brandID");
            $.ajax({
              url:"lhth.php",
              method:'post',
              data:{ brandIDD:math},
              dataType:"JSON",
              success: function(data){
                      $(".txt-tenth").val(data.brandName);

                    }
             })
           }

            var n_catname;
           function getcatname(obj){
            n_catname=obj.value;
            // alert(n_catname);
           }

           var n_brandname;
           function getBrandname(obj){
            n_brandname=obj.value;
            // alert(n_catname);
           }

           function suaLoaiHang(obj){
      
              tenlh= $(".tlh2").val();
              // caatIDD=obj.getAttribute("catID");


              if(tenlh==""){
                toastr["warning"]("Chưa nhập tên loại hàng","Warning",);
                $(".txt-tenlh").focus();
              }
              else if(format.test(tenlh)==1){
                toastr["warning"]("Tên loại hàng không chứa kí tự đặc biệt","Warning",);
                $(".txt-tenlh").focus();
              }
              else if(tenlh.length<3 || tenlh.length>30){
                toastr["warning"]("Tên loại phải từ 1-30 kí tự","Warning",);
                $(".txt-tenlh").focus();
              }

              else{
             $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  tenlh_moi:n_catname, catID:malh},
              dataType:"JSON",
              success: function(data){
                      if(data.slh==1){
                        toastr["success"]("Cập nhật thành công","Success !",);
                      }
                      else{
                        toastr["error"]("Không thể sửa","Error !",);
                      }
                      $(".txt-tenlh").val("");
                      showCatt();
                    }
             })
             }
           }


           function getTHH(obj){
              // tenth=obj.value;
           }

           function suaThuongHieu(obj){
              tenth=$('.tth2').val();
        
              // caatIDD=obj.getAttribute("catID");
              if(tenth==""){
                toastr["warning"]("Chưa nhập tên thương hiệu","Warning",);
              }
              else if(format.test(tenth)==1){
                toastr["warning"]("Tên thương hiệu không chứa kí tự đặc biệt","Warning",);
              }
              else if(tenth.length<3 || tenth.length>30){
                toastr["warning"]("Tên thương hiệu phải từ 1-30 kí tự","Warning",);
              }
              else
              {

             $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  tenth_moi:n_brandname, brandID:math},
              dataType:"JSON",
              success: function(data){
                      if(data.sth==1){
                        toastr["success"]("Cập nhật thành công","Success !",);
                      }
                      else{
                        toastr["error"]("Không thể sửa","Error !",);
                      }
                      $(".txt-tenth").val("");
                      showBrandd();
                    }
             })
             }
           }

            var checkX=0;
           function xoaLoaiHang(obj){

             $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  xoalh:malh},
              dataType:"JSON",
              success: function(data){
                      if(data.xlh==1){
                        toastr["success"]("Xóa thành công","Success !",);
                      }
                      else{
                        toastr["error"]("Xóa thất bại","Error !",);
                      }
                      $(".txt-tenlh").val("");
                      showCatt();
                      
                    }

             })

           }


           function xoaThuongHieu(obj){

             $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  xoath:math},
              dataType:"JSON",
              success: function(data){
                      if(data.xth==1){
                        toastr["success"]("Xóa thành công","Success !",);
                      }
                      else{
                        toastr["error"]("Xóa thất bại","Error !",);
                      }
                      $(".txt-tenth").val("");
                      showBrandd();
                      
                    }

             })

           }



           function xoaSP(){
            $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  delID: delID},
              dataType:"JSON",
              success: function(data){
                      if(data.xsp==1){
                        // checkX=1;
                            toastr["success"]("Xóa thành công","Success !",);                    
                            showProduct();
                      }
                      else{
                        toastr["error"]("Xóa thất bại","Error !",);
                      }
                      
                      
                    }

             })
           }

           function readURL(input) {

        totalfiles = input.files.length;
        // alert(totalfiles);
            // if (input.files && input.files[0]) {
            if(totalfiles> 0){
              if(totalfiles> 6){
                toastr["error"]("Tối đa 6 ảnh","Error",);
              }
              else
              for(i=0;i<totalfiles;i++){
                j=i+1;
                img_tag=".img"+j;
                processURL(img_tag,input,i);
                }
            }

        }

        var fname="";
        function checkFile(obj){
           if(obj.files.length>0){
            var fileExtension = ['csv','xlsx'];
              if ($.inArray($("#file_excel").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  // alert();
                  toastr["error"]("Chỉ được chọn file có định dạnh : "+fileExtension.join(', '),"Error",);
                  // $(this).replaceWith(input.val('').clone(true));
              }
            else
              $(".sl-file").html(obj.files[0].name);
           }
           else
            $(".sl-file").html("");
        }

           function sendfile(){
          
            var fileExtension = ['csv','xlsx'];
              var files = $('#file_excel')[0].files;
            if(files.length==0){
              toastr["error"]("Bạn chưa chọn file","Error",);
            }
            
            else{
              // alert(files.length);
              var fd = new FormData();
              fd.append('file',files[0]);
              $.ajax({
              url: 'import.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              dataType:"JSON",
              success: function(data){
                 if(data.kq==1){
                  toastr["success"]("Thêm thành công "+(data.count-1)+" sản phẩm","Success",);
                  showProduct();
                 }
                 else 
                  toastr["error"]("File Excel không lệ","Error",);
                  
              },
              });

            }

           }

           $("#files").change(function () {
              var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
              if(document.getElementById('files').files.length>0){
              if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  // alert();
                  toastr["error"]("Chỉ được chọn tệp tin có định dạnh : "+fileExtension.join(', '),"Error",);
                  $(this).replaceWith(input.val('').clone(true));
              }
              }
          });

           $("#file_excel").change(function () {
              
          });

           

           function themsp(){

              
            // toastr["success"]("Thêm thành công","Success",);
              var tensp= $("#tenspp").val();
              // alert(tensp);
              var lh=$(".sl-lh").val();
              var th=$(".sl-th").val();
              var color=$(".colorr").val();
              var gianhap=$(".gianhap").val();
              var giaban=$(".giaban").val();
              var w =$(".trongluong").val();
              var tonkho=$('.tonkho').val();
              var baohanh = $(".bhh:checked").val();
              // var trongluong=$
              var ngaynhap=$(".dtpk").val();
              var mota=CKEDITOR.instances["editor1"].getData();
              var ghichu=$(".txt-gc").val();
              // alert(ghichu);
              var fd = new FormData();
              files2=document.getElementById('files_img').files.length;
              format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/; 

              // var files = $('#file1')[0].files;

              
              
          
              
              if(tensp==""){
                toastr["warning"]("Bạn chưa nhập tên sản phẩm","Warning",);
                $("#tenspp").focus();
              }
              else if(format.test(tensp)==true){
                toastr["warning"]("Không nhập kí tự đặc biệt","Warning",);
                $("#tenspp").focus();
              }
              else if(giaban<1000 || gianhap <1000){
                toastr["warning"]("Tối thiểu 1000 VNĐ","Warning",);
                $(".giaban").focus();
              }
              else if(w<100){
                toastr["warning"]("Trọng lượng tối thiểu 100g","Warning",);
                $(".trongluong").focus();
              }
              else if(w>15000){
                toastr["warning"]("Trọng lượng không tối đa 15kg","Warning",);
                $(".trongluong").focus();
              }
              else if(tensp.length>100){
                toastr["warning"]("Tên sản phẩm tối đa 100 kí tựu","Warning",);
                $("#tenspp").focus();
              }
              else if(ghichu.length>254){
                toastr["warning"]("Ghi chú tối đa 255 kí tựu","Warning",);
  
              }
              else if( (new Date(ngaynhap).getTime() > new Date().getTime()))
                {
                    toastr["warning"]("Ngày nhập phải nhỏ hơn ngày hiện tại","Warning",);
                }
              else if(parseInt(giaban)<parseInt(gianhap)){
                  toastr["warning"]("Giá bán phải lớn hơn giá nhập","Warning",);
              }
              else if(tonkho<=0){
                toastr["warning"]("Tồn kho tối thiều 1 sản phẩm","Warning",);
                $(".tonkho").focus();
              }
              else if(lh=="0"){
                toastr["warning"]("Bạn chưa chọn loại hàng","Warning",);
                $(".sl-lh").focus();
              }
              else if(th=="0"){
                toastr["warning"]("Bạn chưa chọn thương hiệu","Warning",);
                $(".sl-th").focus();
              }
              else if(color==""){
                toastr["warning"]("Bạn chưa nhập màu sắc","Warning",);
                $(".color").focus();
              }
              else if(gianhap=="0"){
                toastr["warning"]("Bạn chưa điền giá nhập","Warning",);
                $(".gianhap").focus();
              }
              else if(giaban=="0"){
                toastr["warning"]("Bạn chưa nhập giá bán","Warning",);
                $(".giaban").focus();
              }
              else if(giaban<1000 || gianhap <1000){
                toastr["warning"]("Tối thiểu 1000 VNĐ","Warning",);
                $(".giaban").focus();
              }
              else if(tonkho==""){
                toastr["warning"]("Bạn chưa nhập số lượng tồn","Warning",);
                $(".tonkho").focus();
              }
              else if(w=="0"){
                toastr["warning"]("Bạn chưa nhập trọng lượng","Warning",);
                $(".trongluong").focus();
              }
              else if(files2 <= 0 ){
                toastr["warning"]("Bạn chưa chọn ảnh sản phẩm","Warning",);
              }
              else if(files2 >6 ){
                toastr["warning"]("Chọn tối đa 6 ảnh","Warning",);
              }
              else{
                // alert(tensp+" "+lh+" "+th+" "+color+" "+gianhap+" "+giaban+" "+tonkho+" "+w);
                gianhap = numeral(gianhap).value();
                giaban = numeral(giaban).value();
                // w= numeral(w).value();
                // alert("Giá nhập : "+gianhap+" Giá bán : "+giaban+" w: "+w);

                // fd.append('file',files[0]);
                for (var index = 0; index < totalfiles; index++) {
                  fd.append("files[]", document.getElementById('files_img').files[index]);
                  }
                fd.append('tensp',tensp);
                fd.append('lh',lh);
                fd.append('th',th);
                fd.append('color',color);
                fd.append('gianhap',gianhap);
                fd.append('giaban',giaban);
                fd.append('tonkho',tonkho);
                fd.append('w',w);
                fd.append('mota',mota);
                fd.append('bh',baohanh);
                fd.append('ngaynhap',ngaynhap);
                fd.append('ghichu',ngaynhap);


                $.ajax({
                url: 'upload_img.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,

                dataType:"JSON",

                success: function(data){

                  if(data.kq==1){
                    toastr["success"]("Thêm thành công","Success",);
                    showProduct();
                    clearFrm();
                    setDefaultIMG();
                   }
                  else
                    toastr["error"]("Thêm thất bại","Error",);
                    clearFrm();
                    setDefaultIMG();
                    },
                 });

                
              }
            }

            var old_name="";
            function loadForm(id){
              $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  pd_idd:id},
              dataType:"JSON",
              success: function(data){
                    old_name=data.name;
                    $(".txt-mhh").val(data.id);
                    $(".tenspp2").val(data.name);
                    $(".sl-lh2").val(data.catid);
                    $(".sl-th2").val(data.brandid);
                    $(".colorr2").val(data.color);
                    $(".gianhap2").val(data.ip_price);
                    $(".gianhap2").simpleMoneyFormat();
                    $(".giaban2").val(data.price);
                    $(".giaban2").simpleMoneyFormat();
                    $('.tonkho2').val(data.amount);
                    $(".trongluong2").val(data.w);
                    $(".dtpk").val(data.date);
                    $("input[name=baohanh2][value=" + data.bh + "]").attr('checked', 'checked');
                    $(".txt-gc2").val(data.note);
                    if(data.slider.length==1)
                        $(".img1").attr("src",data.slider[0]);  
                    else
                    {
                       for(i=0;i<6;i++){
                        j=i+1;
                        img_tag=".img"+j;
                        $(img_tag).attr("src",data.slider[i]); 
                      }
                    }
                    
                     CKEDITOR.instances["editor2"].setData(data.desc);
                    }
             })
            }


            function suaSP(){

              
            // toastr["success"]("Thêm thành công","Success",);   
              var tensp= $(".tenspp2").val();
              // alert(tensp);
              var mah= $(".txt-mhh").val();
              // alert(tensp);
              var lh=$(".sl-lh2").val();
              var th=$(".sl-th2").val();
              var color=$(".colorr2").val();
              var gianhap=$(".gianhap2").val();
              var giaban=$(".giaban2").val();
              var w =$(".trongluong2").val();
              var tonkho=$('.tonkho2').val();
              var baohanh = $(".bhh2:checked").val();
              // var trongluong=$
              var ngaynhap=$(".dtpk2").val();
              var mota=CKEDITOR.instances["editor2"].getData();
              var ghichu=$(".txt-gc2").val();
              // alert(ghichu);
              var fd = new FormData();

              files2=document.getElementById('files2').files.length;
              format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/; 
              // var files = $('#file1')[0].files;

              
              
          
              
              if(tensp==""){
                toastr["warning"]("Bạn chưa nhập tên sản phẩm","Warning",);
                $("#tenspp").focus();
              }
              else if(format.test(tensp)==true){
                toastr["warning"]("Không nhập kí tự đặc biệt","Warning",);
                $("#tenspp").focus();
              }
              else if(giaban<1000 || gianhap <1000){
                toastr["warning"]("Tối thiểu 1000 VNĐ","Warning",);
                $(".giaban").focus();
              }
              else if(w<100){
                toastr["warning"]("Trọng lượng tối thiểu 100g","Warning",);
                $(".trongluong").focus();
              }
              else if(w>15000){
                toastr["warning"]("Trọng lượng không tối đa 15kg","Warning",);
                $(".trongluong").focus();
              }
              else if(tensp.length>100){
                toastr["warning"]("Tên sản phẩm tối đa 100 kí tựu","Warning",);
                $("#tenspp").focus();
              }
              else if(ghichu.length>254){
                toastr["warning"]("Ghi chú tối đa 255 kí tựu","Warning",);
  
              }
              else if( (new Date(ngaynhap).getTime() > new Date().getTime()))
                {
                    toastr["warning"]("Ngày nhập phải nhỏ hơn ngày hiện tại","Warning",);
                }
              else if(parseInt(giaban)<parseInt(gianhap)){
                  toastr["warning"]("Giá bán phải lớn hơn giá nhập","Warning",);
              }
              else if(tonkho<=0){
                toastr["warning"]("Tồn kho tối thiều 1 sản phẩm","Warning",);
                $(".tonkho").focus();
              }
              else if(lh=="0"){
                toastr["warning"]("Bạn chưa chọn loại hàng","Warning",);
                $(".sl-lh").focus();
              }
              else if(th=="0"){
                toastr["warning"]("Bạn chưa chọn thương hiệu","Warning",);
                $(".sl-th").focus();
              }
              else if(color==""){
                toastr["warning"]("Bạn chưa nhập màu sắc","Warning",);
                $(".color").focus();
              }
              else if(gianhap=="0"){
                toastr["warning"]("Bạn chưa điền giá nhập","Warning",);
                $(".gianhap").focus();
              }
              else if(giaban=="0"){
                toastr["warning"]("Bạn chưa nhập giá bán","Warning",);
                $(".giaban").focus();
              }
              else if(giaban<1000 || gianhap <1000){
                toastr["warning"]("Tối thiểu 1000 VNĐ","Warning",);
                $(".giaban").focus();
              }
              else if(tonkho==""){
                toastr["warning"]("Bạn chưa nhập số lượng tồn","Warning",);
                $(".tonkho").focus();
              }
              else if(w=="0"){
                toastr["warning"]("Bạn chưa nhập trọng lượng","Warning",);
                $(".trongluong").focus();
              }
              // else if(files2 <= 0 ){
              //   toastr["warning"]("Bạn chưa chọn ảnh sản phẩm","Warning",);
              // }
              else if(files2 >6 ){
                toastr["warning"]("Chọn tối đa 6 ảnh","Warning",);
              }
              else{
                // alert(tensp+" "+lh+" "+th+" "+color+" "+gianhap+" "+giaban+" "+tonkho+" "+w);
                gianhap = numeral(gianhap).value();
                giaban = numeral(giaban).value();
                // w= numeral(w).value();
                // alert("Giá nhập : "+gianhap+" Giá bán : "+giaban+" w: "+w);

                // fd.append('file',files[0]);
                thuyan=0;
                if(files2>0){
                for (var index = 0; index < files2; index++) {
                  fd.append("files[]", document.getElementById('files2').files[index]);
                  }
                  thuyan=1;
                }

                fd.append('id',mah);
                fd.append('old_name',old_name);
                fd.append('tensp',tensp);
                fd.append('lh',lh);
                fd.append('th',th);
                fd.append('color',color);
                fd.append('gianhap',gianhap);
                fd.append('giaban',giaban);
                fd.append('tonkho',tonkho);
                fd.append('w',w);
                fd.append('mota',mota);
                fd.append('bh',baohanh);
                fd.append('ngaynhap',ngaynhap);
                fd.append('ghichu',ghichu);

                if(thuyan!=0){
                  urll='editPD.php';

                }
                else
                  urll='editPD2.php';


                $.ajax({
                url: urll,
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
  
                dataType:"JSON",
                success: function(data){
           
                  if(data.kq==1){
                    toastr["success"]("Cập nhật thành công","Success",);
                    for(i=0;i<6;i++){
                      j=i+1;
                      img_tag=".uu"+j;
                      $(img_tag).attr("src","./img/abcd.png"); 
                    }
                    // alert(file2)
                    setDefaultIMG2();
                    showProduct();

                   }
                  else
                    toastr["error"]("Cập nhật thất bại","Error",);

                    },
                 });

                
              }
            }

            var key_br="";
            function search_br(obj){
              key_br=obj.value;
              showBrandd();
            }


            function showBrandd(){
              // key_br=$('.tk-th').val();
               $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  key_br: key_br},
              dataType:"JSON",
              success: function(data){
                  $('.ctn-th').html(data.list_br);
                  // alert(data.list_br);
                    }

             })
            }

            var key_cat="";
            function search_cat(obj){
              key_cat=obj.value;
              showCatt();
            }


            function showCatt(){
              // key_br=$('.tk-th').val();
               $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  key_cat: key_cat},
              dataType:"JSON",
              success: function(data){
                  $('.ctn-lh').html(data.list_cat);
                  // alert(data.list_br);
                    }

             })
            }

           function xoanhieu(){
            $.ajax({
              url:"lhth.php",
              method:'post',
              data:{  xoan: it_select},
              dataType:"JSON",
              success: function(data){
                      if(data.ktxn==1){
                            toastr["success"]("Xóa thành công","Success !",);                    
                            showProduct();
                            $('.tk-sp').css("width","500");
                            $('.btn-xoasp').css("visibility","hidden");
                            $('.sol-sl').html(it_select.length+" mục");
                            $('.sl-count').css("visibility","hidden");
                            it_select=[];
                      }
                      else{
                        toastr["error"]("Xóa thất bại","Error !",);
                      }
                      
                      
                    }

             })
           }


            function dongmo(){
              if($(".hhhhh").css('display')!="none"){
                $(".hhhhh").css('display',"none");
                $(".ctn-lh").css('display',"none");
                $(".kh2").css('visibility',"hidden");
                $(".ft-lh").css('height',"53");
              }
              else{
                $(".hhhhh").css('display',"block");
                $(".ctn-lh").css('display',"block");
                $(".kh2").css('visibility',"visible");
                $(".ft-lh").css('height',"200");
              }
            }


            function dongmo2(){
              if($(".ctn-tt").css('display')!="none"){
                $(".ft-tỉnhtrang").css('height',"53");
                $(".ctn-tt").css('display',"none");
              
              }
              else{
                $(".ft-tỉnhtrang").css('height',"200");
                $(".ctn-tt").css('display',"block");
              }
            }

            function dongmo3(){
              if($(".ctn-sx").css('display')!="none"){
                $(".ft-sx").css('height',"53");
                $(".ctn-sx").css('display',"none");
              
              }
              else{
                $(".ft-sx").css('height',"200");
                $(".ctn-sx").css('display',"block");
              }
            }
            function dongmo4(){
              if($(".ctn-th").css('display')!="none"){
                $(".ctn-th").css('display',"none");
                $(".ctn-thh").css('display',"none");
                $(".kh5").css('visibility',"hidden");
                $(".ft-th").css('height',"53");
              }
              else{
                $(".ctn-th").css('display',"block");
                $(".ctn-thh").css('display',"block");
                $(".kh5").css('visibility',"visible");
                $(".ft-th").css('height',"200");
              }
            
            }


            function clearFrm(){
              $("#tenspp").val("");
              // $(".sl-lh").val("");
              $(".sl-lh option[value='0']").attr("selected", "selected");
              $(".sl-th option[value='0']").attr("selected", "selected");
              $(".colorr").val("");
              $(".gianhap").val("");
              $(".giaban").val("");
              $(".trongluong").val("");
              $('.tonkho').val("");
              $('input[name="baohanh"]').prop('checked', false);
              $(".bhh:checked").val("");
              for(i=0;i<6;i++){
                j=i+1;
                img_tag=".img"+j;
                $(img_tag).attr("src","./img/abcd.png"); 
              }
              var mota=CKEDITOR.instances["editor1"].setData("");
              $(".txt-gc").val("");
            }
              

            
            
                    
           

         
 
           // $.bootstrapGrowl("another message, yay!", {
              //   ele: 'body', // which element to append to
              //   type: 'info', // (null, 'info', 'danger', 'success')
              //   offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
              //   align: 'right', // ('left', 'right', or 'center')
              //   width: 250, // (integer, or 'auto')
              //   delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
              //   allow_dismiss: true, // If true then will display a cross to close the popup.
              //   stackup_spacing: 10 // spacing between consecutively stacked growls.
              // });

           

        </script>

         <script type="text/javascript" src="./ckeditor_4.14.0_full/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'desc', {
      language:'en'
    // uiColor: '#D8D8D8
});
    </script>
    <script>
      CKEDITOR.replace( 'desc2', {
      language:'en'
    // uiColor: '#D8D8D8
});
    </script>
    <!-- <script src="./bootstrap-growl-master/jquery.bootstrap-growl.min.js"></script> -->
    <!-- <script src="https://unpkg.com/growl-alert"></script> -->
     <script src="./formatMoney/numeral.min.js"></script>
     <script type="text/javascript"></script>
  
    
 
    
        



</html>
