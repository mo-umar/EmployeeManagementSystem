<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_salary']))
{
    $SalaryID = mysqli_real_escape_string($con, $_POST['delete_salary']);

    $query = "DELETE FROM salary WHERE SalaryID ='$SalaryID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: salary.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: salary.php");
        exit(0);
    }
}


if(isset($_POST['save_salary']))
{
    $EmployeeID = mysqli_real_escape_string($con, $_POST['EmployeeID']);
    $BasicSalary = mysqli_real_escape_string($con, $_POST['BasicSalary']);
    $Overtime = mysqli_real_escape_string($con, $_POST['Overtime']);
    $Bonus = mysqli_real_escape_string($con, $_POST['Bonus']);

    $query = "INSERT INTO salary (EmployeeID,BasicSalary,Overtime,Bonus) VALUES ('$EmployeeID','$BasicSalary','$Overtime','$Bonus')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Created Successfully";
        header("Location: add_salary.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Created";
        header("Location: add_salary.php");
        exit(0);
    }
}

?>