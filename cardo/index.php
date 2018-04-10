<?php
session_start();
require_once 'dbconnect.php';



if (isset($_POST['btn-login'])) {
	
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	
	$username = $DBcon->real_escape_string($username);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, username, password FROM tbl_users WHERE username='$username'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		$_SESSION['isloggedin'] = 'Yes';
		header("Location: indexcustomer.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>


<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form" action="index.php" >
      
        <h2 align = 'center'  class="form-signin-heading">ADMIN</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="username" class="form-control" placeholder="Username" name="username" required />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-default" name="btn-login" id="btn-login" value = "LOGIN">
			</button> 
  
        </div>  
        
        
      
      </form>

    </div>
    
</div>
</body>
</html>