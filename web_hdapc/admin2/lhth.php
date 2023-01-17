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
$ck1=0;
$ck2=0;
$ck3=0;
$ck4=0;
$ck5=0;
$ck6=0;
$ck7=0;
$ck8=0;
$item;
if(isset($_POST['tenlh'])){

   $tenlh=$_POST['tenlh'];
   $rs=$cat->insert_cat2($tenlh);
   if($rs==1)
      $ck1=1;
}

if(isset($_POST['tenth'])){

   $tenth=$_POST['tenth'];
   $rs7=$brand->insert_brand2($tenth);
   if($rs7==1)
      $ck7=1;
}

if(isset($_POST['catID'])){

   $tenlh_moi=$_POST['tenlh_moi'];
   $catID=$_POST['catID'];
   $rs2=$cat->update_Cat2($tenlh_moi,$catID);
   if($rs2==1)
      $ck2=1;
}

if(isset($_POST['brandID'])){

   $tenth_moi=$_POST['tenth_moi'];
   $brandID=$_POST['brandID'];
   $rs6=$brand->update_Brand2($tenth_moi,$brandID);
   if($rs6==1)
      $ck6=1;
}

if(isset($_POST['catIDD'])){

   $catIDD=$_POST['catIDD'];
   $rs3=$cat->getCatbyID($catIDD);
   $catName=$rs3->fetch_assoc();
   $data['catName']=$catName['catName'];
}

if(isset($_POST['brandIDD'])){

   $brandIDD=$_POST['brandIDD'];
   $rs5=$brand->getBrandbyID($brandIDD);
   $brandName=$rs5->fetch_assoc();
   $data['brandName']=$brandName['brandName'];
}

if(isset($_POST['xoalh'])){

   $xoaID=$_POST['xoalh'];
   $rs4=$cat->delbyID2($xoaID);
   if($rs4==1)
      $ck3=1;
}

if(isset($_POST['xoath'])){

   $xoath=$_POST['xoath'];
   $rs8=$brand->delBrandByID2($xoath);
   if($rs8==1)
      $ck8=1;
}

$qh="";
if(isset($_POST['tinh'])){
   $tinh=$_POST['tinh'];
   $rs9=$user->getDistrict($tinh);
   while($result=$rs9->fetch_assoc()){
      $qh.="<option value='".$result['name']."''>".$result['name']."</option>";
   }
   $data['qh']=$qh;
}

$px="";
if(isset($_POST['qh'])){
   $px2=$_POST['qh'];
   $rs9=$user->getWard($px2);
   while($result=$rs9->fetch_assoc()){
      $px.="<option value='".$result['name']."''>".$result['name']."</option>";
   }
   $data['px']=$px;
}


if(isset($_POST['delID'])){
   $delID=$_POST['delID'];
   $rs5=$product->delbyID2($delID);
   if($rs5==1)
      $ck4=1;
}
$pd_slider=[];
if(isset($_POST['pd_idd'])){
 
   $pd_idd=$_POST['pd_idd'];
   $item=$product->getProductbyID($pd_idd);
   $result=$item->fetch_assoc();
   $slider=$product->getSlide($result['productName']);
   if($slider!=NULL){
      while($slide=$slider->fetch_assoc()){
         $tmp="slider/".$slide['image'];
         array_push($pd_slider,$tmp);
      }
      $data['slider']=$pd_slider;
   }
   else{
      $tmp="uploads/".$result['image'];
      array_push($pd_slider,$tmp);
      $data['slider']=$pd_slider;
   }

   $data['id']=$result['productID'];
   $data['name']=$result['productName'];
   $data['catid']=$result['catID'];
   $data['brandid']=$result['brandID'];
   $data['color']=$result['color'];
   $data['date']=$result['import_date'];
   $data['ip_price']=$result['import_price'];
   $data['price']=$result['price'];
   $data['amount']=$result['amount'];
   $data['w']=$result['weight'];
   $data['bh']=$result['bh'];
   $data['note']=$result['note'];
   $data['desc']=$result['info'];
}
if(isset($_POST['getall'])){
   
   $choice=$_POST['getall'];
   if($choice==1){
      $idsp=[];
   $abc=$product->show_pd();
   while ($result=$abc->fetch_assoc()) {
      array_push($idsp,$result['productID']);
   }
   $data['getall']=$idsp;

   }
}
if(isset($_POST['xoan'])){
   $dem=0;
   $iddd=$_POST['xoan'];
   for($i=0;$i<sizeof($iddd);$i++){
      $rss=$product->delbyID2($iddd[$i]);
      if($rss==1)
         $dem++;
   }
   if($dem==sizeof($iddd))
      $data['ktxn']=1;
   else
      $data['ktxn']=0;
}
if(isset($_POST['key_br'])){
   $key_br=$_POST['key_br'];
   $query="";
   $list_br='<div class="lh-name categoryy selected2" onclick="chonTH(this)" brandID="all">Tất cả</div>';
   if($key_br==""){
      $query="SELECT * from brand";
   }
   else
   {
      $query="SELECT * from brand where brandName like '%".$key_br."%'";;
   }
   $brandd=$product->getProduct($query);
   if($brandd != NULL){
      while ($result=$brandd->fetch_assoc()) {
         $list_br.=
         '<div class="lh-name categoryy" style="position: relative;" onclick="chonTH(this)" ann="" brandID="'.$result['brandID'].'">'.$result['brandName'].'<i style="position: absolute;z-index: 20;right: 12px; width: 24px; height: 24px; font-size: 13px; color: white; border-radius: 26px;visibility:visible;line-height:24px;z-index: 50; text-align: center;top:1px; " class="fas fa-pen edit-lh" data-toggle="modal" data-target="#suath" onclick="getBrandID(this)"></i></div>';
      }
   }
   else
      $list_br.='<div class="lh-name brandd" >Không tìm thấy</div>';
   $data['list_br']=$list_br;
}

if(isset($_POST['key_cat'])){
   $key_cat=$_POST['key_cat'];
   $query="";
   $list_cat='<div class="lh-name categoryy selected2" onclick="chonLH(this)" catID="all">Tất cả</div>';
   if($key_cat==""){
      $query="SELECT * from category";
   }
   else
   {
      $query="SELECT * from category where catName like '%".$key_cat."%'";;
   }
   $catt=$product->getProduct($query);
   if($catt != NULL){
      while ($result=$catt->fetch_assoc()) {
         $list_cat.=
         '<div class="lh-name categoryy" style="position: relative;" onclick="chonLH(this)" ann="" catID="'.$result['catID'].'">'.$result['catName'].'<i style="position: absolute;z-index: 20;right: 12px; width: 24px; height: 24px; font-size: 13px; color: white; border-radius: 26px;visibility:visible;line-height:24px;z-index: 50; text-align: center;top:1px; " class="fas fa-pen edit-lh" data-toggle="modal" data-target="#sualh" onclick="getCatID(this)"></i></div>';
      }
   }
   else
      $list_cat.='<div class="lh-name categoryy" >Không tìm thấy</div>';
   $data['list_cat']=$list_cat;
}


$data['tlh']=$ck1;
$data['tth']=$ck7;
$data['slh']=$ck2;
$data['xlh']=$ck3;
$data['xth']=$ck8;
$data['sth']=$ck6;
$data['xsp']=$ck4;
   echo json_encode($data); 


?>