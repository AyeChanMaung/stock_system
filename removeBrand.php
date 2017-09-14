<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$brandId = $_POST['brandId'];

if($brandId){
	
	$sql = "UPDATE brands set brand_status = 2 where brandId={$brandId}";

	if($conn->query($sql) === true){
		$valid['success'] = true;
		$valid['messages'] = "successfully Removed";
	}else{
		$valid['success'] = false;
		$valid['messages'] = "error while Removing the brand";		
	}
	$conn->close();
	echo json_encode($valid);
}


?>