<?php

if(isset($_POST['pass'])){
$dividend = $_POST['x'];
$divisor = $_POST['y'];


$result0 = $dividend / $divisor;
$result1 = fmod($dividend, $divisor);

		echo"<br>";
		//echo "Qoutient of division: $result0";
		 echo "Reminder of division:"; echo round($result0);
		echo"<br>";
		echo "Reminder of division: $result1";
		}

?>



<html>
<br>
	<head></head>
	<body>
	
			<br>
			<form action = 'qoutient.php' method = 'post'>
				Input Dividend <input type = "text" name = 'x' placeholder = 'Dividend'> &nbsp
				Input Divisor<input type = "text" name = 'y' placeholder = 'Divisor'>
				<br>
				<br>
				<input type = 'submit' name = 'pass' value = 'Answer'><br>
			</form>
	</body>
</html>