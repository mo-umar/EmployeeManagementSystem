<?php
session_start();
include_once 'dbcon.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Employee Management System</title>

  <style>
  body {
  height: 100%;
  min-width: 100vh;
  background-image: url("LandingPage.jpg");
}

.landing h1 {
  color: #6b83b7;
  text-align: center;
  margin: 20vh;
  font-family: Verdana, sans-serif;
  font-size: 50px;
  
}

.myButton {
	background-color: #545e91;
	border-radius: 8px;
	display: inline-block;
  color: #241f31;
	cursor: pointer;
	font-family: Verdana, sans-serif;
	font-size: 20px;
	font-weight: bold;
	padding: 13px 32px;
	text-decoration: none;
  margin: 0;
  position: absolute;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.myButton:hover {
	background-color: #6b83b7;
}
.myButton:active {
	position: relative;
	top: 1px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #545e91;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color:slategrey;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 8%;
   text-align: center;
   font-size: 20px;
   color: #c0bfbc;
}
  </style>
</head>

<body>
  <div class="landing-page">
  <div class="landing">
  <ul>
                <li style="float:right"><a href="login.php">Login</a></li>
                <li style="float:right"><a href="register.php">Sign Up</a></li>
  </ul>
  <h1>Employee Management System</h1>
  </div>
 <div class="footer"> 
   &copy; 2022 Employee Management System
 </div>
  </div>
</body>

</html>
