<!DOCTYPE html>
<html>
<head>
    <title>BINARY</title>
</head>
<body>
<br>
    <form action="#" method="POST">
        <form action="#" method="POST">
    <input type="text" name="first" placeholder="First Value">
    <br>
	<br>
    <input type="text" name="second" placeholder="Second Value">
    <input type="submit" name="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
$f = $_POST['first'];
$s = $_POST['second'];

echo decbin($f);
echo "<br>";
echo decbin($s);
echo "<br>";
$sol = $f + $s;
$res = decbin($sol);
echo $res;

}

?>