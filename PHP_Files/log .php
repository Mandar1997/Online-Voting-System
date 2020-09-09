<?php
$uname=$_POST['uname'];
$pass=$_POST['pass'];
Session_start();
$con=mysqli_connect('localhost','root','','registration') or die("Connection problem");
mysqli_select_db($con,"registration");
$res=mysqli_query($con,"SELECT * FROM registration1 WHERE txtunm='$uname' AND txtpwd='$pass'") or die("failed to query database");
$noRow=mysqli_num_rows($res);
	if($noRow==1)
	{
	 	$_Session['uname']=$uname;
echo"check";
		//echo"<script>location.href='intrest.html'</script>";
	}
	else
	{
		echo"<script>alert('Incorrect Username or password')</script>";
	}
mysqli_close($con);
?>