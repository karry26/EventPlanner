<?php
include_once("do-connect1.php");

	$uid=$_POST["uid"];
	$pwd=$_POST["pwd"];
	$cat=$_POST["cat"];
	$btn=$_POST["btn"];

	

	$pwd=md5($pwd);
	$query="insert into user values('$uid','$pwd','','$cat' )";
	mysqli_query($dbRef,$query);
	$msg=mysqli_error($dbRef);
	if($msg=="")
			echo "Record Saved";
	else
			echo $msg;
?> 