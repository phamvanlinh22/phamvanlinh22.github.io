<?php  
include 'classes/review.php';
$rv= new review();
$data=[];
?>
<?php  
if(isset($_POST['pdid'])){
	$data['result']=$rv->insert_review($_POST['pdid'],$_POST['reviewer'],$_POST['message'],$_POST['vote']);
	// $data['result']=
	echo json_encode($data,true);
}
elseif (isset($_POST['getRV'])) {
	$data['result']=$rv->getReview($_POST['getRV']);
	echo json_encode($data,true);
}

?>

