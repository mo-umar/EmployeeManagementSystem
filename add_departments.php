<?php
session_start();
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
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Department Information
                            <a href="departments.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="query_department.php" method="POST">

                           
                            <div class="mb-3">
                                <label>Department Name</label>
                                <input type="text" placeholder="Department Name" name="DepartmentName" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Departemnt Description</label>
                                <input type="text" placeholder="Departemnt Description" name="DepartmentDescription" class="form-control">
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="save_department" class="btn btn-primary">Save Department</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
