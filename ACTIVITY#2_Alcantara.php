<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="#" method="POST">

    <input type="text" name="name">
    <input type="submit" name="submit" id="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
    $input = $_POST['name'];

    echo $input."<br>";
    echo strrev($input);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

        <form action="#" method="POST">
    <input type="text" name="rad" placeholder="Radius">
    <input type="submit" name="submit" id="submit">

    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
$rad = $_POST['rad'];
$f = 4/3;
$pi = 3.14;
$r = pow($rad,3);

$tot = $f * $pi;
$al = $tot * $r;
$ro = round($al,1);
echo $ro;
}

?>