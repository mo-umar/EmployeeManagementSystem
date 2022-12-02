<?php
session_start();

if (isset($_SESSION['usr_id'])) {
    header("Location: landingpage.php");
}

include_once 'dbcon.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if (strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if ($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if (mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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

    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if ($error) echo $name; ?>" class="form-control" />
            <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>

            <label for="name">Email</label>
            <input type="text" name="email" placeholder="Email" required value="<?php if ($error) echo $email; ?>" class="form-control" />
            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>

            <label for="name">Password</label>
            <input type="password" name="password" placeholder="Password" required class="form-control" />
            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>

            <label for="name">Confirm Password</label>
            <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
            <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>

            <input type="submit" name="signup" value="Sign Up" class="registerbtn" />

            <div class="container signin"><span class="text-success"><?php if (isset($successmsg)) {echo $successmsg;} ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) {echo $errormsg;} ?></span></div>
    </form>

    <div class="container signin"> Already Registered? <a href="login.php">Login Here</a></div>

</body>
</html>