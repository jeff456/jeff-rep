	
<?php


	
	
	echo"<br>";
	if(isset($_POST['reverse'])){
		
			$one = $_POST['one'];
	$two = $_POST['two'];
	$three = $_POST['three'];
		echo "ANSWER: "; echo $three; echo " "; echo $two; echo " "; echo $one;
	}
?>
<html>
<head>
    <title>Reverse</title>
</head>
 
<body>

 
    <form action="problem1.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Input 1</td>
                <td><input type="text" name="one"></td>
            </tr>
            <tr> 
                <td>Input 2</td>
                <td><input type="text" name="two"></td>
            </tr>
            <tr> 
                <td>Input 3</td>
                <td><input type="text" name="three"></td>
            </tr>
			
			 <td><input type="submit" name="reverse" value="Display in reverse"></td>
        </table>
    </form>
	

</body>
</html>