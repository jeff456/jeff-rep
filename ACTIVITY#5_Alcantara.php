<html>
<head>
   <title></title>
</head>
<body>
   <form action="#" method="POST">
       <form action="#" method="POST">
   <input type="text" name="first" placeholder="1st Value">
   <br>
   <input type="text" name="second" placeholder="2nd Value">
   <input type="submit" name="submit">
   </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
$f = $_POST['first'];
$s = $_POST['second'];

echo '1st Value : ' . decbin($f);
echo "<br>";
echo '2nd Value : ' . decbin($s);
echo "<br>";
$sol = $f + $s;
$res = decbin($sol);
echo 'Answer : ' . $res;

}

?>