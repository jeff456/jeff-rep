<?php
	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con)); 
	if(isset($_POST['Update'])){
		$trackingNum = $_POST['track'];
		$CustomerID = $_POST['customer'];
		$itemID = $_POST['item'];
		$receiverID = $_POST['receiver'];
		$origtrackingNum = $_POST['origtrackingNum'];
		
		
		
		echo "<br>";
		echo "<br>";
		echo "<br>";
		//echo $trackingNum." ". $CustomerID. " ". $itemID." ". $receiverID." ". $origtrackingNum;
		$result = mysqli_query($con,"CALL updateTrack('{$trackingNum}', '{$CustomerID}', '{$itemID}', '{$receiverID}','{$origtrackingNum}')");
		
		if($result){
			header("Location: indextrack.php");
		}else{
			echo "<br>";
			echo "<br>";
			echo mysqli_error($con);
		}
		
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
            <li  ><a href="indexitem.php">Items</a></li>
			<li><a href="indexreceiver.php">Receiver</a></li>
			<li class="active" ><a href="indextrack.php">Tracking </a></li>
          </ul> 
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	 <br/><br/><br/>
	  <div class="container">
	<head></head>
	<body>
	
	<div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Edit Item</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
	<head></head>
	<body>
		<form action = 'edittrack.php' method = 'post'>
			Transaction Number <input type = "text" class="form-control"  class="form-group" name = 'track'  value = '<?php echo $_POST['track']; ?>'><br>
			<input type = "hidden" class="form-control"  class="form-group" name = 'origtrackingNum' value = '<?php echo $_POST['track']; ?>'>
			
			Customer ID <input type = "text"class="form-control"  class="form-group"  name = 'customer'  value = '<?php echo $_POST['customer']; ?>'><br>
	
			Item ID <input type = "text"class="form-control"  class="form-group"  name = 'item'  value = '<?php echo $_POST['item']; ?>'><br>
			
			Receiver ID <input type = "text" class="form-control"  class="form-group" name = 'receiver' value = '<?php echo $_POST['receiver']; ?>'><br>

			
			<input type = 'submit' name = 'Update' value = 'Update Track'>
			<br></br>
			<div>
			<input type = 'submit' name = 'Back' value = 'Back'>
			</div>
		</form>
	</body>
</html>