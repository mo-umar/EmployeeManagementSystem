<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_grade']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_grade']);

    $query = "DELETE FROM grade_average WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Grade Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Grade Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}