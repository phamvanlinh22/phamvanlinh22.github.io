<?php  
include '../classes/fbchat.php';
$fbchat= new chat();
$data=[];
?>
<?php  
if($_POST['list']){
	$data['result']=$fbchat->getListChat();
	// $data['result']='hello';
	echo json_encode($data,true);
}

elseif ($_POST['send']) {
	$data['result']=$fbchat->getListChat();
	// $data['result']='hello';
	echo json_encode($data,true);
}


?>

