<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <title>Document</title>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        function showpreview(file,ref) 
        {
            //alert(document.getElementById("ppic").files.length);
            //alert(document.getElementById("ppic").files[0].size);
            //alert($(file)[0].files[0].size);
            if($(file)[0].files[0].size>2097152)
                {
                   // alert("<=2 MB");
                    return;
                }
        if (file.files && file.files[0]) 
        {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(ref).prop('src', e.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }
 
    }
     
    </script>
    <script>
    $(document).ready(function(){
            dofetch();
              /*        {
        $(document).ajaxStart(function()
        {
            $("#loading").css("display","block");
        });
        $(document).ajaxStop(function()
        {
            $("#loading").css("display","none");
        });
         */
        //==-=-=-=-=-=-=-=-=-=
           /* $("#txtUid").blur(function(){
                var uid=$("#uid").val();
     
                //var pwd=$("#pwd").val();
                //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;
                 
                $.get("ajax-check-uid.php?uid="+uid,function(response){
                    $("#errUid").html(response);
                });
            });*/
        //==-=-=-=-=-=-=-=-=-=
            function dofetch()
        {
            var uid=$("#uid").val();
     
                //var pwd=$("#pwd").val();
                //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;
                 
                $.getJSON("json-fetch-client-profile.php?uid="+uid,function(aryJson)
                {
                    //alert(JSON.stringify(aryJson));
                    if(aryJson.length==0)
                        {
                            alert("no details found");
                            $("#btnUpdate").prop("disabled",true)
                            $("#btnSave").prop("disabled",false)
                            return;
                        }
                    $("#btnUpdate").prop("disabled",false)
                    $("#btnSave").prop("disabled",true)
                    
                    
                    $("#mobile").val(aryJson[0].mobile);
                    $("#name").val(aryJson[0].name);
                    $("#city").val(aryJson[0].city);
                    $("#email").val(aryJson[0].email);
                  //  $("#dob").val(aryJson[0].dob);
                    $("#address").val(aryJson[0].address);
                    $occ=(aryJson[0].occupation);
                    if($occ=="Job")
                        {
                            $("#job").prop("checked","true");
                        }
                    else{
                            $("#bussiness").prop("checked","true");
                        }
                     
                    //====================
                 
                //-=--=-=-=====
            var pic=aryJson[0].pic; 
            $("#ppic").prop("src","uploads/"+pic);       
            $("#hdn").val(pic);     
            $("#dob").val(dob);     
                });
            
        }
        
        
        
        
          
        //=-=-===-===-=-=
      /*  $("#btnSave").click(function(){
            var res=confirm("R U Sure....");
            if(res==true)
                document.frm.submit();
        });*/
         
    });
     
    </script>
    <!--<style>
    #loading
        {
            position: absolute;
            width: 80px;height: 80px;
            background-image: url(pics/loading1.gif);
            left: 45%;top: 20%; z-index: 10;
            padding: 10px;
            border: 1px black solid;
            display: none;
        }
    </style>-->
</head>
 
<body>
<!--<div id="loading"></div>-->
 
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center  bg-primary">
                <h2>Client Profile </h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-10 offset-md-1 border">
                <form action="client-profile-process.php"
                method="post" name="frm" enctype="multipart/form-data">
                 
                <input type="hidden" name="hdn" id="hdn">
                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="uid">UID</label>
                                <input type="text"  required class="form-control" id="uid" name="uid" readonly placeholder="Enter User Id" value="<?php echo $_SESSION["uid"]?>">
                                <small id="errUid" class="form-text text-primary">error</small>
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"  class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name" >
                                <small id="errPwd" class="form-text text-muted">*</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="text"  class="form-control" name="mobile" id="mobile" aria-describedby="emailHelp" placeholder="Enter mobile" >
                               
                            </div>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"  class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter mail" >
                             
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <select name="occupation" id="occupation" class="form-control">
                                <option value="bussiness">Bussiness</option>
                                <option value="job">Job</option>
                              
                            </select>
                             
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                               <label for="dob">Date of Birth</label>
                                <input  type="date"  class="form-control" name="dob" id="dob" aria-describedby="emailHelp" placeholder="d.o.b." >
                               
                           </div>
                            
                        </div>
                    </div>
 
                    
                     <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text"  class="form-control" name="address" id="address"  placeholder="Enter Address">
                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text"  class="form-control" name="city" id="city"  placeholder="Enter City" >
                              
                            </div>
                        </div>
                    </div>
 
                
                       
                    <div class="form-row">
                        <div class="col-md-4 offset-md-4 form-group text-center">
                            Profile Pic: <br>
                            <img src="pics/userinfo.png" class="mt-1 mb-1" width="100" height="100" alt="" id="ppic">
                            <input type="file" accept="image/*" multiple name="pic" id="pic" onchange="showpreview(this,ppic);">
 
                        </div>
                    </div>
 
                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            <input type="submit" value="Save" name="btn" class="btn btn-primary" id="btnSave">
                            <input type="submit" value="Update"  name="btn"
                            id="btnUpdate" class="btn btn-primary">
                           
                        </div>
                    </div>
                </form>
 
            </div>
        </div>
    </div>
 
 
 
</body>
 
</html>