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
  <h4>Employee Management System</h4><hr>
  <a href="employees.php">Employees</a>
  <a href="add_employees.php">Add Employees</a>
  <a href="departments.php">Departments</a>
  <a href="add_departments.php">Add Departments</a>
  <a href="salary.php">Salary</a>
  <a href="add_salary.php">Add Salary</a>
  <a href="leave.php">Leave</a>
  <a href="add_leave.php">Add Leave</a>
  <a href="files.php">Files</a>
  <hr>
  <?php if (isset($_SESSION['usr_id'])) { ?>
                <center><p>Signed as <?php echo $_SESSION['usr_name']; ?></p></center>
                <a href="logout.php">Log Out</a>
                <?php } ?>
</div>

  <div class="content">
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Employee Information
                            <a href="employees.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="query_employee.php" method="POST">

                            <div class="mb-3">
                                <label>Department ID</label>
                                <input type="text" placeholder="Department ID" name="DepartmentID" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" placeholder="First Name" name="FirstName" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name" name="LastName" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" placeholder="Email" name="Email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="text" placeholder="###-###-####" name="PhoneNumber" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" placeholder="1000 Chastain Rd NW, Kennesaw, GA 30144" name="HouseAddress" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Date Of Birth</label>
                                <input type="text" placeholder="DD-MM-YYYY" name="DOB" class="form-control">
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="save_employee" class="btn btn-primary">Save Employee</button>
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
