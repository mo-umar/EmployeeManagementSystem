<?php
// Development Connection
$con = mysqli_connect("localhost","root","","swe4633_grade_average");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>
