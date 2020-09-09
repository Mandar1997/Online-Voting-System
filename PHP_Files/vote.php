<!DOCTYPE html>
<html>
<head>
<title>Voting Page</title>
<link rel="stylesheet" type="text/css" href="css/vote.css">
</head>
<body>
<div class="heading">
<h2>Let's Vote</h2>
</div>
<div class="container">
<?php
session_start();
$cid=$_SESSION['id'];
$con=mysqli_connect("localhost","root","","registration");
$result = mysqli_query($con,"SELECT vcount FROM users WHERE id =$cid ");
$row = mysqli_fetch_array($result);
echo $row['vcount'];
if($row['vcount']>0)
	{
		echo "<h1 align='center'> Your Vote Has been casted already!.</h1>";
		echo "<h1 align='center'><a href='h.html'>LOGOUT</a></h1>";
	}
else
{
?>

<form action="vote.php" method="POST" align="center">
<img src="https://img.theweek.in/content/dam/week/news/india/images/2018/8/30/shiv-sena-logo-week.jpg" width="150" height="150"/>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="shivsena" id="ss" value="SHIVSENA"/><br><br>
<img src="https://www.logolynx.com/images/logolynx/5f/5f04d28587d594758c4c88cc513f8106.jpeg" width="150" height="150"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="mns" id="mns" value="MNS"/><br><br>
<img src="http://bichhu.com/wp-content/uploads/2018/05/BJP-Logo-BJP.jpg" width="150" height="150"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="bjp" id="bjp" value="BJP"/><br><br>
<img src="https://img.dainiksaveratimes.com/Uploads/img/2016/11/12/2812112016030459.png" width="150" height="150"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="congress" id="cong" value="CONGRESS"/><br><br>
<img src="https://cdn.dnaindia.com/sites/default/files/styles/full/public/2018/09/30/737639-aap-logo.jpg" width="150" height="150"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="aap" id="aap" value="AAP"/><br><br>
</form>
<?php 

}?>
<?php
$con=mysqli_connect("localhost","root","","registration");
if(isset($_POST['shivsena']))
{
	$vote_shivsena="update vote set shivsena=shivsena+1";
	$inc_shivsena="update users set vcount=1 where id=$cid";
	$run_shivsena=mysqli_query($con,$vote_shivsena);
	mysqli_query($con,$inc_shivsena);
	if($run_shivsena)
	{
		echo "<h1 align='center'> Your Vote Has Been Cast For SHIVSENA.</h1>";
		echo "<h1 align='center'><a href='h.html'>LOGOUT</a></h1>";
	}
}
if(isset($_POST['mns']))
{
	$vote_mns="update vote set mns=mns+1";
	$inc_mns="update users set vcount=2 where id=$cid";
	$run_mns=mysqli_query($con,$vote_mns);
	mysqli_query($con,$inc_mns);
	if($run_mns)
	{
		echo "<h1 align='center'> Your Vote Has Been Cast For MNS.</h1>";
		echo "<h1 align='center'><a href='h.html'>LOGOUT</a></h1>";
	}
}
if(isset($_POST['bjp']))
{
	$vote_bjp="update vote set bjp=bjp+1";
	$inc_bjp="update users set vcount=3 where id=$cid";
	$run_bjp=mysqli_query($con,$vote_bjp);
	mysqli_query($con,$inc_bjp);	
	if($run_bjp)
	{
		echo "<h1 align='center'> Your Vote Has Been Cast For BJP.</h1>";
		echo "<h1 align='center'><a href='h.html'>LOGOUT</a></h1>";
	}
}
if(isset($_POST['congress']))
{
	$vote_congress="update vote set congress=congress+1";
	$inc_congress="update users set vcount=4 where id=$cid";
	$run_congress=mysqli_query($con,$vote_congress);
	mysqli_query($con,$inc_congress);	
	if($run_congress)
	{
		echo "<h1 align='center'> Your Vote Has Been Cast For CONGRESS.</h1>";
		echo "<h1 align='center'><a href='h.html'>LOGOUT</a></h1>";
	}
}
if(isset($_POST['aap']))
{
	$vote_aap="update vote set aap=aap+1";
	$run_aap=mysqli_query($con,$vote_aap);
	if($run_aap)
	{
		echo "<h1 align='center'> Your Vote Has Been Cast For AAP.</h1>";
		echo "<h1 align='center'><a href='h.html'>LOGOUT</a></h1>";
	}
}
?>
</div>
</body>
</html>