<?php
include_once("do-connect1.php");
 
    $uid=$_POST["uid"];
    
    $mobile=$_POST["mobile"];
    $btn=$_POST["btn"];
    $occupation=$_POST["occupation"];
    $city=$_POST["city"];
     
 
    $name= $_POST["name"];
    $address= $_POST["address"];
   // $dob= $_POST["dob"];
    $email=$_POST["email"];
    $dob=$_POST["dob"];
  
     
  
//=====================Upload  Image==========
 
     
 
 
if($btn=="Save")
{
    $picname=$_FILES["pic"]["name"];
    //$size=$_FILES["ppic"]["size"];
    $temp_name=$_FILES["pic"]["tmp_name"];
     
    move_uploaded_file($temp_name,"uploads/".$picname);
    //echo "<h2>File Uploaded..</h2>";
   
    $query="insert into client values('$uid','$name','$city','$address' ,'$email', '$mobile' , '$occupation' , '$picname','$dob')";
    mysqli_query($dbRef,$query);
    $msg=mysqli_error($dbRef);
    if($msg=="")
            echo "Record Saved....,.,.,.,.,.";
    else
            echo $msg;
     
}
else
{
    $picname=$_FILES["pic"]["name"];
    $hdn=$_POST["hdn"];
     
    //$size=$_FILES["ppic"]["size"];
    $temp_name=$_FILES["pic"]["tmp_name"];
     
    if($picname=="")
        $picname=$hdn;
    else
        move_uploaded_file($temp_name,"uploads/".$picname);
    //echo "<h2>File Uploaded..</h2>";
     
   
    $query="update  client set name='$name',address='$address',email='$email',mobile='$mobile',occupation='$occupation' ,city='$city' ,  pic='$picname',dob='$dob' where uid='$uid'";
     
    mysqli_query($dbRef,$query);
    $msg=mysqli_error($dbRef);
    if($msg=="")
            echo "Record Updated....,.,.,.,.,.";
    else
            echo $msg;
}
 
 
     
 
?>