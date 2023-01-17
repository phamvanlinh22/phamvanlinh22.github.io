<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
   include_once 'cart.php';
   $cart=new cart();
?>

<?php

  class order
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
    }
    
    public function addOrder($data,$type){
      $odID = 'hda';
    for($i = 0; $i < 8; $i++) {
        $odID .= mt_rand(0, 9);
    }
      $address=mysqli_real_escape_string($this->db->link,$data['address']);
      $ctName=mysqli_real_escape_string($this->db->link,$data['ctname']);
      $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
      $gmail=mysqli_real_escape_string($this->db->link,$data['gmail']);
      $note=mysqli_real_escape_string($this->db->link,$data['note']);
      $shipfee=mysqli_real_escape_string($this->db->link,$data['shipfee']);
      $tinh=mysqli_real_escape_string($this->db->link,$data['city']);
      $huyen=mysqli_real_escape_string($this->db->link,$data['district']);
      $xa=mysqli_real_escape_string($this->db->link,$data['ward']);
      $tranport=mysqli_real_escape_string($this->db->link,$data['tranport']);

      $name_kh=explode(" ", $ctName);
      $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

      $dcvd=$tinh.'-'.$huyen.'-'.$xa.'-'.$tranport;
      $tt=Session::get('tt_price');
      $sID=session_id();


      if($phone!=""){
          $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 0,
                CURLOPT_URL => 'http://apilayer.net/api/validate?access_key=042a636e95c63bc29c025c58eaafada6&number='.$phone.'&country_code=VN&format=1',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            ));

            $resp = curl_exec($curl);
            curl_close($curl);
            $res=json_decode($resp,true);
            if($res['valid']==0){
              $alert ='toastr["error"]("Số điện thoại không tồn tại","Error !",);  ';
               return $alert;
            }
      }
      if($gmail!=""){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 0,
                CURLOPT_URL => 'http://apilayer.net/api/check?access_key=2a07c2acfc8efc6bb27bf1c59c49f9da&email='.$gmail.'&smtp=1&format=1',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            ));

            $resp = curl_exec($curl);
            curl_close($curl);
            $res=json_decode($resp,true);

            if(!isset($res['smtp_check'])){
              $alert ='toastr["error"]("Gmail không tồn tại","Error !",);  ';
              return $alert;
            }
            elseif($res['domain']!="gmail.com" && $res['domain']!="student.vlute.edu.vn"){
              $alert ='toastr["error"]("Gmail sai định dạng","Error !",);  ';
              return $alert;
            }
            elseif($res['smtp_check']!=1 || $res['format_valid']!=1 || $res['did_you_mean']!=""){
              $alert ='toastr["error"]("Gmail không tồn tại","Error !",);  ';
              return $alert;
            }

          }
            


      $query7="SELECT * from cart where sid='$sID'";
      $result7=$this->db->SELECT($query7);
      if($result7!=NULL){
      while($item7=$result7->fetch_assoc())
          {
            $pdID2=$item7['pdID'];
            $pdNamee=$item7['pdName'];
            $sol=$item7['sol'];

            $query5="SELECT * from product where productID='$pdID2' ";
            $result5=$this->db->SELECt($query5);
            $pdd=$result5->fetch_assoc();
            $tonkho=$pdd['amount'];

            if(intval($tonkho)<intval($sol)){
              return 'toastr["warning"]("'.$pdNamee.' còn '.$tonkho.' sản phẩm","Warning !",);';
            }
            
         }
          }



      if(Session::get('user_login')==true)
        $check=1;
      else
        $check=0;

    if($address=="" || $ctName=="" || $phone=="" || $odID=="" || $tt=="" || $sID==""||$gmail=="")
      {
        $alert ='toastr["error"]("Phải điền đủ thông tin","Error !",);  ';
        return $alert;
      
      }

      elseif(preg_match( '/\d/', $ctName )==1){
            $alert ='toastr["error"]("Họ tên không chứa số","Error !",);  ';
              return $alert;
      }
      elseif(sizeof($name_kh)<2){
            $alert ='toastr["error"]("Họ tên ít nhất 2 kí tự","Error !",);  ';
              return $alert;
      }
      // elseif(preg_match('/[^a-zA-Z\d]/',$ctName)==1){
      //       $alert ='toastr["error"]("Họ tên không chứa kí tự đặc biệt","Error !",);  ';
      //         return $alert;
      // }
      elseif(strlen($ctName)>50){
            $alert ='toastr["error"]("Họ tên tối đa","Error !",);  ';
              return $alert;
      }
      elseif(strlen($address)>100){
            $alert ='toastr["error"]("Địa chỉ tối đa 100 kí tự","Error !",);  ';
              return $alert;
      }
      else
      {
      if($type==1){
        $dcvd=$dcvd.'-1';
          $query="INSERT INTO orderr VALUES ('$odID','$ctName','$phone','$address','$gmail',now(),$tt,$shipfee,'Đã chuyển khoản','$note','$dcvd')";
        }

      else
          $query="INSERT INTO orderr VALUES ('$odID','$ctName','$phone','$address','$gmail',now(),$tt,$shipfee,'Chờ xác nhận','$note','$dcvd')";
        
      $result=$this->db->insert($query);
      


      $query2="SELECT * from cart where sid='$sID'";
      $result2=$this->db->SELECT($query2);
      $dem=0;
      $count=mysqli_num_rows($result2);

      while($item=$result2->fetch_assoc())
          {
            $pdID=$item['pdID'];
            $pdname=$item['pdName'];
            $image=$item['pdImage'];
            $sol=$item['sol'];
            $price=$item['price'];

            $query5="SELECT * from product where productID='$pdID' ";
            $result5=$this->db->SELECt($query5);
            $pdd=$result5->fetch_assoc();
            $tonkho=$pdd['amount'];

            if(intval($tonkho)<=intval($sol)){
              $query4="UPDATE product set amount=0 , status='Hết hàng' where productID=$pdID";
              $result4=$this->db->update($query4);
            }
            else{
              $query4="UPDATE product set amount=amount-$sol where productID=$pdID";
              $result4=$this->db->update($query4);
            }


            $query3="INSERT INTO order_info(odID,pdID,pdName,pdImage,sol,price) VALUES ('$odID',$pdID,'$pdname','$image',$sol,$price)";
            $result3=$this->db->insert($query3);
            if($result3)
              $dem++;
         }
      

      if($result && $count==$dem){
                Session::set('odID',$odID);
                 
                header('Location:success.php');
            }
      else
            {
                header('Location:index.php');
            } 
      }
    }





    public function showOrder($odID){
      $query="SELECT * from orderr where odID='$odID'";
        $result=$this->db->SELECt($query);
      if(isset($result))
           return $result;
        else 
          return NULL;
    }

    public function showOdInfo($odID){
      $query="SELECT * from order_info where odID='$odID'";
        $result=$this->db->SELECt($query);
      if(isset($result))
           return $result;
        else 
          return NULL;
    }


    public function showAllOrder(){
      $query="SELECT * from orderr order by dateorder desc ";
        $result=$this->db->SELECt($query);
      if(isset($result))
           return $result;
        else 
          return NULL;
    }

    public function showAllOrder2(){
        $pdonPage=10;
      if(!isset($_GET['page']))
          $page=1;
      else
        $page=$_GET['page'];

        $vt=($page-1)*$pdonPage;
      $query="SELECT * from orderr order by dateorder desc  LIMIT $vt,$pdonPage";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function timkiem($key){
      $pdonPage=10;
      if(!isset($_GET['page']))
          $page=1;
      else
        $page=$_GET['page'];

        $vt=($page-1)*$pdonPage;
      $query="SELECT * from orderr where odID like '%$key%' or ctName like '%$key%' or address like '%$key%'  or gmail like '%$key%' or phone like '%$key%' LIMIT $vt,$pdonPage";
        $result=$this->db->SELECt($query);
      if($result!=NULL) 
        return $result;
      else
        return NULL;
    }

    public function countTimkiem($key){

       $query="SELECT * from orderr where odID like '%$key%' or ctName like '%$key%' or gmail like '%$key%' or phone like '%$key%' ";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function showUnconfimred(){
      $query="SELECT * from orderr where status='Chờ xác nhận' or status='Đã chuyển khoản' order by dateorder desc";
        $result=$this->db->SELECt($query);
      if($result && mysqli_num_rows($result))
           return $result;
        else 
          return NULL;
    }

    public function confirmOd($id){
      
      $str='"products": [';

        $query2="SELECT * from order_info where odID='$id'";
        $result2=$this->db->update($query2);
        $dem=mysqli_num_rows($result2);
        $i=0;
        while($item=$result2->fetch_assoc()){
          $i++;
          $idpd=$item['pdID'];
          $query3="SELECT * from product where productID=$idpd";
           $result3=$this->db->update($query3);
           $sanpham=$result3->fetch_assoc();
           $tl=floatval($sanpham['weight'])/1000;
           if($i<$dem)
            $str.='{ 
              "name":"'.$item['pdName'].'",
              "weight":'.$tl.',
              "quantity":'.$item['sol'].'  
            },';
            else
              $str.='{ 
              "name":"'.$item['pdName'].'",
              "weight":'.$tl.',
              "quantity":'.$item['sol'].'  
            }';
        }
        $str.='],';
        $odd='"'.$id.'"';

        $query3="SELECT * from orderr where odID='$id'";
        $result3=$this->db->update($query3);
        $od_if=$result3->fetch_assoc();
        $sdt='"'.$od_if['phone'].'"';
        $diachi='"'.$od_if['address'].'"';
        $dcc=$od_if['mavd'];
        $dcvd=explode('-',$dcc);
        $free='"0"';
        $cod=0;
        if(sizeof($dcvd)==5){
            $free='"1"';
            $cod=0;
        }
        else{
          $cod=intval($od_if['price']+intval($od_if['shipfee']));
        }

        $tinh='"'.$dcvd[0].'"';
        $huyen='"'.$dcvd[1].'"';
        $xa='"'.$dcvd[2].'"';
        $tranport='"'.$dcvd[3].'"';
        $ngay='"'.date("Y-m-d").'"';

         $orderrr = <<<HTTP_BODY
        {
            $str
            "order": {
                "id": $odd,
                "pick_name": "HDA Order",
                "pick_address": "Đinh Tiên Hoàng",
                "pick_province": "Vĩnh Long",
                "pick_district": "Thành phố Vĩnh Long",
                "pick_ward": "P8",
                "pick_tel": "0368877443",
                "tel": $sdt,
                "name": "GHTK - VinhLong",
                "address": $diachi,
                "province": $tinh,
                "district": $huyen,
                "ward": $xa,
                "hamlet": "Khác",
                "is_freeship": $free,
                "pick_date": $ngay,
                "pick_money": $cod,
                "note": "",
                "value": "10000",
                "transport": $tranport
            }
        }
        HTTP_BODY;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/order",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $orderrr,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: 619e0d588C37a33Ae36e35a22582e845a7f773C5",
                "Content-Length: " . strlen($orderrr),
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($response, true);
        if($res['success']==1){
          $oddd=$res['order'];
          $mavd=$oddd['label'];
        $query="UPDATE orderr set status='Đang vận chuyển',mavd='$mavd' where odID='$id'";
        $result=$this->db->update($query);
        if($result!=NULL){
          return 1;
          }
        else
          return 0;
        }

        
        else
          return $res['message'];

    }

    public function finishOd($id){
      $query="UPDATE orderr set status='Đã thanh toán' where odID='$id'";
        $result=$this->db->update($query);
      // $query2="SELECT * from order_info where odID='$id'";
      // $dem=0;
      // $result2=$this->db->SELECT($query2);
      // if(isset($result2)){
      //   $count=mysqli_num_rows($result2);
      //   while ($item=$result2->fetch_assoc()) {
      //     $pdID=$item['pdID'];
      //     $query3="UPDATE product set sold=sold+1 ,amount=amount-1 where productID=$pdID";
      //       $result3=$this->db->update($query3);
      //       if($result3)
      //           $dem++;
      //   }
      // }

        // $str='"products": [{
        //         "name": "bút",
        //         "weight": 0.1,
        //         "quantity": 1
        //     }, {
        //         "name": "tẩy",
        //         "weight": 0.2,
        //         "quantity": 1
        //     }],';

        
      if(isset($result)){
          header("Location:listorder.php");
      }
        else 
          header("Location:index.php");
    }


    public function endOD($id){

      $query="UPDATE orderr set status='Không nhận hàng' where odID='$id'";
        $result=$this->db->update($query);

      $query2="SELECT * from order_info where odID='$id'";
      $result2=$this->db->SELECT($query2);
      $dem=0;
      $count=mysqli_num_rows($result2);

      while($item=$result2->fetch_assoc())
          {
            $pdID=$item['pdID'];
            $sol=$item['sol'];

            $query4="UPDATE product set amount=amount+$sol where productID=$pdID";
            $result4=$this->db->update($query4);
            if($query4!=NULL)
              $dem++;
         }

      $query3="SELECT * from orderr where odID='$id'";
      $result3=$this->db->select($query3);
      $nnn=$result3->fetch_assoc();

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/cancel/".$nnn['mavd'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPHEADER => array(
            "Token: 619e0d588C37a33Ae36e35a22582e845a7f773C5",
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $res=json_decode($response,true);
    $kq=$res['success'];

      if($result && $dem==$count && $kq==1){
          header("Location:listorder.php");
      }
        else 
          header("Location:listorder.php");
    }

    public function deleteOd2($id){
      $query="DELETE from orderr where odID='$id' ";
      $result=$this->db->delete($query);
      $query2="DELETE from order_info where odID='$id'";
      $result2=$this->db->delete($query2);
      // if(isset($result) and isset($result2)){
      if($result!=null && $result2!=null){
          header("Location:listorder.php");
      }
        else 
          header("Location:listorder.php");
    }

    public function doanhthutrongthang(){
      $month=date('m');
      $query="SELECT SUM(price) as doanhthu from orderr WHERE month(dateorder)=$month and status='Đã thanh toán'";
      $result=$this->db->SELECT($query);
      $kt=$result->fetch_assoc();
      if($kt['doanhthu']!=NULL){
        return $kt['doanhthu'];
      }
      else
        return NULL;
    }
    
    public function doanhthuhomnay(){
      $day=date('d');
      $month=date('m');
      $query="SELECT SUM(price) as doanhthu from orderr WHERE day(dateorder)=DAY(CURDATE()) and month(dateorder)=$month and status='Đã thanh toán'";
   
      $result=$this->db->SELECT($query);
      $kt=$result->fetch_assoc();
      if($kt['doanhthu']!=NULL){
        return $kt['doanhthu'];
      }
      else
        return NULL;
    }

    public function donhangHomnay(){
      $day=date('d');
      $month=date('m');
      $query="SELECT count(*) as sol from orderr WHERE day(dateorder)=DAY(CURDATE()) and month(dateorder)=$month and status='Đã thanh toán'";
      $result=$this->db->SELECT($query);
      $sl=$result->fetch_assoc();
      if($sl['sol']){
        return $sl['sol'];
      }

    }

    public function dathanhtoan(){
      $query="SELECT count(*) as sol from orderr WHERE status='Đã thanh toán'";
      $result=$this->db->SELECT($query);
      $kt=$result->fetch_assoc();
      if($kt['sol']!=0)
        return $kt['sol'];
      else
        return 0;
    }

    public function doanhthutungthang(){
      $query="SELECT SUM(price) AS doanhthu,month(dateorder)as thang from orderr WHERE status='Đã thanh toán' and year(dateorder)=2020 GROUP BY thang ";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function thongkedh(){
      $query="SELECT count(*) as soluong,status FROM orderr where status!='Chờ xác nhận' and status!='Đã chuyển khoản' GROUP BY status";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function countAllOrder(){
      $query="SELECT count(*) as sol FROM order_info ";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function countLaptopSold(){
      $query="SELECT count(*) as sol from (SELECT catID from product WHERE productID in (SELECT pdID from order_info) and catID=5) as dem";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function countPCSold(){
      $query="SELECT count(*) as sol from (SELECT catID from product WHERE productID in (SELECT pdID from order_info) and catID=6) as dem";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function countLKSold(){
      $query="SELECT count(*) as sol from (SELECT catID from product WHERE productID in (SELECT pdID from order_info) and catID BETWEEN 7 and 16) as dem";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function countGGSold(){
      $query="SELECT count(*) as sol from (SELECT catID from product WHERE productID in (SELECT pdID from order_info) and catID BETWEEN 17 and 20) as dem";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function countPKSold(){
      $query="SELECT count(*) as sol from (SELECT catID from product WHERE productID in (SELECT pdID from order_info) and catID BETWEEN 20 and 21) as dem";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function top5BrandSold(){
      $query="SELECT brandName,count(*) as sol from (SELECT brandID from product WHERE productID in (SELECT pdID from order_info)) as dem,brand WHERE brand.brandID=dem.brandID GROUP BY dem.brandID ORDER BY sol desc limit 5";
      $result=$this->db->SELECT($query);
      return $result;
    }

    public function showUserOrder(){
      $user=Session::get('user_name');
      $query="SELECT * from orderr where ctName='$user' order by dateorder desc ";
        $result=$this->db->SELECt($query);
      if($result)
        return $result;
      else
        return 0;
    }
}
?>