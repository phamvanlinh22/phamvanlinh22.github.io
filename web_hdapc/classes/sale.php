<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>

<?php

  class sale
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
    }
    
    public function showSale(){
      $query='SELECT *,DATE_FORMAT(dateStart, "%d/%m/%Y") AS dStart,DATE_FORMAT(dateEnd, "%d/%m/%Y") AS dEnd FROM sale';
        $result=$this->db->SELECt($query);
        if($result && mysqli_num_rows($result))
           return $result;
        else 
          return NULL;
    }

    public function showSale2(){
      $query='UPDATE sale set saleStatus="Đã kết thúc" where ';
        $result=$this->db->SELECt($query);
        if($result && mysqli_num_rows($result))
           return $result;
        else 
          return NULL;
    }

    public function kmDM($data){
      $saleName=mysqli_real_escape_string($this->db->link,$data['tenkm']);
      $danhmuc=mysqli_real_escape_string($this->db->link,$data['danhmuc']);
      $percent=mysqli_real_escape_string($this->db->link,$data['ptkm']);
      $ngaykt=mysqli_real_escape_string($this->db->link,$data['ngaykt']);


      if($saleName== "" || $danhmuc=="" || $ngaykt==""){
        return '<div class="tb">Chưa đủ thông tin</div>';
      }
      else{
        $query3="SELECT catName from category where catID=$danhmuc";
        $result3=$this->db->select($query3);
        $row=$result3->fetch_assoc();
        $catName=$row['catName'];

      $query="INSERT into sale(saleName,pdSale,percent,dateStart,dateEnd) values('$saleName','$catName',$percent,now(),'$ngaykt')";
      $result=$this->db->insert($query);

      $query5="SELECT saleID from sale where saleName='$saleName'";
        $result5=$this->db->select($query5);
        $row=$result5->fetch_assoc();
        $saleID=$row['saleID'];

      $query2="UPDATE product set sale=$percent where catID=$danhmuc";      
      $result2=$this->db->update($query2);

      $query4='CREATE EVENT check_km'.$saleID.'
      on SCHEDULE EVERY 24 DAY_HOUR
      STARTS CURRENT_TIMESTAMP 
      ENDS  "'.$ngaykt.' "
      DO
        UPDATE product set sale=0 where catID=$danhmuc and  CAST(now() AS DATE) >= dateEnd; ';
      $result4=$this->db->insert($query4);

        if($result && $result2 && $result4)
          return '<div class="tc">Tạo thành công </div>';
        else
          return '<div class="tb">Tạo thất bại</div>';
      }
    }

    public function kmSP($data){
      $saleName=mysqli_real_escape_string($this->db->link,$data['tenkm']);
      $sanpham=mysqli_real_escape_string($this->db->link,$data['sanpham']);
      $percent=mysqli_real_escape_string($this->db->link,$data['ptkm']);
      $ngaykt=mysqli_real_escape_string($this->db->link,$data['ngaykt']);


      if($saleName== "" || $sanpham=="" || $ngaykt==""){
        return '<div class="tb">Chưa đủ thông tin</div>';
      }
      else{
        $pd=explode('-',$sanpham);
        $leng=sizeof($pd);
        unset($pd[$leng-1]);

      $query="INSERT into sale(saleName,pdSale,percent,dateStart,dateEnd) values('$saleName','$sanpham',$percent,now(),'$ngaykt')";
      $result=$this->db->insert($query);

      $query5="SELECT saleID from sale where saleName='$saleName'";
        $result5=$this->db->select($query5);
        $row=$result5->fetch_assoc();
        $saleID=$row['saleID'];


      $query6="UPDATE product set sale=0 where ";
      $query2="UPDATE product set sale=$percent where ";      
      for($i=0;$i<sizeof($pd);$i++){
        $item=$pd[$i];
        if($i != sizeof($pd)-1){
          $query2.=" productName='$item' or ";
          $query6.=" productName='$item' or ";
        }
        else{
          $query2.=" productName='$item' ";
          $query6.=" productName='$item' ";
        }
      }

      $result2=$this->db->update($query2);

      $query4='CREATE EVENT check_km'.$saleID.'
      on SCHEDULE EVERY 24 DAY_HOUR
      STARTS CURRENT_TIMESTAMP 
      ENDS  "'.$ngaykt.' "
      DO
        '.$query6.'  and  CAST(now() AS DATE) >= dateEnd; ';
      $result4=$this->db->insert($query4);

        if($result && $result2 && $result4)
          return '<div class="tc">Tạo thành công </div>';
        else
          return '<div class="tb">Tạo thất bại</div>';
      }
    }

    public function kmTH($data){
      $saleName=mysqli_real_escape_string($this->db->link,$data['tenkm']);
      $thuonghieu=mysqli_real_escape_string($this->db->link,$data['thuonghieu']);
      $percent=mysqli_real_escape_string($this->db->link,$data['ptkm']);
      $ngaykt=mysqli_real_escape_string($this->db->link,$data['ngaykt']);


      if($saleName== "" || $thuonghieu=="" || $ngaykt==""){
        return '<div class="tb">Chưa đủ thông tin</div>';
      }
      else{
        $query3="SELECT brandName from brand where brandID=$thuonghieu";
        $result3=$this->db->select($query3);
        $row=$result3->fetch_assoc();
        $brandName=$row['brandName'];

      $query="INSERT into sale(saleName,pdSale,percent,dateStart,dateEnd) values('$saleName','$brandName',$percent,now(),'$ngaykt')";
      $result=$this->db->insert($query);

      $query5="SELECT saleID from sale where saleName='$saleName'";
        $result5=$this->db->select($query5);
        $row=$result5->fetch_assoc();
        $saleID=$row['saleID'];

      $query2="UPDATE product set sale=$percent where brandID=$thuonghieu";      
      $result2=$this->db->update($query2);

      $query4='CREATE EVENT check_km'.$saleID.'
      on SCHEDULE EVERY 24 DAY_HOUR
      STARTS CURRENT_TIMESTAMP 
      ENDS  "'.$ngaykt.' "
      DO
        UPDATE product set sale=0 where brandID=$thuonghieu and  CAST(now() AS DATE) >= dateEnd; ';
      $result4=$this->db->insert($query4);

        if($result && $result2 && $result4)
          return '<div class="tc">Tạo thành công </div>';
        else
          return '<div class="tb">Tạo thất bại</div>';
      }
    }
    

}
?>