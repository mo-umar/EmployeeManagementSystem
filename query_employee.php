<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_employee']))
{
    $EmployeeID = mysqli_real_escape_string($con, $_POST['delete_employee']);

    $query = "DELETE FROM employees WHERE EmployeeID ='$EmployeeID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: employees.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: employees.php");
        exit(0);
    }
}


if(isset($_POST['save_employee']))
{
    $DepartmentID = mysqli_real_escape_string($con, $_POST['DepartmentID']);
    $FirstName = mysqli_real_escape_string($con, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($con, $_POST['LastName']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $PhoneNumber = mysqli_real_escape_string($con, $_POST['PhoneNumber']);
    $HouseAddress = mysqli_real_escape_string($con, $_POST['HouseAddress']);
    $DOB = mysqli_real_escape_string($con, $_POST['DOB']);

    $query = "INSERT INTO employees (DepartmentID,FirstName,LastName,Email,PhoneNumber,HouseAddress,DOB) VALUES ('$DepartmentID','$FirstName','$LastName','$Email','$PhoneNumber','$HouseAddress','$DOB')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Created Successfully";
        header("Location: add_employees.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Created";
        header("Location: add_employees.php");
        exit(0);
    }
}

?>