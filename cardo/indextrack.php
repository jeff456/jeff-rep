<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}


	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
	if(isset($_GET['delete'])){         
       
		
		$track = $_GET['track'];
		$sql = "DELETE FROM tracking WHERE trackNum = '{$track}'";
		mysqli_query($con,$sql) or die(mysqli_error());
		header("Location: indextrack.php");
		
		
$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
	}
?>




<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Track </title>
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
						<li ><a href="indexreceiver.php">Receiver</a></li>
						<li class="active"><a href="indextrack.php">Tracking</a></li>
						</ul>	 
					<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
				 </ul>
			</div>
							
		</div>
	</nav>
					
					
					
					
					
	 <br/><br/><br/>
	 
			<div class="container">

					
						<table class="table table-bordered" align = center width='100%'  border = 0>
						<center><h1>Transactions</h1></center>
							<tr bgcolor='lightgreen'>
								<td>Tracking Number</td>
								<td>Customer ID</td>
								<td>Item ID</td>
								<td>Receiver ID</td>
								<td>Action</td>
								<td>Action</td>
							</tr>
						<?php
							$sql = "SELECT * FROM tracking ORDER BY trackingNum";
							$result = mysqli_query($con,$sql) or die(mysqli_error());
							
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";   
								echo "<td>";		
						?>
								<form action = 'edittrack.php' method = 'post'>
									<input type = 'hidden' name = 'track' value = '<?php echo $row[0]; ?>'>
									<input type = 'hidden' name = 'customer' value = '<?php echo $row[1]; ?>'>
									<input type = 'hidden' name = 'item' value = '<?php echo $row[2]; ?>'>
									<input type = 'hidden' name = 'receiver' value = '<?php echo $row[3]; ?>'>
									<input type = 'submit'  name = 'edit' value = "Edit">
								</form>
								
						
						
						
							<td>
								<form action = 'indextrack.php' action = 'post'>
									<input type = 'hidden' name = 'track' value = '<?php echo $row[0]; ?>'>
									<input type = 'submit' name = 'delete' value = "Delete">
								</form>
							</td>
							
						
					
						<?php
								echo"</td>";
								echo "</tr>";
							}
						?>		
						
						</table>
							<form action = 'addtrack.php' method = 'post'>
							<input type = 'submit' class="btn btn-success" value = 'Add Transaction'>
							
						</form>
						</form>
						<br>
						<br>
						<form action = 'searchitem.php' method = 'post'>
							<input type = 'submit'  class="btn btn-success" value = 'Search item'>
						
			</div>
	</body>
</html>