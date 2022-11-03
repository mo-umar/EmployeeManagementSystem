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
  <a href="#employees">Employees</a>
  <a href="department">Department</a>
  <a href="#salary">Salary</a>
  <a href="#leave">Leave</a>
</div>

  <div class="content">
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Student Grade
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="query.php" method="POST">

                            <div class="mb-3">
                                <label>Student ID</label>
                                <input type="text" name="student_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Assignments</label>
                                <input type="text" name="assignments" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Quizzes</label>
                                <input type="text" name="quizzes" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Test</label>
                                <input type="text" name="tests" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Final Exam</label>
                                <input type="text" name="final_exam" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Project</label>
                                <input type="text" name="project" class="form-control">
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="save_grade" class="btn btn-primary">Save Grade</button>
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
