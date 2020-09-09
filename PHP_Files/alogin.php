<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="css/alogin.css">
</head>
<body>
<div class="container">
<form action="alogin.php" method="POST">
<br><b><u>ADMIN LOGIN</u></b><br><br>
<div class="input">
Admin Name: <input type="text" name="fname" size="20" placeholder="Enter your Name" required><br><br>
Password:<input type="password" name="password" size="20" placeholder="Enter password" required><br><br>
<input type="submit" value="login" id="login" name="login">
</div>
<br><a href="h.html">HOME</a><br>
<?php
session_start();
require('connection.php');
$myusername=$_POST['fname'];
$mypassword=$_POST['password'];
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM admin WHERE fname='$myusername' and password='$mypassword'" or die(mysql_error());
$result=mysql_query($sql) or die(mysql_error());
$count=mysql_num_rows($result);
if($count==1)
{
	$user = mysql_fetch_assoc($result);
	$_SESSION['id'] = $user['id'];
	header("location:r.php");
}
else 
{
	$_SESSION['message'] = "Wrong Username or Password";
}
?>
</div>
</form>
</body>
</html>