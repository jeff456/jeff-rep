<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}



	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
	if(isset($_POST['Save'])){
		$receiverID = $_POST['receiverid'];
		$receiverLname = $_POST['lname'];
		$receiverFname = $_POST['fname'];
		$receiverAddress = $_POST['address'];
		$sql = "INSERT INTO receiver VALUES ('{$receiverID}', '{$receiverLname}', '{$receiverFname}', '{$receiverAddress}')";
		mysqli_query($con,$sql) or die(mysqli_error());
		header("Location: indexreceiver.php");
		
		$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
		$userRow=$query->fetch_array();
		$DBcon->close();
	}	
?>
<html>

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
						<li ><a href="indexcustomer.php">Customer</a></li>
						<li><a href="indexitem.php">Items</a></li>
						<li class="active"><a href="indexreceiver.php">Receiver</a></li>
					</ul>
						<ul class="nav navbar-nav navbar-right">
						</ul>
				</div>
		</div>
												  
	</nav>									
</body>
												
												
		<br><br/>
		<br><br/>
												 
													 
		<div class="container">
			<body>								
				<form class="form-signin" method="post" id="register-form">
				<h2 class="form-signin-heading">Add Receiver</h2><hr />		
						<body>
							<form action = 'addreceiver.php' method = 'post'>
								Receiver ID <input type = "text" class="form-control"  class="form-group"  name = 'receiverid' placeholder = 'Receiver ID'><br>
								Last Name <input type = "text" class="form-control"  class="form-group" name = 'lname' placeholder = 'Last Name'><br>
								First Name <input type = "text" class="form-control"  class="form-group" name = 'fname' placeholder = 'First Name'><br>
								Address <input type = "text" class="form-control"  class="form-group" name = 'address' placeholder = 'Customer Address'><br>
								<input type = 'submit'  class="btn btn-success"  name = 'Save' value = 'Save Receiver'><br>
							</form>
						</body>
				</form>
			</body>
		</div>
</html>