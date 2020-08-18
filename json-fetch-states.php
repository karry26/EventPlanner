<?php
		include_once("do-connect1.php");
     //   $function=$_GET["function"];
		$query="select distinct state from contributor ";

		$table=mysqli_query($dbRef,$query);
				
		//   0/1   possibility

		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
		echo json_encode($ary);
        
				
?>