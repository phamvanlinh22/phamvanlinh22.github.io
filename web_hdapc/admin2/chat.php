<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php
include '../classes/order.php';
// include '../classes/product.php';
include '../classes/fbchat.php';
?>

<?php
  $order=new order();
  // $product=new product();
  // $sale= new sale();
$fb= new chat();
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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/style2.css">
   <script src="https://cdn.jsdelivr.net/npm/emoji-button/dist/index.min.js"></script>

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
      <div class="sidebar-brand-text mx-3 abc"> HDA ADMIN <sup></sup></div>
      </a>
      <style type="text/css">
        .abc{
          font-size: 100px;
        }
      </style>
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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="margin-bottom: 0px !important;">

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
        <div class="container-fluid kkk">

          <!-- Page Heading -->
          <div class="chat-list">
            <div class="head-chat">
              <div><img src="../logo/logo9.PNG"></div>
              <span>Chats</span>
            </div>
            <div class="search-chat">
              <div>
                <input type="" name="" placeholder="Tìm theo tên ...">
                <i class="fas fa-search" ></i>
              </div>
            </div>
            <div class="chat-body">
             <!--  <div class="chat-content" onclick="loadMessage(this)" conv_id="t_1111293342684119" >
                <img src="../logo/avatar.jpg">
                <div class="chat-info">
                  <div class="chat-name">Thanh Hoàng</div>
                  <div class="last-mess">
                    <span>ok</span>. 1 giờ<span>
                  </div>

                </div>
              </div>   -->
              <div class="loader">Loading...</div>'
            </div>

          
          </div>

          <div class="conversation">
            <div class="user-name">
              <img src="../logo/avatar.jpg" width="50px">
              <span>Thanh Hoàng</span>
              <i class="fas fa-cog"></i>
            </div>

            <div class="chat-messages">
              <div class="created_time">12:30 , Th5 - 8 Tháng 5 ,2021</div>

              <div class="guest">
                    <div class="chat-start">
                        <img src="../logo/avatar.jpg" width="30">
                        <div class="mesage-box">
                            <div class="message">Cuối cùng chúng ta sẽ ráp mọi thứ lại với nhau thành một</div><br>
                            <div class="message">Cuối cùng chúng ta sẽ </div><br>
                        </div>
                    </div>
              </div>



              <div class="guest">
                    <div class="chat-start">
                        <img src="../logo/avatar.jpg" width="30">
                        <div class="mesage-box">
                          <div class="message">Cuối cùng chúng ta sẽ </div><br>
                            <div class="message">Cuối cùng chúng ta sẽ ráp mọi thứ lại với nhau thành một</div><br>
                            
                        </div>
                    </div>
              </div>

              <div class="you">
                    <div class="chat-start">
                        <div class="mesage-box">
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối</div><br>
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối</div><br>
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối</div><br>
                        </div>
                    </div>
              </div>

              <div class="guest">
                    <div class="chat-start">
                        <img src="../logo/avatar.jpg" width="30">
                        <div class="mesage-box">
                            <div class="message">Cuối cùng chúng ta sẽ ráp mọi thứ lại với nhau thành một</div><br>
                            <div class="message">Cuối cùng chúng ta sẽ </div><br>
                        </div>
                    </div>
              </div>


              <div class="guest">
                    <div class="chat-start">
                        <img src="../logo/avatar.jpg" width="30">
                        <div class="mesage-box">
                          <div class="message">Cuối c</div><br>
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối c</div><br>
                            <div class="message">Cuối cùng</div><br>
                            
                        </div>
                    </div>
              </div>

              <div class="you">
                    <div class="chat-start">
                        <div class="mesage-box">
                            <div class="message">Cuối cùng chúng ta sẽ </div><br>
                            <div class="message">Cuối cùng chúng ta sẽ ráp mọi thứ lại với nhau thành một</div><br>
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối</div><br>
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối</div><br>
                            <div class="message">Cuối cùng</div><br>
                            <div class="message">Cuối</div><br>
                        </div>
                    </div>
              </div>



            </div>

            <div class="chat-choice" >
              <i class="fas fa-paperclip"></i>
              <input type="" name="" placeholder="Aa" id="messBox">
              <button class="trigger"><i class="fas fa-smile"></i></button>
              <i class="fas fa-paper-plane"></i>
            </div>

          </div>
          <div class="lsmh"></div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <style type="text/css">
        
      </style>
      <!-- Footer -->
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
  <script type="text/javascript" src="js/main.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {
    loadListChat();
});
const picker = new EmojiButton();
const trigger = document.querySelector('.trigger');
const mess = document.querySelector('#messBox');

trigger.addEventListener('click', () => {
    picker.pickerVisible ? picker.hidePicker() : picker.showPicker(trigger);
 });

picker.on('emoji', function(emoji) {
  mess.value +=emoji;
  // alert(emoji);
});

function loadMessage(obj){
  const img=obj.children[0].getAttribute('src');
  $('.user-name').attr('id',obj.getAttribute("conv_id"))
  $('.user-name').attr('psid',obj.getAttribute("psid"))
  $('.user-name>img').attr('src',img);
  $('.user-name>span').html(obj.children[1].children[0].innerHTML);
  $.ajax({
        url: 'chatlist.php',
        type: 'post',
        data: { conv_id: obj.getAttribute("conv_id") , src:img },
        dataType:"JSON",
       
        success: function(data){
            if(data.result!=""){
                  $('.chat-messages').html(data.result);
            }
            else 
                alert('Lỗi');
                  
            },
    });
}


 $('#messBox').on("keyup", function (event) {

        if (Number(event.which) == 13) {
            $.ajax({
              url: 'chatlist.php',
              type: 'post',
              data: { psid: $('.user-name').attr('psid') , message:$('#messBox').val()},
              dataType:"JSON",
              success: function(data){
                  if(data.result!=""){
                        $('#messBox').val('');
                        $.ajax({
                            url: 'chatlist.php',
                            type: 'post',
                            data: { conv_id:$('.user-name').attr('id')  , src:$('.user-name>img').attr('src') },
                            dataType:"JSON",
                           
                            success: function(data){
                                if(data.result!=""){
                                      $('.chat-messages').html(data.result);
                                }
                                else 
                                    alert('Lỗi'); 
                                },
                        });
                  }
                  else 
                      alert('Lỗi');
                        
                  },
          });
       }
}); 

</script>

  <!-- Biểu đồ doanh thu -->
  
</body>

</html>
