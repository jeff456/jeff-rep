<?php
	if(isset($_POST['pass'])){
		$cel = $_POST['in_cel'];
		
		
		$add = 273.15;
		$total =0;
		
		$total = $cel + $add;
		
		echo "Celsius: $cel";
		echo"<br>";
		echo "Kelvin: $total";
		echo"<br>";
		
	}
?>

<html>
	<head></head>
	<body>
	
			<br>
			<form action = 'converter.php' method = 'post'>
				Input Temperature in Celsius <input type = "text" name = 'in_cel' placeholder = 'Celsius'>
				<br>
				<br>
				<input type = 'submit' name = 'pass' value = 'Check Temperature'><br>
			</form>
	</body>
</html>