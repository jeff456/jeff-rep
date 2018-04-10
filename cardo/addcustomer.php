<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}


	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
		if(isset($_POST['Save'])){
				$customerID = $_POST['customerid'];
				$customerLname = $_POST['lastname'];
				$customerFname = $_POST['firstname'];
				$middleInitial = $_POST['middlename'];
				$customerAddress = $_POST['address'];
				$emailAddress = $_POST['email'];
				$sql = "INSERT INTO customer VALUES ('{$customerID}', '{$customerLname}', '{$customerFname}', '{$middleInitial}', '{$customerAddress}', '{$emailAddress}')";
				mysqli_query($con,$sql) or die(mysqli_error());
				header("Location: indexcustomer.php");
				$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
				$userRow=$query->fetch_array();
				$DBcon->close();
				
		}else if(isset($_POST['back'])){
				header("Location: indexcustomer.php");
				}
			
?>

	<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title> Item </title>
				<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
				<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
				<link rel="stylesheet" href="style.css" type="text/css" />
			</head>
				
				
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		
				
			<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="">Shipping System</a>
					</div>
					
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
									
							</ul>
						<ul class="nav navbar-nav navbar-right"></ul>
					</div> 
			</div>
			
			
	</nav>
</body>


					
			<br><br/>
			<br><br/>

			
			<div class="container">
					<body>
						<div class="container">
							<form class="form-signin" method="post" id="add-customer">
								<h2 class="form-signin-heading">Add Customer</h2><hr />
									<form action = 'addcustomer.php'  method = 'post'>
										Customer ID <input type = "text" class="form-control" placeholder = "CustomerID" name = 'customerid' placeholder = 'Customer ID'><br>	
										Last Name <input type = "text" class="form-control"  class="form-group"name = 'lastname' placeholder = 'Last Name'><br>
										First Name <input type = "text" class="form-control" class="form-group"   name = 'firstname' placeholder = 'First Name'><br>	
										Middle Initial <input type = "text" class="form-control" class="form-group"   name = 'middlename' placeholder = 'Middle Initial'><br>
										Address <input type = "text"class="form-control" class ="form-group" name = 'address' placeholder = 'Customer Address'><br>	
										Email <input type = "text"class="form-control" class="form-group" name = 'email' placeholder = 'Customer Email'><br>
										<input type = 'submit'  class="btn btn-success" name = 'Save' value = 'Save Customer'><br>
										<br>
										<input type = 'submit'  class="btn btn-success" name = 'back' value ='Back' ><br>
									</form>
							</form>	
						</div>
					</body>
			</div>
	</html>