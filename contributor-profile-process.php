<?php
include_once("do-connect1.php");
 
    $uid=$_POST["uid"];
    
    $mobile=$_POST["mobile"];
    $btn=$_POST["btn"];
    $busname=$_POST["busname"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $offno=$_POST["offno"];
   // $function=$_POST["function"];
     
 
    $name= $_POST["name"];
    $address= $_POST["address"];
   // $dob= $_POST["dob"];
   // $event=$_POST["event"];
    $year=$_POST["year"];
  
     
  
//=====================Upload  Image==========
 
     
 
 
if($btn=="Save")
{
    $picname1=$_FILES["pic1"]["name"];
    //$size=$_FILES["ppic"]["size"];
    $temp_name1=$_FILES["pic1"]["tmp_name"];
     
    move_uploaded_file($temp_name1,"uploads/".$picname1);
    
    $picname2=$_FILES["pic2"]["name"];
    //$size=$_FILES["ppic"]["size"];
    $temp_name2=$_FILES["pic2"]["tmp_name"];
     
    move_uploaded_file($temp_name2,"uploads/".$picname2);
    
    $picname3=$_FILES["pic3"]["name"];
    //$size=$_FILES["ppic"]["size"];
    $temp_name3=$_FILES["pic3"]["tmp_name"];
     
    move_uploaded_file($temp_name3,"uploads/".$picname3);
    //echo "<h2>File Uploaded..</h2>";
   
    $query="insert into contributor values('$uid','$name','$mobile','$busname','$year','$address' ,'$offno' , '$city','$state', '$picname1','$picname2','$picname3')";
    mysqli_query($dbRef,$query);
    $msg=mysqli_error($dbRef);
    if($msg=="")
            echo "Record Saved....,.,.,.,.,.";
    else
            echo $msg;
     
}
else
{
    $picname1=$_FILES["pic1"]["name"];
    $hdn1=$_POST["hdn1"];
    
    $picname2=$_FILES["pic2"]["name"];
    $hdn2=$_POST["hdn2"];
    
    $picname3=$_FILES["pic3"]["name"];
    $hdn3=$_POST["hdn3"];
     
    //$size=$_FILES["ppic"]["size"];
    $temp_name1=$_FILES["pic1"]["tmp_name"];
     
    if($picname1=="")
        $picname1=$hdn1;
    else
        move_uploaded_file($temp_name1,"uploads/".$picname1);
    $temp_name2=$_FILES["pic2"]["tmp_name"];
    //echo "<h2>File Uploaded..</h2>";
      if($picname2=="")
        $picname2=$hdn2;
    else
        move_uploaded_file($temp_name2,"uploads/".$picname2);
    
    $temp_name3=$_FILES["pic3"]["tmp_name"];
     if($picname3=="")
        $picname3=$hdn3;
    else
        move_uploaded_file($temp_name3,"uploads/".$picname3);
   
    $query="update  contributor set name='$name',address='$address',mobile='$mobile',city='$city' ,  busname= '$busname',offno='$offno' ,pic1='$picname1',pic2='$picname2',pic3='$picname3',state='$state',year='$year' where uid='$uid'";
     
    mysqli_query($dbRef,$query);
    $msg=mysqli_error($dbRef);
    if($msg=="")
            echo "Record Updated....,.,.,.,.,.";
    else
            echo $msg;
}
 
 
     
 
?>