<?php
session_start();




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

<style type="text/css">
body{
    background:#f1f1f1;
}

.form-signin {
    max-width: 500px;
    padding: 19px 29px 29px;
    margin: 0 auto;
    //margin-top:90px;
    background-color: #fff;
    
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
            
    font-family:Tahoma, Geneva, sans-serif;
    color:#990000;
    font-weight:lighter;
}

.form-signin .form-signin-heading{
    color:#00A2D1;
}
.form-signin input[type="text"],
.form-signin input[type="password"],
.form-signin input[type="email"] {
    font-size: 16px;
    height: auto;
    padding: 7px 9px;
}

.signin-form
{
    //border:solid red 1px;
    margin-top:80px;
}
.navbar-brand{
    font-family:"Times New Roman";
}
#btn-submit{
    height:45px;
}
</style>

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
        <input type="text" class="form-control" placeholder="Username" name="username" required />
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