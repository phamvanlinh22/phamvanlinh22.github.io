<?php
   include'../lib/database.php';
   include '../helper/format.php';

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
  $kt=0;
  $query="";
  $res2="";
if( isset($_POST['columns']) && isset($_POST['title'])  ){
	$res=$_POST['title'];
 	$columns=$_POST['columns'];

  $temp=implode(",",$columns);
  $query="select ".$temp." from product ";
}
if( isset($_POST['catID']) ){
  $catID=$_POST['catID'];
  if($catID!="" && $kt==0){
    $query.=" where catID =".$catID;
    $kt=1;
  }
  // elseif($catID!="" && $kt==1){
  //   $query.=" and catID =".$catID;
  // }
}
if( isset($_POST['brand']) ){
  $brandID=$_POST['brand'];
  if($brandID!="" && $kt==1){
    $query.=" and brandID =".$brandID;
  }
  elseif($brandID!="" && $kt==0){
    $query.="where brandID =".$brandID;
    $kt==1;
  }
  else{
    // $query.=" where brandID = -1";
  }
}
if( isset($_POST['status']) ){
  $status=$_POST['status'];
  if($status!="all" && $kt==0){
    $query.=" where status ='".$status."'";
    $kt=1;
  }
  elseif($status!="all" && $kt==1){
    $query.=" and status ='".$status."'";
  }
}
if( isset($_POST['key']) ){
  $key=$_POST['key'];
  if($key!="" && $kt==0){
    $query.=" where productName  like '%".$key."%'";
    $kt=1;
  }
  elseif($key!="" && $kt==1){
    $query.=" and productName like '%".$key."%'";
  }
}

if( isset($_POST['choice_sx']) ){
  $sort=$_POST['choice_sx'];
  if($sort!="all"){
    $query.=" ".$sort;
  }
}
if(isset($_POST['page'])){
  $page=$_POST['page'];

}
  $vt=($page-1)*13;


  $query2=$query;

  // $query.=" limit 12";
  $query.=" LIMIT ".$vt.",13" ;
  $item=$product->getProduct($query);
  $t=0;
 	if($item!=NULL)
 		while ($result=$item->fetch_assoc()) {
      $trangthai="green";
      $t++;
      if($t%2==0){
         $res.='<tr class="roww row-bor"    pdID="'.$result["productID"].'" onclick="showInfo(this)" style="text-align: center;background-color:#F0F0F0;">'."<td><input type='checkbox' onclick='selectPD(this)' id='sp".$result["productID"]."' pdID='".$result["productID"]."' name='' style='width:17px;height:17px;'></td>";
      }
      else
		    $res.='<tr class="roww row-bor" checked="true" onclick="showInfo(this)"  pdID="'.$result["productID"].'" style="text-align: center;">'."<td><input type='checkbox' onclick='selectPD(this)'  id='sp".$result["productID"]."' pdID='".$result["productID"]."' name='' style='width:17px;height:17px;'></td>";

     for($i=0; $i< sizeof($columns);$i++){

        if($columns[$i] =="productID"){

          $res.='<td > <div>'.$result['productID'].'</div></td>';
        }
        elseif($columns[$i] =="productName"){
          $res.='<td  >'.$result['productName'].'</td>';
        }
        elseif($columns[$i] =="image"){
          $res.='<td > <div> <img src="./uploads/'.$result['image'].'" width="30" ></div></td>';
        }
        elseif($columns[$i] =="catID"){
          $catName=$cat->getCatbyID($result['catID']);
          $rs=$catName->fetch_assoc();
          $res.='<td > <div>'.$rs['catName'].'</div></td>';
        }
        elseif($columns[$i] =="brandID"){
          $brandName=$brand->getBrandbyID($result['brandID']);
          $rs2=$brandName->fetch_assoc();
          $res.='<td > <div>'.$rs2['brandName'].'</div></td>';
        }
        elseif($columns[$i] =="amount"){
          $res.='<td > <div>'.$result['amount'].'</div></td>';
        }
        elseif($columns[$i] =="import_price"){
          $res.='<td > <div>'.$product->formatMoney($result['import_price']).'</div></td>';
        }
        elseif($columns[$i] =="price"){
          $res.='<td > <div>'.$product->formatMoney($result['price']).'</div></td>';
        }
        elseif($columns[$i] =="weight"){
          $res.='<td > <div>'.$result['weight'].'</div></td>';
        }
        elseif($columns[$i] =="place"){
          $res.='<td > <div>'.$result['place'].'</div></td>';
        }
        elseif($columns[$i] =="color"){
          $res.='<td > <div>'.$result['color'].'</div></td>';
        }
        elseif($columns[$i] =="NCC"){
          $res.='<td > <div>'.$result['NCC'].'</div></td>';
        }
        elseif($columns[$i] =="sold"){
          $res.='<td > <div>'.$result['sold'].'</div></td>';
        }
        elseif($columns[$i] =="import_date"){
          $res.='<td > <div>'.$result['import_date'].'</div></td>';
        }
        elseif($columns[$i] =="status"){
          $res.='<td > <div>'.$result['status'].'</div></td>';
          if($result['status']=="Hết hàng"){
            $trangthai="yellow";
          }
          elseif($result['status']=="Đang kinh doanh")
            $trangthai="red";

        }
        elseif($columns[$i] =="bh"){
          $res.='<td > <div>'.$result['bh'].'</div></td>';
        } 
        elseif($columns[$i] =="note"){
          $res.='<td > <div>'.$result['note'].'</div></td>';
        }

      
     }
     $res.='</tr>';
     $pdif=$product->getProductbyID($result['productID']);
     $result2=$pdif->fetch_assoc();
     // $infoo=$$result2['productID'].'"'.$result2['productName'].'",'.$result2['catID'].','.$result2['brandID'],.',"'.$result2['color'].'","'.$result2['import_date'].'",'.$result2['import_price'].','.$result2['price'].',',$result2['amount'].','.$result2['weight'].','.$result2['bh'].',';
     // $infoo="";

     $catName=$cat->getCatbyID($result2['catID']);
     $rs=$catName->fetch_assoc();
     $brandName=$brand->getBrandbyID($result2['brandID']);
      $rs2=$brandName->fetch_assoc();
     $pdslide=$product->getSlide($result['productName']);
     $slide="";
     $an=0;
     if($pdslide!=null){
        while ($result3=$pdslide->fetch_assoc()) {
          if($an==0){
            $slide.="<img class='chosed-img' src='./slider/".$result3["image"]."' onclick='getSrc(this)' width='50' style='display:block;margin-bottom:3px;border:1px solid #B6B6B6;'>";
          }
          else
            $slide.="<img src='./slider/".$result3["image"]."' onclick='getSrc(this)' width='50' style='display:block;margin-bottom:3px;border:1px solid #B6B6B6;'>";
          $an++;
        }
    }else
        $silde= "<img src='./uploads/".$result2['image']."' width='50' style='display:block;margin-bottom:3px;border:2px solid cyan;'>";
     


     $res.="<tr class='roww row-bor pdinfo' id='pd".$result2['productID']."' style='background-color:white !important;border:1px solid green !important;'><td colspan='".(sizeof($columns)+1)."'>
     <div class='pd-info' style='height:550px !important;padding-left:20px;'>
        <div style='color:#006fa9;font-size:19px;font-weight:bold;text-align:left;padding: 10px 0px 0px 0px;'>".$result2['productName']."</div>
        <div style='padding-top:7px; text-align:left;font-weight:bold;color:#2F2E2E;'><i class='fas fa-check' style='color: green ;font-size:18px;'></i>&#160&#160&#160".$result2['status']."</div>
        <table border='0' style='margin-top:17px;'>
            <tr>  
                <td style=' display:flex;flex-direction:row;'>
                  <div style='margin-right:10px;'>
                     <div><img class='main-img' src='./uploads/".$result2['image']."' width='200'></div> 
                  </div>
                  <div>
                      ".$slide."
                  </div>
                </td>

                <td>
                  <div style='padding:0px 15px 0px 35px;'>
                  <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'> Mã hàng:</div><div style='padding-left:50px;color:#353333;'>".$result2['productID']."</div></div>
                    <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'> Loại hàng:</div><div style='padding-left:50px;color:#353333;'>".$rs['catName']."</div></div>
                    <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'> Thương hiệu:</div><div style='padding-left:50px;color:#353333;'>".$rs2['brandName']."</div></div>
                    <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Tồn kho:</div><div style='padding-left:50px;color:#353333;'>".$result2['amount']."</div></div>
                    <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Giá nhập:</div><div style='padding-left:50px;color:#353333;'>".$product->formatMoney($result2['import_price'])."</div></div>
                   <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Giá bán:</div><div style='padding-left:50px;color:#353333;'>".$product->formatMoney($result2['price'])."</div></div>
                   <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Màu sắc:</div><div style='padding-left:50px;color:#353333;'>".$result2['color']."</div></div>
                   <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Trọng lượng:</div><div style='padding-left:50px;color:#353333;'>".$result2['weight']."g</div></div>
                  <div style='border-bottom:1px solid #DDDDDD;width:250px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Ngày nhập:</div><div style='padding-left:50px;color:#353333;'>".$result2['import_date']."</div></div>



                  </div>
                </td>
                <td >
                    <div style='padding:0px 15px 0px 15px;'>
                    <div style='border-bottom:1px solid #DDDDDD;width:230px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:128px;margin-top:-150px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Bảo hành:</div><div style='padding-left:50px;color:#353333;'>".$result2['bh']." tháng</div></div>
                   
                    <div style='border-bottom:1px solid #DDDDDD;width:230px;display:flex;flex-direction:row;padding-bottom:3px;margin-bottom:13px;'><div style='width:100px;color:#424040;font-weight:600;text-align:left;'>Ghi chú</div><div style='padding-left:50px;color:#353333;'>".$result2['note']."</div></div>
                    



                  </div>
                </td>
            </tr>
        </table>
        <div style='margin-top:40px; margin-left:350px;'>    
        <button type='button' class='btn btn-primary bttt' onclick='loadForm(".$result2['productID'].")' data-toggle='modal' data-target='#suahh' ><i class='fas fa-edit'>&#160&#160</i>Cập nhập</button>
        <button type='button' style='background-color:#EB4C4C;border-color:#EB4C4C;font-weight:600;margin-left:7px;'  class='btn btn-primary'><i class='fas fa-exclamation-triangle'>&#160&#160</i>Ngừng kinh doanh</button>
        <button type='button' pdID='".$result2['productID']."' onclick='getDelID(this)' data-toggle='modal' data-target='#xoasp' style='background-color:#7F7F7F;border-color:#7F7F7F;font-weight:600; margin-left:7px;' class='btn btn-primary'><i class='far fa-trash-alt'>&#160&#160</i>Xóa</button>
      </div>
     </div></td></tr>";
     // $res.='</tr>';

     }
     else{
        $res.="<tr><td class='not_found' colspan='16'>Không có sản phẩn phù hợp</td></tr>";
     }


    $rs=$product->getProduct($query2);
    if($rs!=NULL){
      $pd_count=mysqli_num_rows($rs);
    }
    else
      $pd_count=0;
    if($pd_count!=0){
    $bt_amount=ceil($pd_count/13);
    
    $k=1;
      if($bt_amount>1){
      if($page>1)
          $res2.= '<div class="page_num"><a href="listdm.php?page='.($page-1).'"><i class="fas fa-angle-left"></i></a></div> ';

       for($k=1;$k<=$bt_amount;$k++)
            {
            if($page!=$k)
            $res2.= '<div class="page_num"><a href="listdm.php?page='.$k.'">'.$k.'</a></div> ';
            else
              $res2.= '<div class="page_num activee"><a href="listdm.php?page='.$k.'">'.$k.'</a></div> ';
            }
            if($page<$bt_amount)
            $res2.= '<div class="page_num"><a href="listdm.php?page='.($page+1).'"><i class="fas fa-angle-right"></i></a></div> ';}
    }
 		// echo $res;
 // exit;
    $data['item']=$res;
    $data['page']=$res2;
    // $data['col']=sizeof($columns);
   echo json_encode($data); 

  
?>