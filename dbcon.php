<?php

// Local Connection
$con = mysqli_connect("localhost","root","","emsdb");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}


/*
// Remote Connection AWS
$con = mysqli_connect("localhost","admin","1234567890","emsdb");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
*/

?>
