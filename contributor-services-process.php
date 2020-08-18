<?php
include_once("do-connect1.php");
 
    $uid=$_GET["uid"];
    $sservices=$_GET["sservices"];
    $functions=$_GET["functions"];
    
    $btn=$_GET["btn"];
     
  
//=====================Upload  Image==========
 
     
 
 
if($btn=="Save")
{
    $query1="delete from services where uid='$uid' and function='$functions'";
    mysqli_query($dbRef,$query1);
   /* $count=mysqli_num_rows($table);*/
    
    
    
    $query="insert into services values('$uid','$functions','$sservices')";
    mysqli_query($dbRef,$query);
    
    $msg=mysqli_error($dbRef);
    if($msg=="")
            echo "Record Saved....,.,.,.,.,.";
    else
            echo $msg;
     
}
//else
//{
 /*  
    $query="update  client set name='$name',address='$address',email='$email',mobile='$mobile',occupation='$occupation' ,city='$city' ,  pic='$picname',dob='$dob' where uid='$uid'";
     
    mysqli_query($dbRef,$query);
    $msg=mysqli_error($dbRef);
    if($msg=="")
            echo "Record Updated....,.,.,.,.,.";
    else
            echo $msg;*/
//}
 
 
     
 
?>