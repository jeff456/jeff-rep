<?php
	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con)); 
	if(isset($_POST['Save'])){
		$receiverID = $_POST['receiverid'];
		$residorig = $_POST['residorig'];
		$receiverLname = $_POST['lname'];
		$receiverFname = $_POST['fname'];
		$receiverAddress = $_POST['address'];
		
		//echo $receiverID." ". $receiverLname. " ". $residorig;
		$result = mysqli_query($con,"CALL updateReceiver('{$receiverID}', '{$receiverLname}', '{$receiverFname}', '{$receiverAddress}','{$residorig}')");
		
		if($result){
			header("Location: indexreceiver.php");
		}else{
			echo mysqli_error($con);
		}
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
			<li class="active"><a href="indexreceiver.php">Receiver</a></li>
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
      
        <h2 class="form-signin-heading">Edit Receiver</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
<html>
	<head></head>
	<body>
		<form action = 'editreceiver.php' method = 'post'> 	
			Receiver ID <input type = "text" class="form-control"  class="form-group" name = 'receiverid'  value = '<?php echo $_POST['receiverid']; ?>'><br>
			<input type = "hidden" class="form-control"  class="form-group" name = 'residorig' placeholder = 'Customer ID' value = '<?php echo $_POST['receiverid']; ?>'>
			Last Name <input type = "text" class="form-control"  class="form-group" name = 'lname'  value = '<?php echo $_POST['lname']; ?>'><br>
			First Name <input type = "text" class="form-control"  class="form-group" name = 'fname' value = '<?php echo $_POST['fname']; ?>'><br>
			Address <input type = "text" class="form-control"  class="form-group" name = 'address'  value = '<?php echo $_POST['address']; ?>'><br>
			<input type = 'submit' name = 'Save' value = 'Update Receiver'>
			
			<br></br>
			<input type = 'submit' name = 'Back' value = 'Back'>
		</form>
		<form action = 'editreceiver.php' method = 'post'>
			
			
		</form>
	</body>
</html>