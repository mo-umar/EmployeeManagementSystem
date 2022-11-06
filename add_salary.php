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
                        <h4>Add Salary Information
                            <a href="salary.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="query_salary.php" method="POST">

                           
                            <div class="mb-3">
                                <label>Employee ID</label>
                                <input type="text" placeholder="Employee ID" name="EmployeeID" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Basic Salary</label>
                                <input type="number" placeholder="Basic Salary" min="0.00" step="0.01" name="BasicSalary" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Overtime</label>
                                <input type="number" placeholder="Overtime" min="0.00" step="0.01" name="Overtime" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Bonus</label>
                                <input type="number" placeholder="Bonus" min="0.00" step="0.01" name="Bonus" class="form-control">
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="save_salary" class="btn btn-primary">Save Salary</button>
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
