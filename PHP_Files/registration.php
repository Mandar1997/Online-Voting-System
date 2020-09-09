<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<link rel="stylesheet" type="text/css" href="css/registration.css">
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function validateAge(){
	var x = document.getElementById("age").value;
	if(x < 18)
	{
		alert("Age should be above 18!");
	}
}
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}
</script>
</head>
<body>
<div class="container">
<form action="registration.php" method="POST">
<br><b><u>REGISTER HERE</u></b><br><br>
<div class="input">
<table align="center" cellpadding="5">
	<tr>
		<td align="left">First Name: </td>
		<td><input type="text" name="fname" size="20" placeholder="Enter your Name" required></td>
	</tr>
	<tr>
		<td align="left">Middle Name:</td>
		<td><input type="text" name="mname" size="20" placeholder="Enter your Middle Name" required></td>
	</tr>
	<tr>
		<td align="left">Last Name: </td>
		<td><input type="text" name="lname" size="20" placeholder="Enter your Surname" required></td>
	</tr>
	<tr>
		<td align="left">Age: </td>
		<td><input type="text" name="age" id="age" size="20" placeholder="Enter your Age" onkeypress="return isNumberKey(event)" maxlength="3" onblur="validateAge()" required></td>
	</tr>
	<tr>
		<td align="left">Gender: </td>
		<td><input type="radio" name="gender" value="male" required>Male
			<input type="radio" name="gender" value="female" required>Female<br><br></td>
	</tr>
	<tr>
		<td align="left">Address:</td>
		<td><input type="text" name="address" size="20" placeholder="Enter your Address" required></td>
	</tr>
	<tr>
		<td align="left">EMail:</td>
		<td><input type="email" name="email" size="20" placeholder="example@example.com"  onblur="validateEmail(this);"  required></td>
	</tr>
	<tr>
		<td align="left">Phone Number:</td>
		<td><input type="text" name="phoneno" size="20" placeholder="Enter your Phone No" onkeypress="return isNumberKey(event)" maxlength="10" required></td>
	</tr>
	<tr>
		<td align="left">Password:</td>
		<td><input type="password" name="password" size="20" placeholder="Enter password" required></td>
	</tr>
	<tr>
		<td align="left">Confirm Password:</td>
		<td><input type="password" name="password2" size="20" placeholder="Confirm Password" required></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Submit" style="width:100px;" id="submit" name="submit"></td>
	</tr>
</table>
</div>
<?php
require('connection.php');
if (isset($_POST['submit']))
{
	//session_start();
	$fname=addslashes($_POST['fname']); 
	$mname=addslashes($_POST['mname']); 
	$lname=addslashes($_POST['lname']);
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$phoneno=$_POST['phoneno'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	if($password == $password2)
	{
		$newpass=$password; 
		$sql=mysql_query( "INSERT INTO users(fname, mname, lname, age, gender, address, email, phoneno, password) VALUES ('$fname','$mname', '$lname', '$age', '$gender', '$address', '$email', '$phoneno', '$newpass')" ) or die( mysql_error() );
		die( "You have registered for an account.<br><br>Go to <a href=\"ulogin.php\">Login</a>" );
	}
	else
	{
		echo "Password does not match";
	}
}
?>
<p>Already a Member?<a href="ulogin.php">LOGIN</a><br>
<a href="h.html">HOME</a>
</p>
</div>
</form>
</body>
</html>