<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_departments']))
{
    $DepartmentID = mysqli_real_escape_string($con, $_POST['delete_departments']);

    $query = "DELETE FROM departments WHERE DepartmentID ='$DepartmentID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: departments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: departments.php");
        exit(0);
    }
}


if(isset($_POST['save_department']))
{
    $DepartmentName = mysqli_real_escape_string($con, $_POST['DepartmentName']);
    $DepartmentDescription = mysqli_real_escape_string($con, $_POST['DepartmentDescription']);
    

    $query = "INSERT INTO departments (DepartmentName,DepartmentDescription) VALUES ('$DepartmentName','$DepartmentDescription')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Created Successfully";
        header("Location: add_departments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Created";
        header("Location: add_departments.php");
        exit(0);
    }
}

?>