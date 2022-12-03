<?php
session_start();

if (isset($_SESSION['usr_id']) != "") {
    header("Location: landingpage.php");
}

include_once 'dbcon.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email . "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        header("Location: employees.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: darkblue;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Login</h1>
        <p>Please Login to your account.</p>
        <hr>
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">

            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" placeholder="Your Email" required class="form-control" />
            </div>

            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" placeholder="Your Password" required class="form-control" />
            </div>

            <div class="form-group">
                <input type="submit" name="login" value="Login" class="registerbtn" />
            </div>
        </form>

        <div class="container signin"><span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg;} ?></span></div>

        <div class="container signin">New User? <a href="register.php">Sign Up Here</a></div>
    </div>

</body>
</html>