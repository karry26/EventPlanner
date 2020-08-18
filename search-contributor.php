<?php
        include_once("do-connect1.php");
		$function=$_GET["function"];
		$service=$_GET["services"];
        $city=$_GET["city"];
        $state=$_GET["state"];
            
//echo $service;
        //$pwd=md5($pwd);
		/*$query="select uid from services where function= '$function'  and POSITION('$service' IN services)>0";*/
$query="select * from contributor where uid in ( select uid from services where function= '$function'  and POSITION('$service' IN services)>0 and city='$city' and state='$state')";

//echo $query;

		$table=mysqli_query($dbRef,$query);
				
		//   0/1   possibility
        
		//$count=mysqli_num_rows($table);
             // $row=mysqli_fetch_array($table);
 $ary=array();
//$ary2=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
/*echo
for($x = 0; $x < $count($ary); $x++) {
    echo $ary[$x];
    
    $query="select * from contributor where uid= '$ary[x]'  and state=Punjab";
    $table1=mysqli_query($dbRef,$query);
    $row1=mysqli_fetch_array($table)
  // $ary2[]=$row1;
}*/
/*$table2=mysqli_query($dbRef,$query2);
$ary2=array
    while($row2=mysqli_fetch_array($table2))
		{
			$ary2[]=$row2;
		}*/
    
		echo json_encode($ary);	
       // 
	//if($count==1){
            //$cat=$row.cat;
         /*   //
            $row=mysqli_fetch_array($table);
            //{
          // echo $count;
            echo  $row["cat"];*/
			//echo "LOG IN Successfully welcome" + $cat;
     //   }
		/*else
			echo "Create Account";*/
?>
