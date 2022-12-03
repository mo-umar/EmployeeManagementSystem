<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Upload and Download File</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .form {
      width: 100%;
      display: inline-block;
      position: inherit;
      padding: 6px;
    }

    .label {
      padding: 10px;
      width: 10%;
    }

    .input {
      position: inherit;
      padding: 3px;
      margin-left: 2.3%;
    }

    .btn {
      margin-left: 6.5%;
      background-color: blue;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['save'])) {
    $target_dir = "Uploaded_Files/";
    $target_file = $target_dir . date("dmYhis") . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "pdf") {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $files = date("dmYhis") . basename($_FILES["file"]["name"]);
      } else {
        echo "Error Uploading File";
        exit;
      }
    } else {
      echo "File Not Supported";
      exit;
    }
    $filename = $_POST['filename'];
    $location = "Uploaded_Files/" . $files;
    $sqli = "INSERT INTO `tblfiles` (`FileName`, `Location`) VALUES ('{$filename}','{$location}')";
    $result = mysqli_query($con, $sqli);
    if ($result) {
      echo "File has been uploaded";
    };
  }
  ?>

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
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Upload and Download File</h4>
            </div>
            <center>
              <form class="form" method="post" action="" enctype="multipart/form-data">
                <label>Filename:</label>
                <input type="text" name="filename"> <br/><br/>
                <div style="margin-left: 9%">
                  <label>File:</label>
                  <input type="file" name="file"> <br/><br/>
                </div>
                <button type="submit" name="save" class="btn"><i class="fa fa-upload fw-fa"></i> Upload</button>
              </form>
            </center>
            <br>
            <div class="container">
              <table id="demo" class="table table-bordered">
                <thead>
                  <tr>
                    <td>FileName</td>
                    <td>Download</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sqli = "SELECT * FROM `tblfiles`";
                  $res = mysqli_query($con, $sqli);
                  while ($row = mysqli_fetch_array($res)) {
                    echo '<tr>';
                    echo '<td>' . $row['FileName'] . '</td>';
                    echo '<td><a class="btn" href="' . $row['Location'] . '">Download</a></td>';
                    echo '</tr>';
                  }
                  mysqli_close($con);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
  </script>
</body>

</html>