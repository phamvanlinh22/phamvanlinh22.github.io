<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>
<?php

  class product
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
    }
    public function insert_product($data,$files)
    {
      $pdName=mysqli_real_escape_string($this->db->link,$data['pdName']);
      $catID=mysqli_real_escape_string($this->db->link,$data['category']);
      $brandID=mysqli_real_escape_string($this->db->link,$data['brand']);
      $info=mysqli_real_escape_string($this->db->link,$data['desc']);
      $color=mysqli_real_escape_string($this->db->link,$data['color']);
      $bh=mysqli_real_escape_string($this->db->link,$data['bh']);
      $amount=mysqli_real_escape_string($this->db->link,$data['amount']);
      $sale=mysqli_real_escape_string($this->db->link,$data['sale']);
      $price=mysqli_real_escape_string($this->db->link,$data['price']);
      $new=mysqli_real_escape_string($this->db->link,$data['new']);

      //Kiem tra hinh anh va lay hinh anh cho vao foder upload
      $permited=array('jpg','jpeg','png','gif','wepb');
      $file_name=$_FILES['pdImage']['name'];
      $file_size=$_FILES['pdImage']['size'];
      $file_temp=$_FILES['pdImage']['tmp_name'];
      $div=explode('.', $file_name);
      $file_exit=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_exit;
      $upload_image="uploads/".$unique_image;
      //slider
      $slideCount=count($_FILES['file']['name']);
      $dem=0;
      if($slideCount>=6){
      for($i=0;$i<$slideCount;$i++)
      {
        $slideName=$_FILES['file']['name'][$i];
        $query="INSERT INTO product_slider(pdName,image) VALUES ('$pdName','$slideName')";
        $result2=$this->db->insert($query);
    
          if($result2){
            $dem++;
          }
          move_uploaded_file($_FILES['file']['tmp_name'][$i],"slider/".$slideName);
      }
    }
      else
        $dem=$slideCount;

      if($pdName=="" || $catID=="" || $brandID=="" || $info=="" || $amount=="" || $sale==""|| $price=="" ||$new==""||$file_name=="" || $bh=="")
      {
        $alert ="<span class='tb'> Phải điền đủ thông tin </span>";
        return $alert;
      
      }
      else
      {
        move_uploaded_file($file_temp, $upload_image);
        $query="INSERT INTO product(productName,catID,brandID,info,amount,color,sale,new,image,price,bh) VALUES ('$pdName',$catID,$brandID,'$info',$amount,'$color',$sale,$new,'$unique_image','$price',$bh)";
        $result=$this->db->insert($query);

        if($result && $dem==$slideCount)
        {
          $alert ="<span class=' tc'> Thêm thành công </span>";
          return $alert.$file_name;
        }else
        {
            $alert ="<span class='tb'> Không thể thực hiện</span>";
          return $alert;
        }

          

      }
    }

    public function show_pd(){
      $query="SELECT * from product ";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function show_pd2(){
      $query="SELECT * from product limit 13 ";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function showPD2($columns){
      $query="SELECT $ from product ";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getProductbyID($id){
      $query="SELECT * from product where productID='$id' ";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getProductbyName($id){
      $query="SELECT * from product where productName='$id' ";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getProductNew(){
      $query="SELECT * from product order by import_date desc limit 5";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getProductHot(){
      $query="SELECT * from product where sold>=15 limit 5 ";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getProductSale(){
      $query="SELECT * from product where sale!=0 limit 5";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getLaptopAsus(){
      $query="SELECT * from product where catID=5 and brandID=1 order by productID desc limit 5";
        $result=$this->db->SELECt($query);
      return $result;
    }
    public function getSlide($pdName){
      $query="SELECT * from product_slider  where pdName='$pdName'";
        $result=$this->db->SELECt($query);
        if(isset($result))
           return $result;
        else 
          return NULL;
    }
    public function getProductbyCat($id){
      $pdonPage=20;
      if(!isset($_GET['page']))
          $page=1;
      else
        $page=$_GET['page'];

        $vt=($page-1)*$pdonPage;
      $query="SELECT * from product where catID=$id LIMIT $vt,$pdonPage";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function getAll(){
      $pdonPage=20;
      if(!isset($_GET['page']))
          $page=1;
      else
        $page=$_GET['page'];

        $vt=($page-1)*$pdonPage;
      $query="SELECT * from product  LIMIT $vt,$pdonPage";
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
      $query="SELECT * from product where productName like '%$key%'  LIMIT $vt,$pdonPage";
        $result=$this->db->SELECt($query);
      if($result && mysqli_num_rows($result) >0) 
        return $result;
      else
        return NULL;
    }

    public function countTimkiem($key){

      $query="SELECT * from product where productName like '%$key%' ";
        $result=$this->db->SELECt($query);
      return $result;
    }

     public function getAll2(){
      $pdonPage=10;
      if(!isset($_GET['page']))
          $page=1;
      else
        $page=$_GET['page'];

        $vt=($page-1)*$pdonPage;
      $query="SELECT * from product  LIMIT $vt,$pdonPage";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function getLk(){
       $pdonPage=20;
      if(!isset($_GET['page']))
          $page=1;
      else
        $page=$_GET['page'];

        $vt=($page-1)*$pdonPage;
      $query="SELECT * from product where catID>=7 and catID<=15 LIMIT $vt,$pdonPage";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function getProduct($query){
        $result=$this->db->SELECt($query);
      if($result!=NULL)
           return $result;
        else 
          return NULL;
    }

    public function getLkPage(){
      $query="SELECT * from product where catID>=7 and catID<=15 ";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function search($key){
      $query="SELECT * from product where productName like '%$key%'";
        $result=$this->db->SELECt($query);
      if(isset($result))
           return $result;
        else 
          return NULL;
    }

    public function brand_filter($catid){
      if($catid=='all')
         $query="  SELECT distinct brandID from product ORDER by brandID ASC";
      elseif($catid=='lk')
          $query="  SELECT distinct brandID from product where catID>=7 and catID<=15 ORDER by brandID ASC";
      elseif($catid=='sale')
          $query="  SELECT distinct brandID from product where sale>0 ORDER by brandID ASC";
      elseif($catid=='new')
          $query="  SELECT distinct brandID from product where new>0 ORDER by brandID ASC";
      elseif($catid=='gg')
          $query="  SELECT distinct brandID from product where catID=17 or catID=18 or catID=19 ORDER by brandID ASC";  
      elseif($catid=='mbit')
          $query="  SELECT distinct brandID from product where note='mbit' ORDER by brandID ASC";
      elseif($catid=='ssdkt')
          $query="  SELECT distinct brandID from product where note='ssdkt' ORDER by brandID ASC";
      elseif($catid=='mbamd')
          $query="  SELECT distinct brandID from product where note='mbamd' ORDER by brandID ASC";
      elseif($catid=='8th')
          $query="  SELECT distinct brandID from product where note='8th' ORDER by brandID ASC";
      elseif($catid=='9th')
          $query="  SELECT distinct brandID from product where note='9th' ORDER by brandID ASC";
      elseif($catid=='10th')
          $query="  SELECT distinct brandID from product where note='10th' ORDER by brandID ASC";
      elseif($catid=='rz4')
          $query="  SELECT distinct brandID from product where note='rz4' ORDER by brandID ASC";
      elseif($catid=='rz3')
          $query="  SELECT distinct brandID from product where note='rz3' ORDER by brandID ASC";
      elseif($catid=='rzdp')
          $query="  SELECT distinct brandID from product where note='rzdp' ORDER by brandID ASC";
      elseif($catid=='ssdit')
          $query="  SELECT distinct brandID from product where note='ssdit' ORDER by brandID ASC";
      elseif($catid=='ssdss')
          $query="  SELECT distinct brandID from product where note='ssdss' ORDER by brandID ASC";
      elseif($catid=='psucs')
          $query="  SELECT distinct brandID from product where note='psusc' ORDER by brandID ASC";
      elseif($catid=='psuss')
          $query="  SELECT distinct brandID from product where note='psuss' ORDER by brandID ASC";
      elseif($catid=='psuas')
          $query="  SELECT distinct brandID from product where note='psuas' ORDER by brandID ASC";
      elseif($catid=='hddwd')
          $query="  SELECT distinct brandID from product where note='hddwd' ORDER by brandID ASC";
      elseif($catid=='hddsg')
          $query="  SELECT distinct brandID from product where note='hddsg' ORDER by brandID ASC";
      elseif($catid=='rgs')
          $query="  SELECT distinct brandID from product where catID=9 and brandID=25 ORDER by brandID ASC";
      elseif($catid=='rhpx')
          $query="  SELECT distinct brandID from product where catID=9 and brandID=26 ORDER by brandID ASC";
      elseif($catid=='rcs')
          $query="  SELECT distinct brandID from product where catID=9 and brandID=21 ORDER by brandID ASC";  
      elseif($catid=='hot')
          $query="  SELECT distinct brandID from product ORDER by brandID ASC";
      else
      $query="SELECT distinct brandID from product where catID=$catid ORDER by brandID ASC";;
        $result=$this->db->SELECt($query);
        if($result!=null)
          return $result;
        else
          return null;
    }



    public function getProductPage($id){
      $query="SELECT * from product where catID=$id";
        $result=$this->db->SELECt($query);
      return $result;
    }

    public function delbyID($id){
      $query="DELETE from product  where productID=$id";
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

    public function delbyID2($id){
      $query="SELECT * from product where productID=$id ";
      $pd=$this->db->SELECt($query);
      $result2=$pd->fetch_assoc();
      $img="uploads/".$result2['image'];
      if($result2['image']!="")
          unlink($img);
      $pdnamee=$result2['productName'];
      $query6="SELECT * from product_slider where pdName='$pdnamee'";
        $result6=$this->db->SELECt($query6);
        $ta=0;
        if($result6){
          while ($temp=$result6->fetch_assoc()) {
            $link="slider/".$temp['image'];
            unlink($link);
            $ta++;
          }
          $query3="DELETE from product_slider  where pdName='$pdnamee'";

        $result3=$this->db->delete($query3);
        }

      $query="DELETE from product  where productID=$id";

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

    

      public function formatMoney($number, $fractional=false) {  
          if ($fractional) {  
              $number = sprintf('%.2f', $number);  
          }  
          while (true) {  
              $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
              if ($replaced != $number) {  
                  $number = $replaced;  
              } else {  
                  break;  
              }  
          }  
          return $number;  
         }


         public function insert_product2($data,$files)
    {
      $pdName=mysqli_real_escape_string($this->db->link,$data['tensp']);
      $lh=mysqli_real_escape_string($this->db->link,$data['lh']);
      $th=mysqli_real_escape_string($this->db->link,$data['th']);
      $mota=mysqli_real_escape_string($this->db->link,$data['mota']);
      $color=mysqli_real_escape_string($this->db->link,$data['color']);
      $bh=mysqli_real_escape_string($this->db->link,$data['bh']);
      $amount=mysqli_real_escape_string($this->db->link,$data['tonkho']);
      $ghichu=mysqli_real_escape_string($this->db->link,$data['ghichu']);
      $gianhap=mysqli_real_escape_string($this->db->link,$data['gianhap']);
      $giaban=mysqli_real_escape_string($this->db->link,$data['giaban']);
      $w=mysqli_real_escape_string($this->db->link,$data['w']);
      $ngaynhap=mysqli_real_escape_string($this->db->link,$data['ngaynhap']);


      //Kiem tra hinh anh va lay hinh anh cho vao foder upload
      $permited=array('jpg','jpeg','png','gif','wepb');
      $file_name=$_FILES['files']['name'][0];
      $file_size=$_FILES['files']['size'][0];
      $file_temp=$_FILES['files']['tmp_name'][0];
      $div=explode('.', $file_name);
      $file_exit=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_exit;
      $upload_image="uploads/".$unique_image;
      // move_uploaded_file($file_temp, $upload_image);
      //slider
      $slideCount=count($_FILES['files']['name']);
      $dem=0;
      if($slideCount>=6){
      for($i=0;$i<6;$i++)
      {
        $slideName=$_FILES['files']['name'][$i];
        $query="INSERT INTO product_slider(pdName,image) VALUES ('$pdName','$slideName')";
        $result2=$this->db->insert($query);
 
          if($result2){
            $dem++;
          }
        if($i==0){
          move_uploaded_file($file_temp, $upload_image);
          copy($upload_image,"slider/".$slideName);
        }
        else
          move_uploaded_file($_FILES['files']['tmp_name'][$i],"slider/".$slideName);
        
      }
    }
      else{

        $dem=$slideCount;
        move_uploaded_file($file_temp, $upload_image);
        }

        $status="Đang kinh doanh";
        $sale=0;

        
        // $img_name=$_FILES['files']['name'][0];
        // move_uploaded_file($_FILES['files']['tmp_name'][0],"uploads/".$img_name);
        $query="INSERT INTO product(productName,catID,brandID,info,amount,color,image,sale,import_price,price,weight,bh,status,note,import_date) VALUES ('$pdName',$lh,$th,'$mota',$amount,'$color','$unique_image',$sale,$gianhap,$giaban,$w,$bh,'$status','$ghichu','$ngaynhap')";
        $result=$this->db->insert($query);

        if($result && $dem==$slideCount)
        {
          
          return 1;
        }else
        {
          return 0;
        }
        
  }

  function themExcel($query){
    $result=$this->db->insert($query);
    if($result)
      return $result;
    else
      return null;
  }


      function importExcelFile($file){
        if($_FILES["file"]["size"] > 0)
    {
      $filename=$_FILES["file"]["tmp_name"];
        $file = fopen($filename, "r");
        $count=0;
        $str="";
        //$sql_data = "SELECT * FROM prod_list_1 ";
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $count++;
            if($count>1){
              $str.="Tên hàng : '$emapData[0]   Giá bán : '$emapData[1]";
            // $sql = "INSERT into prod_list_1(p_bench,p_name,p_price,p_reason) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
            mysql_query($sql);
            }
        }
        fclose($file);
        return $str;
    }
    else
        return $str;
      }


      public function update_product($data,$files,$id)
    {
       $pdName=mysqli_real_escape_string($this->db->link,$data['pdName']);
      $catID=mysqli_real_escape_string($this->db->link,$data['category']);
      $brandID=mysqli_real_escape_string($this->db->link,$data['brand']);
      $info=mysqli_real_escape_string($this->db->link,$data['desc']);
      $color=mysqli_real_escape_string($this->db->link,$data['color']);
      $bh=mysqli_real_escape_string($this->db->link,$data['bh']);
      $amount=mysqli_real_escape_string($this->db->link,$data['amount']);
      $sale=mysqli_real_escape_string($this->db->link,$data['sale']);
      $price=mysqli_real_escape_string($this->db->link,$data['price']);
      $new=mysqli_real_escape_string($this->db->link,$data['new']);

      //Kiem tra hinh anh va lay hinh anh cho vao foder upload
      $permited=array('jpg','jpeg','png','gif','webp');
      $file_name=$_FILES['pdImage']['name'];
      $file_size=$_FILES['pdImage']['size'];
      $file_temp=$_FILES['pdImage']['tmp_name'];

      $div=explode('.', $file_name);
      $file_exit=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_exit;
      $upload_image="uploads/".$unique_image;

      if($pdName=="" || $catID=="" || $brandID=="" || $info=="" || $amount=="" || $sale==""|| $price=="" ||$new=="" ||$color==""||$bh=="")
      {
        $alert ="<span class='tb'> Phải điền đủ thông tin </span>";
        return $alert;
      }
      else
        {
          if(!empty($file_name))
          {
            if(in_array($file_exit, $permited)===false)
            {
              $alert="<span class='tb'> Chỉ được uploads ảnh có đuôi là :".implode(',',$permited )."</span>";
              return $alert;
            }
            move_uploaded_file($file_temp, $upload_image);
            $query="UPDATE product set 
            productName='$pdName',
            catID=$catID,
            brandID=$brandID,
            info='$info',
            amount=$amount,
            color='$color',
            sale=$sale,
            price='$price',
            new=$new,
            image='$unique_image',
            bh=$bh
            where productID=$id";
          }
          else
          {

             $query="UPDATE product set 
            productName='$pdName',
            catID=$catID,
            brandID=$brandID,
            info='$info',
            amount=$amount,
            color='$color',
            sale=$sale,
            price='$price',
            new=$new,
            bh=$bh
            where productID=$id";
            }
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


      public function update_product2($data,$files)
    {
      $id=mysqli_real_escape_string($this->db->link,$data['id']);
      $old_name=mysqli_real_escape_string($this->db->link,$data['old_name']);
      $pdName=mysqli_real_escape_string($this->db->link,$data['tensp']);
      $lh=mysqli_real_escape_string($this->db->link,$data['lh']);
      $th=mysqli_real_escape_string($this->db->link,$data['th']);
      $mota=mysqli_real_escape_string($this->db->link,$data['mota']);
      $color=mysqli_real_escape_string($this->db->link,$data['color']);
      $bh=mysqli_real_escape_string($this->db->link,$data['bh']);
      $amount=mysqli_real_escape_string($this->db->link,$data['tonkho']);
      $ghichu=mysqli_real_escape_string($this->db->link,$data['ghichu']);
      $gianhap=mysqli_real_escape_string($this->db->link,$data['gianhap']);
      $giaban=mysqli_real_escape_string($this->db->link,$data['giaban']);
      $w=mysqli_real_escape_string($this->db->link,$data['w']);
      $ngaynhap=mysqli_real_escape_string($this->db->link,$data['ngaynhap']);


      //Kiem tra hinh anh va lay hinh anh cho vao foder upload
      
      // move_uploaded_file($file_temp, $upload_image);
      //slider
      $slideCount=count($_FILES['files']['name']);
      if($slideCount>0){
        $permited=array('jpg','jpeg','png','gif','wepb');
      $file_name=$_FILES['files']['name'][0];
      $file_size=$_FILES['files']['size'][0];
      $file_temp=$_FILES['files']['tmp_name'][0];
      $div=explode('.', $file_name);
      $file_exit=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_exit;
      $upload_image="uploads/".$unique_image;
      }
      $dem=0;
      $demx=0;
  


      if($slideCount>=6){
        $query5="DELETE FROM product_slider where pdName='$old_name' ";
        $result5=$this->db->delete($query5);
        if($result5){
        $query6="SELECT * from product_slider where pdName='$old_name'";
        $result6=$this->db->SELECt($query6);
        $ta=0;
        if($result6){
          while ($temp=$result6->fetch_assoc()) {
            $link="slider/".$temp['image'];
            unlink($link);
          }
        }
        }
      for($i=0;$i<6;$i++)
      {
        
        $slideName=$_FILES['files']['name'][$i];
        $query="INSERT INTO product_slider(pdName,image) VALUES ('$pdName','$slideName')";
        $result2=$this->db->insert($query);
    
          if($result2){
            $dem++;
          }
        if($i==0){
          move_uploaded_file($file_temp, $upload_image);
          copy($upload_image,"slider/".$slideName);
        }
        else
          move_uploaded_file($_FILES['files']['tmp_name'][$i],"slider/".$slideName);
        
      }
    }
     
      else{
        if($slideCount>0){
          $permited=array('jpg','jpeg','png','gif','wepb');
          $file_name=$_FILES['files']['name'][0];
          $file_size=$_FILES['files']['size'][0];
          $file_temp=$_FILES['files']['tmp_name'][0];
          $div=explode('.', $file_name);
          $file_exit=strtolower(end($div));
          $unique_image=substr(md5(time()),0,10).'.'.$file_exit;
          $upload_image="uploads/".$unique_image;

            $dem=$slideCount;
            move_uploaded_file($file_temp, $upload_image);
          // $query8="UPDATE product_slider set"
            $query7="SELECT * from product where productID=$id";
            $result7=$this->db->SELECt($query7);
            $pd7=$result7->fetch_assoc();
            if($pd7['image']!=""){
              $link3="uploads/".$pd7['image'];
              unlink($link3);
        }
          }
        }
        
        
          $query="UPDATE product set 
            productName='$pdName',
            catID=$lh,
            brandID=$th,
            info='$mota',
            amount=$amount,
            color='$color',
            import_price=$gianhap,
            price=$giaban,
            bh=$bh,
            weight=$w,
            import_date='$ngaynhap',
            note='$ghichu',
            image='$unique_image'
            where productID=$id";
       

        $result=$this->db->update($query);

            if($result != false)
            {
            
              return 1;
            }
            else{
              return 0;
          }
        
  }

      public function update_product3($data)
    {
      $id=mysqli_real_escape_string($this->db->link,$data['id']);
      $old_name=mysqli_real_escape_string($this->db->link,$data['old_name']);
      $pdName=mysqli_real_escape_string($this->db->link,$data['tensp']);
      $lh=mysqli_real_escape_string($this->db->link,$data['lh']);
      $th=mysqli_real_escape_string($this->db->link,$data['th']);
      $mota=mysqli_real_escape_string($this->db->link,$data['mota']);
      $color=mysqli_real_escape_string($this->db->link,$data['color']);
      $bh=mysqli_real_escape_string($this->db->link,$data['bh']);
      $amount=mysqli_real_escape_string($this->db->link,$data['tonkho']);
      $ghichu=mysqli_real_escape_string($this->db->link,$data['ghichu']);
      $gianhap=mysqli_real_escape_string($this->db->link,$data['gianhap']);
      $giaban=mysqli_real_escape_string($this->db->link,$data['giaban']);
      $w=mysqli_real_escape_string($this->db->link,$data['w']);
      $ngaynhap=mysqli_real_escape_string($this->db->link,$data['ngaynhap']);



        $query="UPDATE product set 
            productName='$pdName',
            catID=$lh,
            brandID=$th,
            info='$mota',
            amount=$amount,
            color='$color',
            import_price=$gianhap,
            price=$giaban,
            bh=$bh,
            weight=$w,
            import_date='$ngaynhap',
            note='$ghichu'
            where productID=$id";

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
          
?>