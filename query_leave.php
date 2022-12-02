<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_leave']))
{
    $leaveID = mysqli_real_escape_string($con, $_POST['delete_leave']);

    $query = "DELETE FROM leaves WHERE leaveID ='$leaveID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: leave.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: leave.php");
        exit(0);
    }
}


if(isset($_POST['save_leave']))
{
    $LeaveStart = mysqli_real_escape_string($con, $_POST['LeaveStart']);
    $LeaveEnd = mysqli_real_escape_string($con, $_POST['LeaveEnd']);
    $LeaveDescription = mysqli_real_escape_string($con, $_POST['LeaveDescription']);

    $query = "INSERT INTO leaves (LeaveStart,LeaveEnd,LeaveDescription) VALUES ('$LeaveStart','$LeaveEnd','$LeaveDescription')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Created Successfully";
        header("Location: add_leave.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Created";
        header("Location: add_leave.php");
        exit(0);
    }
}

if(isset($_POST['approve_leave']))
{
    $leaveID = mysqli_real_escape_string($con, $_POST['approve_leave']);

    $query = "UPDATE leaves SET Decision='Approve' WHERE leaveID ='$leaveID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Decision Updated Successfully";
        header("Location: leave.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Decision Not Updated";
        header("Location: leave.php");
        exit(0);
    }
}

if(isset($_POST['reject_leave']))
{
    $leaveID = mysqli_real_escape_string($con, $_POST['reject_leave']);

    $query = "UPDATE leaves SET Decision='Reject' WHERE leaveID ='$leaveID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Decision Updated Successfully";
        header("Location: leave.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Decision Not Updated";
        header("Location: leave.php");
        exit(0);
    }
}
?>