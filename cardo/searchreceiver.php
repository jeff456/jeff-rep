<?php
		$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con)); 
?>
<html>
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
            <li ><a href="indexcustomer.php">Customer</a></li>
            <li ><a href="indexitem.php">Items</a></li>
			<li class="active" ><a href="indexreceiver.php">Receiver</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	 <br/><br/><br/>
	  <div class="container">

<h1>RECEIVERINFORMATION</h1>
	<form action = 'searchreceiver.php'  method = 'post'>
		<table class="table table-bordered" align = center width='100%'   border = 0>
		
			<tr bgcolor='lightblue'>
				<td>Receiver ID</td>
				<td>Last Name</td>
				<td>First Name</td>
				<td>Address</td>
			</tr>
		<?php
			$query = "";
			if(isset($_POST['search'])){
				$receiverLname= $_POST['receiverlname'];
				$query = "CALL searchReceiver ('{$receiverLname}')";
			}else{
				$query = "CALL getReceiver()";
			}
			$sql= mysqli_query($con, $query) or die("Error:" .mysqli_error());
	
			
			while($row = mysqli_fetch_array($sql)){
				echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]. "</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "</tr>";
			}
		?>
		</table>
		<br>
		Search: <input type = 'text' name = 'receiverlname' placeholder = 'Search' size = '15' autocomplete = 'off'>
				<input type = 'submit'  class="btn btn-success" value = 'Search' name = 'search'>
	</form>
</body>