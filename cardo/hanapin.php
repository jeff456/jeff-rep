<?php
		$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con)); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Track your Item </title>

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
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	 <br/><br/><br/>
	  <div class="container">

<h1>Track</h1>
	<form action = 'hanapin.php'  method = 'post'>
		<table class="table table-bordered" align = center width='100%'   border = 0>
		<tr bgcolor='lightgreen'>
			<td>Customer Full Name</td>
			<td>Receiver Full Name</td>
			<td>Item Name</td>
			<td>Item Status</td>
		</tr>

		<?php
			$query = "";
			if(isset($_POST['search'])){
				$trackingNum= $_POST['track'];
				$query = "CALL theTrack ('{$trackingNum}')";
			
			$sql= mysqli_query($con, $query) or die("Error:" .mysqli_error());
	
			
			while($row = mysqli_fetch_array($sql)){
				echo "<tr>";

				echo "<td>".$row[1]." ".$row[2]." ".$row[3]."</td>";
				echo "<td>".$row[13]." ".$row[12]."</td>";
				echo "<td>".$row[7]."</td>";
				echo "<td>".$row[10]."</td>";
				echo "</tr>";
			}
			}
			
		?>	
		
		</table>
		<br>
		
						Search: <input type = 'text' name = 'track' placeholder = 'Search' size = '75' autocomplete = 'off'>
						<input type = 'submit'  value = 'Search' name = 'search'>

	</form>
</body>
</html>	