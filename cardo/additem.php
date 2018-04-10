<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}


	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
		if(isset($_POST['Save'])){
				$itemID = $_POST['itemid'];
				$itemName = $_POST['name'];
				$itemWeight = $_POST['weight'];
				$status = $_POST['status'];
				
				
				
				$freight = 0;
				$vat = .20;
				$total = 0;
				$fare = 0;
				$delivery = 15;
				
				
				if($_POST['weight'] > 1000 ){
					
					$fare = 50;
					$total = ($fare * $vat) + $delivery;
					$freight = $total + $fare;
				}else{
					$fare = 25;
					$total = ($fare * $vat) + $delivery;
					$freight = $total + $fare;
				}
				
				
				$sql = "INSERT INTO items VALUES ('{$itemID}', '{$itemName}', '{$itemWeight}', '{$freight}', '{$status}')";
				mysqli_query($con,$sql) or die(mysqli_error());
				header("Location: indexitem.php");
				
					$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
					$userRow=$query->fetch_array();
					$DBcon->close();
		
				
				
		}else if(isset($_POST['back'])){
				header("Location: indexitem.php");
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
								<h2 class="form-signin-heading">Add Item</h2><hr />
									<form action = 'additem.php'  method = 'post'>
										Item ID <input type = "text" class="form-control" class = "form-group" name = 'itemid' placeholder = 'Item ID'><br>	
										Item Name <input type = "text" class="form-control"  class="form-group"name = 'name' placeholder = 'Item Name'><br>
										Item Weight <input type = "text" class="form-control" class="form-group"   name = 'weight' placeholder = 'Weight'><br>	
										
										Status	<form class="form-control"  class="form-group"  name = 'status'  value = '<?php echo $_POST['status']; ?>'><br>
										<select class="form-control" id="sel1" name = 'status' value = $_POST['status']; ?>'><br>>
										<option>Pending</option>
										<option>Arrived</option>
										<option>Received</option>
										
										
										
										<input type = 'submit'  class="btn btn-success" name = 'Save' value = 'Save Item'><br>
										<br>
										<input type = 'submit'  class="btn btn-success" name = 'back' value ='Back' ><br>
									</form>
							</form>	
						</div>
					</body>
			</div>
	</html>