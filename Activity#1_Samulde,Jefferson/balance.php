
 <?php
 
 if(isset($_POST['pass'])){
	 $bracket = $_POST['brackets'];
	 
	 
 if ($_POST['brackets'] == "{}"){
		 
		  echo "$bracket";
		 echo"<br>";
		 echo "Valid";
		
	 }else{
		 echo "$bracket";
		 echo"<br>";
		 echo "Not Valid";
	 }
 }
 
 
 
 ?>
 
 
 
<html>
<br>
	<head></head>
	<body>
	
			<br>
			<form action = 'balance.php' method = 'post'>
				Input Brackets <input type = "text" name = 'brackets'>
				<br>
				<br>
				<input type = 'submit' name = 'pass' value = 'Answer'><br>
			</form>
	</body>
</html>