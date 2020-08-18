<?php
include_once("do-connect1.php");
		$uidd=$_GET["uid"];
		$query="select * from client where uid='$uidd'";

		$table=mysqli_query($dbRef,$query);
				
		//   0/1   possibility
        
		$count=mysqli_num_rows($table);
		if($count==1)	
            $cat=$table.cat;
			echo "welcome" + $cat;
		else
			echo "not a logged in user";
?>