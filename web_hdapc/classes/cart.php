<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>

<?php

  class cart
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
    }
    
    public function showCart(){
        $sID=session_id();
      // if(Session::get('user_login')==true){
      //     $name=Session::get('user_name');
      //     $query="SELECT * from cart where sid='$sID' and pdID='$name'";
      //     }
      // else
      $query="SELECT * from cart where sid='$sID'";

        $result=$this->db->SELECt($query);
        if($result!=NULL)
           return $result;
        else 
          return NULL;
    }

    public function sumWeight(){
      $sID=session_id();
      $sum=0;
      $query="SELECT * from cart where sid='$sID'";
      $result=$this->db->SELECt($query);
        if($result){
          $row=mysqli_num_rows($result);
          if($row>0){
          while ($pd=$result->fetch_assoc()) {
            $id=$pd['pdID'];
            $query2="SELECT * from product where productID='$id' ";
            $result2=$this->db->SELECt($query2);
            $price=$result2->fetch_assoc();
            $sum=$sum+$price['weight']*$pd['sol'];
          }
          }
        }
        return $sum;
    }

    public function amountCart(){
      $sID=session_id();
      $query="SELECT sum(sol) as soluong from cart where sid='$sID'";
      $result=$this->db->SELECT($query);
        if(isset($result))
          return $result;
        else
          return 0;
    }

    public function countCart(){
      $sID=session_id();
      $query="SELECT count(*) as soluong from cart where sid='$sID'";
        $result=$this->db->SELECT($query);
        return $result;
    }

    public function totalPrice(){
      $sID=session_id();
      $query="SELECT SUM(price*sol) as tongtien from cart where sid='$sID' ";
        $result=$this->db->SELECt($query);
        if($result)
           return $result;
        else 
          return NULL;
    }

    
    public function Addcart($pdName){
      // $pdName=mysqli_real_escape_string($this->db->link,$pdName);
      $sID=session_id();

       $query="SELECT * from product where productName='$pdName' ";
        $result=$this->db->SELECt($query)->fetch_assoc();
      if($result['sale']!=0){
                    $price=$result['price'];
                    $sale=$result['sale'];
                    $cur_price=$price-$price*$sale/100;
      }else
                   $cur_price=$result['price'];

       $pdID=$result["productID"];
       $name=$result["productName"];
       $image=$result["image"];

       $check="SELECT * from cart where pdName='$pdName' and sid='$sID'";
        $resultC=$this->db->SELECt($check);
          if($resultC!=NULL)
            $ckc=$resultC->fetch_assoc();
          else
            $ckc=NULL;
       if($ckc!=NULL)
       {
         $query="UPDATE cart set sol=sol+1 where pdName='$pdName' and sid='$sID'";
            $this->db->UPDATE($query);
         header('Location:cartinfo.php');
       }
       else
       {
           $query2="INSERT INTO cart(pdID,pdName,pdImage,sid,sol,price) VALUES ('$pdID','$name','$image','$sID',1,$cur_price)";
            $result2=$this->db->insert($query2);
            if($result2){
                header('Location:cartinfo.php');
            }
            else
            {
                header('Location:index.php');
            } 
        }
    }


    public function update_Cart($sl,$id)
    {   
        $sID=session_id();
        $query="UPDATE cart set sol=$sl where pdID='$id' and sid='$sID'";
          $result=$this->db->update($query);

        if($result != false)
        {
          header("Location:cartinfo.php");
        }
        else{
          header("Location:index.php");
        }
      }
    
    public function delCartbyID($id){
      $sID=session_id();
      $query="DELETE from cart  where pdID='$id' and sid='$sID' ";
        $result=$this->db->delete($query);

       if($result != false)
        {
          header("Location:cartinfo.php");
        }
        else{
          header("Location:index.php");
      }
    }

      public function delAll(){
      $query="DELETE from cart ";
        $result=$this->db->delete($query);
    }

}
?>