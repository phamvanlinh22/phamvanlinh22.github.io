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
$queryy="";
$kq=0;
$count=0;
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
error_reporting(0);
 if(isset($_FILES)){
      

$file =$_FILES['file']['name'];

$objFile = PHPExcel_IOFactory::identify($file);
$objData = PHPExcel_IOFactory::createReader($objFile);

//Chỉ đọc dữ liệu
$objData->setReadDataOnly(true);

// Load dữ liệu sang dạng đối tượng
$objPHPExcel = $objData->load($file);

//Lấy ra số trang sử dụng phương thức getSheetCount();
// Lấy Ra tên trang sử dụng getSheetNames();

//Chọn trang cần truy xuất
$sheet  = $objPHPExcel->setActiveSheetIndex(0);

//Lấy ra số dòng cuối cùng
$Totalrow = $sheet->getHighestRow();

$count=$Totalrow;
//Lấy ra tên cột cuối cùng
$LastColumn = $sheet->getHighestColumn();
//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
if(intval($TotalCol)==11 && intval($Totalrow)>=2){
//Tạo mảng chứa dữ liệu
// $data = [];



//Tiến hành lặp qua từng ô dữ liệu
//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
for ($i = 2; $i <= $Totalrow; $i++)
{
  //----Lặp cột
  // for ($j = 0; $j < $TotalCol; $j++)
  // {
 //     // Tiến hành lấy giá trị của từng ô đổ vào mảng
  //  $data[$i-2][$j]=$sheet->getCellByColumnAndRow($j, $i)->getValue();

  // }
  $tenhhh=$sheet->getCellByColumnAndRow(0, $i)->getValue();

  $lhh=$sheet->getCellByColumnAndRow(1, $i)->getValue();
  // echo $lhh;
  $thh=$sheet->getCellByColumnAndRow(2, $i)->getValue();
  // echo $thh;
  $gnn=$sheet->getCellByColumnAndRow(3, $i)->getValue();
  // echo $gnn;
  $gbb=$sheet->getCellByColumnAndRow(4, $i)->getValue();
  // echo $gbb;
  $tkk=$sheet->getCellByColumnAndRow(5, $i)->getValue();
  // echo $tkk;
  $colorr=$sheet->getCellByColumnAndRow(6, $i)->getValue();
  // echo $colorr;
  $ngaynhapp=$sheet->getCellByColumnAndRow(7, $i)->getValue();
  // echo $ngaynhapp;
  $trongluongg=$sheet->getCellByColumnAndRow(8, $i)->getValue();
  // echo $trongluongg;
  $baohanhh=$sheet->getCellByColumnAndRow(9, $i)->getValue();
  // echo $baohanhh;
  $gcc=$sheet->getCellByColumnAndRow(10, $i)->getValue();
  // echo $gcc;
  $queryy="INSERT INTO product(productName,catID,brandID,amount,color,import_price,price,weight,bh,status,note,import_date) VALUES ('$tenhhh',$lhh,$thh,$tkk,'$colorr',$gnn,$gbb,$trongluongg,$baohanhh,'Đang kinh doanh','$gcc','$ngaynhapp')";
  $themsp=$product->themExcel($queryy);
  if($themsp==null){
      $kq=0;
  }
  else
    $kq=1;
}
}
   // $data['query']=$queryy;
   $data['kq']=$kq;
   $data['count']=$count;
   echo json_encode($data);
}
   

?>