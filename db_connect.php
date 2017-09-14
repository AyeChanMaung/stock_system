<?php

$dbhost = '127.0.0.1';
$dbname = 'stock';
$dbuser = 'root';
$dbpass = '123456';


$conn  = mysqli_connect($dbhost,$dbuser,$dbpass);


mysqli_select_db($conn,$dbname);	

if($conn->connect_error){
	die("connection failed :" . $conn->connect_error);
}else{
	//echo "successfully connected";
}
?>
