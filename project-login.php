<?php
        session_start();
        include_once("do-connect1.php");
		$uid=$_GET["uid"];
		$pwd=$_GET["pwd"];
        $pwd=md5($pwd);
		$query="select * from user where uid= '$uid'  and pwd='$pwd'";
//echo $query;

		$table=mysqli_query($dbRef,$query);
				
		//   0/1   possibility
        
		$count=mysqli_num_rows($table);
             // $row=mysqli_fetch_array($table);
 
       // 
	if($count==1){
            //$cat=$row.cat;
            //
            
            $row=mysqli_fetch_array($table);
            $_SESSION["uid"]=$uid;
        //{
          // echo $count;
            echo  $row["cat"];
			//echo "LOG IN Successfully welcome" + $cat;
        }
		else
			echo "Create Account";
?>
