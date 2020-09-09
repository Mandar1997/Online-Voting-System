<!DOCTYPE html>
<html>
<head>
<title>Results page</title>
<head>
<body>
<?php
$con=mysqli_connect("localhost","root","","registration");
if(isset($_GET['results']))
{
	$get_votes="select * from vote";
	$run_votes=mysqli_query($con, $get_votes);
	$row_votes=mysqli_fetch_array($run_votes);
	$shivsena=$row_votes['shivsena'];
	$mns=$row_votes['mns'];
	$bjp=$row_votes['bjp'];
	$congress=$row_votes['congress'];
	$aap=$row_votes['aap'];
	$count=$shivsena+$mns+$bjp+$congress+$aap;
	$per_shivsena=round($shivsena*100/$count) . "%";
	$per_mns=round($mns*100/$count) . "%";
	$per_bjp=round($bjp*100/$count) . "%";
	$per_congress=round($congress*100/$count) . "%";
	$per_aap=round($aap*100/$count) . "%";
	echo"
	<div style='background: lime' pagging: 10px; text-align: center;>
	<center>
	<h2>Updated Results:</h2>
	<p style='background: black; color: white; padding: 10px; width: 500px;'>
	<b>SHIVSENA:</b> $shivsena ($per_shivsena)
	</p>
	<p style='background: black; color: white; padding: 10px; width: 500px;'>
	<b>MNS:</b> $mns ($per_mns)
	</p>
	<p style='background: black; color: white; padding: 10px; width: 500px;'>
	<b>BJP:</b> $bjp ($per_bjp)
	</p>
	<p style='background: black; color: white; padding: 10px; width: 500px;'>
	<b>CONGRESS:</b> $congress ($per_congress)
	</p>
	<p style='background: black; color: white; padding: 10px; width: 500px;'>
	<b>AAP:</b> $aap ($per_aap)
	</p>
	</center>
	</div>
	";
}
?>

</body>
</html>