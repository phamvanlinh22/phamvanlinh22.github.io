<?php
   include'../lib/database.php';
   include '../helper/format.php';
   include '../lib/session.php';
   // session_start();
   spl_autoload_register(function($class){
      include_once "../classes/".$class.".php";
   });

   $db=new Database();
   $fm= new Format();
   $brand=new brand();
   $cart=new cart();
   $order=new order();
   $user=new user();
   $cat=new category();
   $product=new product();
?>
<?php
   $query="SELECT * from orderr where status='Chờ xác nhận' or status='Đã chuyển khoản' order by dateorder desc";
   $an=$product->getProduct($query);
   $res='<h6 class="dropdown-header">
                  Thông báo
                </h6>';
   

                $i=0;
                if($an!=NULL){
                  $data['sl']=mysqli_num_rows($an);
                  while ($result=$an->fetch_assoc()){
                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                  
                $res.='
                <a class="dropdown-item d-flex align-items-center" href="orderinfo.php?odID='.$result['odID'].'">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary order_color'.$i.'">
                      <style type="text/css">
                        .order_color'.$i.'{
                          background-color: '.$color.' !important;
                        }
                      </style>
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">'.$result['dateorder'].'
                    </div>
                    <span class="font-weight-bold">
                     '.$result['ctName'].' đã đặt hàng
                    </span>
                  </div>
                </a>';
        
                  $i++;
               }
                }
   $res.='<a class="dropdown-item text-center small text-gray-500" href="listorder.php">Tất cả đơn hàng</a>';
   $data['res']=$res;
 
   echo  json_encode($data);
?>