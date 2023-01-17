<?php  
include '../classes/fbchat.php';
$fbchat= new chat();
$data=[];
?>

<?php  

if(isset($_POST['conv_id'])){
	$data['result']=$fbchat->loadMessage($_POST['conv_id'],$_POST['src']);
	echo json_encode($data,true);
}
if(isset($_POST['psid'])){
	$data['result']=$fbchat->send_message($_POST['psid'],$_POST['message']);
	echo json_encode($data,true);
}
?>