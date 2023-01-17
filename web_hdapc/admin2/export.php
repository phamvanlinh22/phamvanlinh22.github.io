<?php
require('PHPExcel-1.8/Classes/PHPExcel.php');

$conn=new mysqli("localhost","root","","hda_pc");

    $objExcel = new PHPExcel;
    $objExcel ->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('Danh sách thiết bị');
    $rowCount = 2;
    $sheet ->getDefaultRowDimension()->setRowHeight(35);
    $sheet ->mergeCells('A1:M1');
    $sheet ->setCellValue('A1','DANH SÁCH SẢN PHẨM');
    $sheet ->getStyle('A1')->getFont()->setSize(14); 
    $sheet ->getRowDimension(2)->setRowHeight(22);
    $sheet ->getRowDimension(1)->setRowHeight(30);
    $sheet ->setCellValue('A'.$rowCount,'Mã hàng');
    $sheet ->setCellValue('B'.$rowCount,'Tên hàng');
    $sheet ->setCellValue('C'.$rowCount,'Loại hàng');
    $sheet ->setCellValue('D'.$rowCount,'Thương hiệu');
    $sheet ->setCellValue('E'.$rowCount,'Tồn kho');
    $sheet ->setCellValue('F'.$rowCount,'Giá nhập');
    $sheet ->setCellValue('G'.$rowCount,'Giá bán');
    $sheet ->setCellValue('H'.$rowCount,'Màu sắc');
    $sheet ->setCellValue('I'.$rowCount,'Trọng lượng');
    $sheet ->setCellValue('J'.$rowCount,'Ngày nhập');
    $sheet ->setCellValue('K'.$rowCount,'Tình trạng');
    $sheet ->setCellValue('L'.$rowCount,'Bảo hành');
    $sheet ->setCellValue('M'.$rowCount,'Ghi chú');
    $sheet ->getStyle('A1:H1')->getFont()->setSize(10);
    $sheet ->getColumnDimension("A")->setAutoSize(true);
    $sheet ->getColumnDimension("B")->setAutoSize(true);
    $sheet ->getColumnDimension("C")->setAutoSize(true);
    $sheet ->getColumnDimension("E")->setAutoSize(true);
    $sheet ->getColumnDimension("F")->setAutoSize(true);
    $sheet ->getColumnDimension("G")->setAutoSize(true);
    $sheet ->getColumnDimension("H")->setAutoSize(true);
    $sheet ->getColumnDimension("D")->setAutoSize(true);
    $sheet ->getColumnDimension("I")->setAutoSize(true);
    $sheet ->getColumnDimension("J")->setAutoSize(true);
    $sheet ->getColumnDimension("K")->setAutoSize(true);
    $sheet ->getColumnDimension("L")->setAutoSize(true);
    $sheet ->getColumnDimension("M")->setAutoSize(true);

    $sheet->getStyle("A2:M2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $sheet->getStyle("A1:M1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

    $sheet ->getStyle('A1')->getFont()->setBold(true);
    $sheet ->getStyle('A2:M2')->getFont()->setBold(true);
    $sheet ->getPageMargins()->setLeft(0.8);
    $sheet ->getStyle('A1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('8DB4E2');
    $sheet ->getStyle('A2:M2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('124CB6');
    $sheet ->getStyle('A2:M2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    // $sheet ->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $sheet ->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    function formatMoney($number, $fractional=false) {  
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
    
    $result = mysqli_query($conn,"SELECT * from product");
    $row_c=0;
    if($result!=NULL){
    	$row_c=mysqli_num_rows($result);
    }
    if($row_c>0){
    	while ($item=$result->fetch_assoc()) {
        $catid=$item['catID'];
        $query2="SELECT * from category where catID = ".$catid;
        $cat=mysqli_query($conn,$query2);
        $catName=$cat->fetch_assoc();

        $brandid=$item['brandID'];
        $query3="SELECT * from brand where brandID = ".$brandid;
        $brand=mysqli_query($conn,$query3);
        $brandName=$brand->fetch_assoc();

        $rowCount++;
        $sheet ->setCellValue('A'.$rowCount,$item['productID']);
        $sheet ->setCellValue('B'.$rowCount,$item['productName']);
        $sheet ->setCellValue('C'.$rowCount,$catName['catName']);
        $sheet ->setCellValue('D'.$rowCount,$brandName['brandName']);
        $sheet ->setCellValue('E'.$rowCount,$item['amount']);
        $sheet ->setCellValue('F'.$rowCount,formatMoney($item['import_price']));
        $sheet ->setCellValue('G'.$rowCount,formatMoney($item['price']));
       	$sheet ->setCellValue('H'.$rowCount,$item['color']);
       	$sheet ->setCellValue('I'.$rowCount,$item['weight']);
       	$sheet ->setCellValue('J'.$rowCount,$item['import_date']);
        $sheet ->setCellValue('K'.$rowCount,$item['status']);
       	$sheet ->setCellValue('L'.$rowCount,$item['bh']." tháng");
       	$sheet ->setCellValue('M'.$rowCount,"");
        
    }

    }

    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $style = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '171717'),
        'size'  => 18,
        'name'  => 'Verdana'
    ));
    $stylename = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
        'name'  => 'Verdana'
    ));
    $sheet->getStyle('A1')->applyFromArray($style);
    $sheet->getStyle('A2:M2')->applyFromArray($stylename);
    $sheet->getStyle('A1:' . 'M'.($rowCount))->applyFromArray($styleArray);
    $sheet->getStyle('B3:' . 'M'.($rowCount))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $name = 'export.xlsx';
    $objWriter ->save($name);
     header('Content-Disposition: attachment; filename="'. $name. '"');
     header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
     header('Content-Length: '.filesize($name));
     header('Content-Transfer-Encoding: binary');
     header('Cache-Control: must-revalidate');
     header('Pragma: no-cache');
     readfile($name);   
     return;
?>

