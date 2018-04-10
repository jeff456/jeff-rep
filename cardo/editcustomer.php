<?php
	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con)); 
	if(isset($_POST['Save'])){
		$customerID = $_POST['customerid'];
		$customeridorig = $_POST['customeridorig'];
		$customerLname = $_POST['lastname'];
		$customerFname = $_POST['firstname'];
		$middleInitial = $_POST['middlename'];
		$customerAddress = $_POST['address'];
		$emailAddress = $_POST['email'];
		
		echo $customerID." ". $customerLname. " ". $customeridorig;
		$result = mysqli_query($con,"CALL updateCustomer('{$customerID}', '{$customerLname}', '{$customerFname}', '{$middleInitial}', '{$customerAddress}', '{$customeridorig}', '{$emailAddress}')");
		
		if($result){
			header("Location: indexcustomer.php");
		}else{
			echo mysqli_error($con);
		}
		
	}
?>
<html>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <li class="active"><a href="indexcustomer.php">Customer</a></li>
            <li><a href="indexitem.php">Items</a></li>
			<li><a href="indexreceiver.php">Receiver</a></li>
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
      
        <h2 class="form-signin-heading">Edit Customer</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
<html>
	<head></head>
	<body>
		<form action = 'editcustomer.php' method = 'post'>
			Customer ID <input type = "text" class="form-control"  class="form-group" name = 'customerid' placeholder = 'Customer ID' value = '<?php echo $_POST['customerid']; ?>'><br>
						<input type = "hidden" class="form-control"  class="form-group" name = 'customeridorig' placeholder = 'Customer ID' value = '<?php echo $_POST['customerid']; ?>'>
			Last Name <input type = "text" class="form-control"  class="form-group" name = 'lastname' placeholder = 'Last Name'  value = '<?php echo $_POST['lastname']; ?>'><br>
			First Name <input type = "text" class="form-control"  class="form-group" name = 'firstname' placeholder = 'First Name' value = '<?php echo $_POST['firstname']; ?>'><br>
			Middle Initial <input type = "text" class="form-control"  class="form-group" name = 'middlename' placeholder = 'Middle Initial' value = '<?php echo $_POST['middlename']; ?>'><br>
			Address <input type = "text" class="form-control"  class="form-group" name = 'address' placeholder = 'Address' value = '<?php echo $_POST['address']; ?>'><br>
			Email <input type = "text" class="form-control"  class="form-group" name = 'email' placeholder = 'Customer Email' value = '<?php echo $_POST['email']; ?>'><br>
			
			<input type = 'submit'  class="btn btn-success" name = 'Save' value = 'Update Customer'><br>
		</form>
	</body>
</html>