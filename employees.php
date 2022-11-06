<?php
    session_start();
    require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >

    <link rel="stylesheet" href="style.css">
    
    <title>Employee Management System</title>
</head>
<body>
<div class="sidebar">
  <h4>Employee Management System</h4><br>
  <a href="employees.php">Employees</a>
  <a href="add_employees.php">Add Employees</a>
  <a href="departments.php">Departments</a>
  <a href="add_departments.php">Add Departments</a>
  <a href="salary.php">Salary</a>
  <a href="add_salary.php">Add Salary</a>
  <a href="leave.php">Leave</a>
</div>
  
  <div class="content">
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Display Employees Information
                            <a href="add_employees.php" class="btn btn-primary float-end">New Employee</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Department ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>DOB</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM employees";
                                    $query_run = mysqli_query($con, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $employees)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $employees['EmployeeID']; ?></td>
                                                <td><?= $employees['DepartmentID']; ?></td>
                                                <td><?= $employees['FirstName']; ?></td>
                                                <td><?= $employees['LastName']; ?></td>
                                                <td><?= $employees['Email']; ?></td>
                                                <td><?= $employees['PhoneNumber']; ?></td>
                                                <td><?= $employees['HouseAddress']; ?></td>
                                                <td><?= $employees['DOB']; ?></td>
                                                
                                                <td>
                                                    <form action="query_employee.php" method="POST">
                                                        <button type="submit" name="delete_employee" value="<?=$employees['EmployeeID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
