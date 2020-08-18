<?php
		include_once("do-connect1.php");
		
		$query="select * from client";

		$table=mysqli_query($dbRef,$query);
				
		

		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
		echo json_encode($ary);	
				
			
			?> 