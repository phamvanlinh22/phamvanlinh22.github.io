<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>
<?php

  class brand
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
    }
    public function insert_brand($catName)
    {
      $catName=$this->fm->validation($catName);


      $catName=mysqli_real_escape_string($this->db->link,$catName);

      if(empty($catName) )
      {
        $alert ="<span class='notice'> Không được để trống </span>";

        return $alert;
      }
      else
      {
        $query="INSERT INTO brand(brandName) VALUES ('$catName')";
        $result=$this->db->insert($query);

        if($result)
        {
          $alert ="<span class='notice tc'> Thêm thành công </span>";
          return $alert;
        }else
        {

        }$alert ="<span class='notice'> Không thể thực hiện</span>";
          return $alert;

          

      }
    }

    public function insert_brand2($catName)
    {
      
      $query="INSERT INTO brand(brandName) VALUES ('$catName')";
      $result=$this->db->insert($query);

      if($result)
        return 1;
      return 0;
    }


    public function delBrandByID2($id){
      $query="DELETE from brand  where brandID=$id";
        $result=$this->db->delete($query);
      if($result !=false )
      {
        return 1;
      }
      else
      {
        return 0;
      }
    }


    public function show_brand(){
      $query="SELECT * from brand order by brandID asc";
        $result=$this->db->SELECt($query);
      return $result;
    }


    public function getBrandbyID($id){
      $query="SELECT * from brand where brandID=$id ";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function delbyID($id){
      $query="DELETE from brand  where brandID='$id'";
        $result=$this->db->delete($query);
      if($result !=false )
      {
        $alert ="<span class='tc del'> Xóa thành công </span>";
          return $alert;
      }
      else
      {
        $alert ="<span class='notice'> Không thể xóa</span>";
          return $alert;
      }
    }

    public function update_Brand2($catName,$id)
    {

      if(empty($catName))
      {
      }
      else
      {
        $query="UPDATE brand set brandName='$catName' where brandID='$id'";
        $result=$this->db->update($query);

        if($result != false)
        {
        
          return 1;
        }
        else{
          return 0;
        }

          

      }
    }

    public function update_brand($catName,$id)
    {
      $catName=$this->fm->validation($catName);

      $catName=mysqli_real_escape_string($this->db->link,$catName);
      $id=mysqli_real_escape_string($this->db->link,$id);

      if(empty($catName))
      {
        $alert ="<span class='ud-notice tb'>Không được để trống</span>";
        return $alert;
      }
      else
      {
        $query="UPDATE brand set brandName='$catName' where brandID='$id'";
        $result=$this->db->update($query);

        if($result != false)
        {
        
          $alert ="<span class='ud-notice tc'> Đã cập nhật</span>";
          return $alert;
        }
        else{
          $alert ="<span class='ud-notice tb'> Cập nhật thất bại </span>";
          return $alert;
        }

          

      }
    }

  }
?>