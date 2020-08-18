<?php
		include_once("do-connect1.php");
		$uidd=$_GET["uid"];
		$query="delete  from user where uid='$uidd'";

		mysqli_query($dbRef,$query);
				
		if(mysqli_affected_rows($dbRef)==0)
			echo "Invalid id";
		else
			echo "Record Deleted";	
?>