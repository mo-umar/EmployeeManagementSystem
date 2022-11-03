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
  <a href="#employees">Employees</a>
  <a href="department">Department</a>
  <a href="#salary">Salary</a>
  <a href="#leave">Leave</a>
  </div>
  
  <div class="content">
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Grade Details
                            <a href="enter_grade.php" class="btn btn-primary float-end">Add Grades</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Assignments</th>
                                    <th>Quizzes</th>
                                    <th>Tests</th>
                                    <th>Final Exam</th>
                                    <th>Project</th>
                                    <th>Average</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM grade_average";
                                    $query_run = mysqli_query($con, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $grade_average)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $grade_average['student_id']; ?></td>
                                                <td><?= $grade_average['assignments']; ?></td>
                                                <td><?= $grade_average['quizzes']; ?></td>
                                                <td><?= $grade_average['tests']; ?></td>
                                                <td><?= $grade_average['final_exam']; ?></td>
                                                <td><?= $grade_average['project']; ?></td>
                                                <td><?= ($grade_average['assignments'] + $grade_average['quizzes'] + 
                                                        $grade_average['tests'] + $grade_average['final_exam'] +
                                                        $grade_average['project']) / 5; ?></td>
                                                <?php
						                            if((($grade_average['assignments'] + $grade_average['quizzes'] + 
                                                    $grade_average['tests'] + $grade_average['final_exam'] +
                                                    $grade_average['project']) / 5) >=70){
							                            echo "<td style='background-color:green; color:#fff;'>Pass</td>";
						                            }else if((($grade_average['assignments'] + $grade_average['quizzes'] + 
                                                    $grade_average['tests'] + $grade_average['final_exam'] +
                                                    $grade_average['project']) / 5) < 70){
							                            echo "<td style='background-color:red; color:#fff;'>Fail</td>";
						                            }
					                            ?>
                                                
                                                <td>
                                                    <form action="query.php" method="POST">
                                                        <button type="submit" name="delete_grade" value="<?=$grade_average['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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
