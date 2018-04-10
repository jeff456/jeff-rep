
 <?php
 
 if(isset($_POST['pass'])){
	$rad = $_POST['radius'];
	
	$a = 4/3;
	$b =  pow($rad,3);
	$pi = 3.14159;
	
	
	
	$volume = $a * $pi * $b;
  

	  echo "The volume is: $volume";
 }
 
 
 
 ?>
 
 
 
<html>
<br>
	<head></head>
	<body>
	
			<br>
			<form action = 'sphere.php' method = 'post'>
				Input Radius of a Sphere <input type = "text" name = 'radius' placeholder = 'Radius'>
				<br>
				<br>
				<input type = 'submit' name = 'pass' value = 'Answer'><br>
			</form>
	</body>
</html>