<?php
        include_once("do-connect1.php");
        $uidd=$_GET["uid"];
        $query="select * from client where uid='$uidd'";
 
        $table=mysqli_query($dbRef,$query);
                 
        //   0/1   possibility
 
        $ary=array();
        while($row=mysqli_fetch_array($table))
        {
            $ary[]=$row;
        }
        echo json_encode($ary); 
                 
             
            ?>