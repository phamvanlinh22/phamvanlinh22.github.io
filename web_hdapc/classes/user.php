<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>
<?php

  class user
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
    }

   public function insert_user($data)
    {
      $name=mysqli_real_escape_string($this->db->link,$data['name']);
      $user=mysqli_real_escape_string($this->db->link,$data['user']);
      $password=mysqli_real_escape_string($this->db->link,$data['password']);
      $gmail=mysqli_real_escape_string($this->db->link,$data['gmail']);
      $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
      $address=mysqli_real_escape_string($this->db->link,$data['address']);
      $tinh=mysqli_real_escape_string($this->db->link,$data['tinh']);

      $name_ck=explode(" ", $name);
      $a=preg_replace('/\s+/', '',$name);
      $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';


      

      // $country=mysqli_real_escape_string($this->db->link,$data['country']);

      //Kiem tra hinh anh va lay hinh anh cho vao foder upload
      $checkuser="SELECT * from customer where user='$user'";
        $resultU=$this->db->SELECt($checkuser);
      $checkgmail="SELECT * from customer where gmail='$gmail'";
      $resultG=$this->db->SELECt($checkgmail);


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

          }
            if(!isset($res['smtp_check'])){
              $alert ="<div class='tb'> Email không tồn tại </div>";
              return $alert;
            }
            elseif($res['domain']!="gmail.com" && $res['domain']!="student.vlute.edu.vn"){
              $alert ="<div class='tb'> Gmail sai định dạng</div>";
              return $alert;
            }
            elseif($res['smtp_check']!=1 || $res['format_valid']!=1 || $res['did_you_mean']!=""){
              $alert ="<div class='tb'> Email không tồn tại </div>";
              return $alert;
            }

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
              $alert ="<div class='tb'> Số điện thoại không tồn tại </div>";
               return $alert;
            }
      }

      $checkphone="SELECT * from customer where phone='$phone'";
          $resultP=$this->db->SELECt($checkphone);

        if(sizeof($name_ck)<2){
            $alert ="<div class='tb'> Họ tên ít nhất 2 từ </div>";
              return $alert;
          }
          // elseif(!filter_var($gmail, FILTER_VALIDATE_EMAIL)){
          //   $alert ="<div class='tb'> Gmail không hợp lệ </div>";
          //     return $alert;
          // }
          
              //else{
            //   $alert ="<div class='tb'> Email tồn tại </div>";
            //   return $alert;
            // }
            
      
          elseif(preg_match( '/\d/', $name )==1){
            $alert ="<div class='tb'> Họ tên không chứa số </div>";
              return $alert;
          }
          elseif(preg_match($pattern,$a)==1){
            $alert ="<div class='tb'> Họ tên không chứa kí tự đặc biệt </div>";
              return $alert;
          }

          elseif(preg_match('/[^a-zA-Z\d]/',$user)==1){
            $alert ="<div class='tb'> Tên đăng nhập không chứa kí tự đặc biệt </div>";
              return $alert;
          }
          elseif(strlen($user)<4){
            $alert ="<div class='tb'> Tên đăng nhập ít nhất 4 kí tự </div>";
              return $alert;
          }
          elseif(strlen($password)<6){
            $alert ="<div class='tb'> Mật khẩu ít nhất 6 kí tự </div>";
              return $alert;
          }
          elseif(preg_match('/[^a-zA-Z\d]/',$password)==1){
            $alert ="<div class='tb'> Mật khẩu không chứa kí tự đặc biệt </div>";
              return $alert;
          }
          
          // elseif(preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$phone)==0){
          //   $alert ="<div class='tb'> Số điện thoại không hợp lệ </div>";
          //     return $alert;
          // }
          elseif($resultU!=NULL){
            $alert ="<div class='tb'> User đã tồn tại,hãy thử bằng tên khác. </div>";
              return $alert;
          }
           elseif($resultG!=NULL){
            $alert ="<div class='tb'> Gmail đã tồn tại,hãy dùng gmail khác. </div>";
              return $alert;
          }
          elseif($resultP!=NULL){
            $alert ="<div class='tb'> Số điện thoại đã được đăng ký,hãy dùng số khác. </div>";
              return $alert;
          }

          else{
    
      if($name=="" || $user=="" || $password=="" || $gmail=="" || $phone=="" || $address==""|| $tinh=="")
      {
        $alert ="<div class='tb'> Phải điền đủ thông tin </div>";
        return $alert;
      
      }
      else
      {
        $password=md5($password);
        $query="INSERT INTO customer(ctName,address,gmail,city,phone,user,password) VALUES ('$name','$address','$gmail','$tinh','$phone','$user','$password')";
        $result=$this->db->insert($query);
        if($result)
        {
          $alert ="<div class=' tc'> Bạn đã đăng ký thành công.Hãy thử <a href='dangnhap.php'>đăng nhập </a>tại đây </div>";
          return $alert;
        }else
        {
            $alert ="<div class='tb'> Không thể thực hiện</div>";
          return $alert;
        }

          }

      }
    }

    public function login_user($data)
    {
      $user=mysqli_real_escape_string($this->db->link,$data['user']);
      $pass=mysqli_real_escape_string($this->db->link,$data['password']);
      $password=md5($pass);

      if($user=="" )
      {
        $alert ="<div class='tb empty1'> Chưa nhập tài khoản </div>";
        return $alert;
      
      }
      elseif($pass==""){ 
          $alert ="<div class='tb empty2'> Chưa nhập mật khẩu </div>";
        return $alert;
      }
      else
      {
        $query="SELECT * from customer where user='$user' and password='$password' LIMIT 1";
          $result=$this->db->select($query);
        if($result)
        {
          $info=$result->fetch_assoc();
          Session::set('user_login',true);
          Session::set('user_id',$info['ctID']);
          Session::set('user_name',$info['ctName']);
          Session::set('user',$info['user']);
          Session::set('address',$info['address']);
          Session::set('phone',$info['phone']);
          Session::set('city',$info['city']);
          Session::set('gmail',$info['gmail']);
          header("Location:index.php");
        }else
        {
            $alert ="<div class='tb dnnd'> Tài khoản hoặc mật khẩu không chính xác </div>";
          return $alert;
        }

          }

      }
    public function showUserInfo(){
      $ctid= Session::get('user_id');
      $query="SELECT * from customer where ctID=$ctid ";
        $result=$this->db->SELECt($query);
      if(isset($result))
           return $result;
        else 
          return NULL;
    }

    public function getUser($username){
      $query="SELECT * from customer where user='$username' ";
        $result=$this->db->SELECt($query);
      if(isset($result))
           return $result;
        else 
          return NULL;
    }

    public function changePass(){
      // $pass2=md5($pass);
      $query="UPDATE customer set password='ab3w33c' where user='dangtruong'";
      $result=$this->db->update($query);
      if($result)
           return $result;
        else 
          return NULL;
    }

    public function getProvince(){
      $query="SELECT * from province order by name asc";
        $result=$this->db->SELECt($query);
      if($result)
           return $result;
        else 
          return NULL;
    }



    public function getDistrict($province){
      // if($province!=""){
      $query2="SELECT * from province where name='$province'";
      $result2=$this->db->select($query2);
      $id_pv=$result2->fetch_assoc();
      $id=$id_pv['id'];

      $query="SELECT * from district where province_id='$id'";
    // }
    // else{
    //   $query="SELECT * from district";
    // }
        $result=$this->db->SELECt($query);
      if($result)
           return $result;
        else 
          return NULL;
    }

    public function getWard($district){
      // if($province!=""){
      $query2="SELECT * from district where name='$district'";
      $result2=$this->db->select($query2);
      $id_pv=$result2->fetch_assoc();
      $id=$id_pv['id'];

      $query="SELECT * from ward where district_id='$id'";
    // }
    // else{
    //   $query="SELECT * from district";
    // }
        $result=$this->db->SELECt($query);
      if($result)
           return $result;
        else 
          return NULL;
    }



    public function update_user($data)
    {
      $name=mysqli_real_escape_string($this->db->link,$data['name']);
      $user=mysqli_real_escape_string($this->db->link,$data['user']);

      $password=mysqli_real_escape_string($this->db->link,$data['password']);
      $gmail=mysqli_real_escape_string($this->db->link,$data['gmail']);
      $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
      $address=mysqli_real_escape_string($this->db->link,$data['address']);
      $tinh=mysqli_real_escape_string($this->db->link,$data['tinh']);

      $old_gmail=Session::get('gmail');
      $old_user=Session::get('user');
      $old_phone=Session::get('phone');

      $id=Session::get('user_id');

      $name_ck=explode(" ", $name);
      $a=preg_replace('/\s+/', '',$name);
      $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

      $queryy="SELECT * from customer where ctID=$id and password='$password'";
      $resulttt=$this->db->SELECt($queryy);
        
        if($resulttt==null){
          $password=md5($password);
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

          }
            if(!isset($res['smtp_check'])){
              $alert ="<div class='tb'> Email không tồn tại </div>";
              return $alert;
            }
            elseif($res['domain']!="gmail.com" && $res['domain']!="student.vlute.edu.vn"){
              $alert ="<div class='tb'> Email sai định dạng </div>";
              return $alert;
            }
            elseif($res['smtp_check']!=1 || $res['format_valid']!=1 || $res['did_you_mean']!=""){
              $alert ="<div class='tb'> Email không tồn tại </div>";
              return $alert;
            }

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
          
      //Kiem tra hinh anh va lay hinh anh cho vao foder upload
      $checkuser="SELECT * from customer where user='$user' and user!='$old_user'";
        $resultU=$this->db->SELECt($checkuser);
      $checkgmail="SELECT * from customer where gmail='$gmail' and gmail!='$old_gmail'";
        $resultG=$this->db->SELECt($checkgmail);
      $checkphone="SELECT * from customer where phone='$phone' and phone !='$old_phone'";
          $resultP=$this->db->SELECt($checkphone);
          if($resultU and mysqli_num_rows($resultU) >0){
            $alert ="<div class='tb'> User đã tồn tại,hãy thử bằng tên khác. </div>";
              return $alert;
          }
           elseif($resultG!=NULL){
            $alert ="<div class='tb'> Gmail đã tồn tại,hãy dùng gmail khác. </div>";
              return $alert;
          }
          elseif($resultP!=NULL){
            $alert ="<div class='tb'> Số điện thoại đã được đăng ký,hãy dùng số khác. </div>";
              return $alert;
          }
          if(sizeof($name_ck)<2){
            $alert ="<div class='tb'> Họ tên ít nhất 2 từ </div>";
              return $alert;
          }
          // elseif(!filter_var($gmail, FILTER_VALIDATE_EMAIL)){
          //   $alert ="<div class='tb'> Gmail không hợp lệ </div>";
          //     return $alert;
          // }
          
              //else{
            //   $alert ="<div class='tb'> Email tồn tại </div>";
            //   return $alert;
            // }
            
      
          elseif(preg_match( '/\d/', $name )==1){
            $alert ="<div class='tb'> Họ tên không chứa số </div>";
              return $alert;
          }
          elseif(preg_match($pattern,$a)==1){
            $alert ="<div class='tb'> Họ tên không chứa kí tự đặc biệt </div>";
              return $alert;
          }

          elseif(preg_match('/[^a-zA-Z\d]/',$user)==1){
            $alert ="<div class='tb'> Tên đăng nhập không chứa kí tự đặc biệt </div>";
              return $alert;
          }
          elseif(strlen($user)<4){
            $alert ="<div class='tb'> Tên đăng nhập ít nhất 4 kí tự </div>";
              return $alert;
          }
          elseif(strlen($password)<6){
            $alert ="<div class='tb'> Mật khẩu ít nhất 6 kí tự </div>";
              return $alert;
          }
          elseif(preg_match('/[^a-zA-Z\d]/',$password)==1){
            $alert ="<div class='tb'> Mật khẩu không chứa kí tự đặc biệt </div>";
              return $alert;
          }
          
          elseif(preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$phone)==0){
            $alert ="<div class='tb'> Số điện thoại không hợp lệ </div>";
              return $alert;
          }
          elseif($resultU!=NULL){
            $alert ="<div class='tb'> User đã tồn tại,hãy thử bằng tên khác. </div>";
              return $alert;
          }
           elseif($resultG!=NULL){
            $alert ="<div class='tb'> Gmail đã tồn tại,hãy dùng gmail khác. </div>";
              return $alert;
          }
          elseif($resultP!=NULL){
            $alert ="<div class='tb'> Số điện thoại đã được đăng ký,hãy dùng số khác. </div>";
              return $alert;
          }

          else{
    
      if($name=="" || $user=="" || $password=="" || $gmail=="" || $phone=="" || $address==""|| $tinh=="")
      {
        $alert ="<div class='tb'> Phải điền đủ thông tin </div>";
        return $alert;
      
      }
      else
      {
        $query="UPDATE customer set ctName='$name',address='$address',gmail='$gmail', city='$tinh', phone='$phone', user='$user',password='$password' where ctID=$id";
        $result=$this->db->update($query);
        if($result)
        {
          $alert ="<div class=' tc'> Cập nhật thành công </div>";
          Session::set('user_name',$name);
          Session::set('user',$user);
          Session::set('address',$address);
          Session::set('phone',$phone);
          Session::set('city',$tinh);
          Session::set('gmail',$gmail);
          return $alert;
        }else
        {
            $alert ="<div class='tb'> Không thể thực hiện</div>";
          return $alert;
        }

          }

      }
    }

  }
?>
