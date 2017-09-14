<?php

require_once 'php_action/db_connect.php';
session_start();

if(isset($_SESSION['user_id'])){
	header('location: http://localhost/stock_system/dashboard.php');
}
$errors = array();

if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)){
		if($username == ""){
			$errors[] = "Username is required";
		}
		if($password == ""){
			$errors[] = "Password is required";
		}
	}else{
		$sql = "select * from users where username = '$username'";
		$result = $conn->query($sql);
		
		if($result->num_rows == 1){
			$password = md5($password);
			//exists
			$mainsql = "select * from users where username = '$username' AND password = '$password'";
			$mainResult = $conn->query($mainsql);
			if($mainResult->num_rows == 1){
				$value = $mainResult->fetch_assoc();
				$user_id =  $value['user_id'];
				//set session
				 $_SESSION['user_id'] = $user_id;
				 header ('location: http://localhost/stock_system/dashboard.php');
			}else{
				$errors[] = "Incorrect username/password combination";
			}
		}else{
			$errors[] = "Username does not Exists";
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Stock Management System</title>
	<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrapcss">
<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap grid -->
<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-grid.min.css">
<!-- font awsome -->
<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
<!-- custom css -->
<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
<!-- jquery -->
<script type="text/javascript" src="assets/jquery/jquery.min.js"></script> 
<!-- jqueryui -->
<link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui.min.css">

<script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script> 
<!-- bootstrap js -->
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script> 

</head>

<body>
	
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"> Please Sign In </h3>
					</div>		
					<div class="panel-body">
					  <div class="messages">
						<?php if($errors){
							foreach ($errors as $key => $value) {
								echo '<div class="alert alert-warning  role="alert"> <i class="glyphicon glyphicon-exclamation-sign"></i>'.$value.'</div>';
							}
						}
						?>
					  </div>
					  <form class="form-horizontal" method="POST" id="LoginForm" action="<?php echo $_SERVER['PHP_SELF']?>">
						  <div class="form-group">
						    <label for="username" class="col-sm-2 control-label">Username</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="password" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
						    </div>
						  </div>
						</form>
					  <!--  <form class="form-row" method="POST" id="LoginForm" action="<?php // echo $_SERVER['PHP_SELF']?>">
						
  							
   								 <div class="form-group row">
  								    <label for="Username" class="col-sm-2 col-form-label">Username</label>
 									     <div class="col-sm-10">
 									       <input type="text" class="form-control" id="username" name= "username" placeholder="Username">
      									 </div>
      							</div>
  						
   									 <div class="form-group row">
   									   <label for="password" class="col-sm-2 col-form-label">Password</label>
 									     <div class="col-sm-10">
 									       <input type="password" class="form-control" id="password" name="password" placeholder="Password">
									     </div>
    								 </div>	

    								  <div class="form-group row">
  									    <div class="col-sm-10">
 									       <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
 										        </div>
   									  </div>
 						    </form> -->
						
					
					</div>
				</div>	
				
			</div> 
			<!-- col-md-5 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->

	</body>
</html>