<?php
	$con = mysqli_connect("localhost","root","","cargo_db") or die(mysqli_error($con)); 
	if(isset($_POST['Update'])){
		$itemID = $_POST['itemid'];
		$itemidorig = $_POST['itemidorig'];
		$itemName = $_POST['itemname'];
		$itemWeight = $_POST['weight'];
		$itemstatus = $_POST['status'];
		//$freight = $_POST['freight'];
		
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
		
		echo $itemID." ". $itemName. " ". $itemdorig;
		$result = mysqli_query($con,"CALL updateItem('{$itemID}', '{$itemName}', '{$itemWeight}', '{$freight}', '{$itemidorig}','{$itemstatus}')");
		
		if($result){
			header("Location: indexitem.php");
		}else{
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
            <li class="active" ><a href="indexitem.php">Items</a></li>
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
      
        <h2 class="form-signin-heading">Edit Item</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
<html>
	<head></head>
	<body>
		<form action = 'edititem.php' method = 'post'>
			Item ID <input type = "text" class="form-control"  class="form-group" name = 'itemid'  value = '<?php echo $_POST['itemid']; ?>'><br>
			<input type = "hidden" class="form-control"  class="form-group" name = 'itemidorig' placeholder = 'Customer ID' value = '<?php echo $_POST['itemid']; ?>'>
			
			Item Name <input type = "text"class="form-control"  class="form-group"  name = 'itemname'  value = '<?php echo $_POST['itemname']; ?>'><br>
			
				<div class="form-group">
				
			Status	<form class="form-control"  class="form-group"  name = 'status'  value = '<?php echo $_POST['status']; ?>'><br>
				<select class="form-control" id="sel1" name = 'status' value = $_POST['status']; ?>'><br>>
				<option>Pending</option>
				<option>Arrived</option>
				<option>Received</option>
			</select>
			</div>
			Weight <input type = "text" class="form-control"  class="form-group" name = 'weight' value = '<?php echo $_POST['weight']; ?>'><br>

			
			<input type = 'submit' name = 'Update' value = 'Update Item'>
			<br></br>
			<div>
			<input type = 'submit' name = 'Back' value = 'Back'>
			</div>
		</form>

	</body>
</html>