<form action="sample.php" method="POST">

    Enter the radius = <input type="text" name="radius"><br>
    Enter the height = <input type="text" name="height"><br>
    <input type="submit" name="submit" value="Calculate"><br>
</form>




<?php
//calculates the volume of a cylinder
//Volym = π r2 h
function volumeCylinder($r,$h) 
{
    $pi = 3.141592653589;
    $volume = 2 * pi *radius *(radius + height);
    //return volume;
    echo "The volume is", volume;
}






?>
