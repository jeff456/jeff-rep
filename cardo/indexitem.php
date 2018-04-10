<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}

	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
	if(isset($_GET['delete'])){         
       
		
		$itemID = $_GET['itemid'];
		$sql = "DELETE FROM items WHERE itemid = '{$itemID}'";
		mysqli_query($con,$sql) or die(mysqli_error());
		header("Location: indexitem.php");

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
						<li class="active"><a href="indexitem.php">Items</a></li>
						<li ><a href="indexreceiver.php">Receiver</a></li>
						<li><a href="indextrack.php">Tracking</a></li>
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
						<center><h1>Items</h1></center>
							<tr bgcolor='lightgreen'>
								<td>Item ID</td>
								<td>Item Name</td>
								<td>Item Weight</td>
								<td>Freight</td>
								<td>Item Status</td>
								<td>Edit</td>
								<td>Delete</td>
							</tr>
						<?php
							$sql = "SELECT * FROM items ORDER BY itemID";
							$result = mysqli_query($con,$sql) or die(mysqli_error());
							
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";   
								echo "<td>".$row[4]."</td>"; 
								echo "<td>";		
						?>
						
						<form action = 'edititem.php' method = 'post'>
								<input type = 'hidden' name = 'itemid' value = '<?php echo $row[0]; ?>'>
								<input type = 'hidden' name = 'itemname' value = '<?php echo $row[1]; ?>'>
								<input type = 'hidden' name = 'weight' value = '<?php echo $row[2]; ?>'>
								<input type = 'hidden' name = 'freight' value = '<?php echo $row[3]; ?>'>
								<input type = 'submit' name = 'edit' value = "Edit">
								</form>
								<td>
								<form action = 'indexitem.php' action = 'post'>
								<input type = 'hidden' name = 'itemid' value = '<?php echo $row[0]; ?>'>
								<input type = 'submit' name = 'delete' value = "Delete">
								</td>
							</form>
						
					
						<?php
								echo"</td>";
								echo "</tr>";
							}
						?>		
						
						</table>
							<form action = 'additem.php' method = 'post'>
							<input type = 'submit' class="btn btn-success" value = 'Add Item'>
							
						</form>
						</form>
					
						<form action = 'searchitem.php' method = 'post'>
							<input type = 'submit'  class="btn btn-success" value = 'Search item'>
						
			</div>
	</body>
</html>