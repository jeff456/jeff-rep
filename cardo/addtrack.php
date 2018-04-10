<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}


	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
	if(isset($_POST['Save'])){
		$trackingNum = $_POST['track'];
		$CustomerID = $_POST['customer'];
		$itemID = $_POST['item'];
		$receiverID = $_POST['receiver'];

		$sql = "INSERT INTO tracking VALUES ('{$trackingNum}', '{$CustomerID}', '{$itemID}', '{$receiverID}')";
		mysqli_query($con,$sql) or die(mysqli_error());
		header("Location: indextrack.php");
		
$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
	}	
?>

<html>
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
			<li><a href="indexreceiver.php">Receiver</a></li>
			<li class="active"><a href="addtrack.php">Tracking</a></li>
				</ul>
									<ul class="nav navbar-nav navbar-right"></ul>	
			</div>
		</div>	
	</nav>
</body>
	
													<br/><br/><br/>
		
		

		<div class="container">
			<body>
				<form class="form-signin" method="post" id="register-form">
						<h2 class="form-signin-heading">Add Item</h2><hr/>
						<form action = 'additem.php' method = 'post'>
								Tracking Number <input type = "text" class="form-control"  class="form-group" name = 'track' placeholder = 'Tracking Number' ><br>
								Customer ID <input type = "text" class="form-control"  class="form-group" name = 'customer' placeholder = 'Customer ID'><br>
								Item ID <input type = "text" class="form-control"  class="form-group" name = 'item' placeholder = 'Item ID'><br>
								Receiver ID <input type = "text" class="form-control"  class="form-group" name = 'receiver' placeholder = 'Receiver ID'><br>
								<input type = 'submit'   class="btn btn-success"  name = 'Save' value = 'Save Transaction'><br>
						</form>	
				</form>
			</body>
		</div>	
</html>