<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['isloggedin'])) {
	header("Location: index.php");
}
	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con));
	if(isset($_GET['Delete'])){        
		$customerID = $_GET['customerid'];
		$sql = "DELETE FROM customer WHERE customerid = '{$customerID}'";
		mysqli_query($con,$sql) or die(mysqli_error($con));
		header("Location: indexcustomer.php");
		
		
		


$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
	}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  Customer </title>

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
			
            <li class="active"><a href="indexcustomer.php">Customer</a></li>
            <li><a href="indexitem.php">Items</a></li>
			<li><a href="indexreceiver.php">Receiver</a></li>
			<li><a href="indextrack.php">Tracking</a></li>
		
          </ul>
          <ul class="nav navbar-nav navbar-right">
			 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
		  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</body>


	 <br/><br/><br/>
	 
	 


<html>
		<div class="container">
			<table class="table table-bordered" align = center width='100%'  border = 0>
						<center><h1>Customers</h1></center>
						<tr bgcolor='lightgreen'>
							<td>Customer ID</td>
							<td>Last Name</td>
							<td>First Name</td>
							<td>Middle Initial</td>
							<td>Address</td>
							<td>Email</td>
							<td>Edit</td>
							<td>Delete</td>					
						</tr>
									
									
						<?php
							$sql = "SELECT * FROM customer ORDER BY customerLname";
							$result = mysqli_query($con,$sql) or die(mysqli_error());
							while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td>";
							echo "<td>".$row[4]."</td>";
							echo "<td>".$row[5]."</td>";
							echo "<td>";
						?>
			<form action = 'editcustomer.php' method = 'post'>
				<input type = 'hidden' name = 'customerid' value = '<?php echo $row[0]; ?>'>
				<input type = 'hidden' name = 'lastname' value = '<?php echo $row[1]; ?>'>
				<input type = 'hidden' name = 'firstname' value = '<?php echo $row[2]; ?>'>
				<input type = 'hidden' name = 'middlename' value = '<?php echo $row[3]; ?>'>
				<input type = 'hidden' name = 'address' value = '<?php echo $row[4]; ?>'>
				<input type = 'hidden' name = 'email' value = '<?php echo $row[5]; ?>'>
				<input type = 'submit'  name = 'edit' value = "Edit">
			</form>
						

								
			<td>
				<form action = 'indexcustomer.php' action = 'post'>
					<input type = 'hidden' class="btn btn-warning" name = 'customerid' value = '<?php echo $row[0]; ?>'>
					<input type = 'submit' name = 'Delete' value = "Delete">
				</form>
			</td>
								
											
			<?php
				echo"</td>";
				echo "</tr>";
				}
			?>		
						
						
					
</table>

			<body>
				<form action = 'addcustomer.php' method = 'post'>
					<input type = 'submit' class="btn btn-success"   value = 'Add Customer'>
				</form>
										
				<form action = 'searchcustomer.php' method = 'post'>
					<input type = 'submit'  class="btn btn-success" value = 'Search Customer'>
				</form>					
			</body>
		</div>
</html>