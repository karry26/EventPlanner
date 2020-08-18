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
        function showpreview(file, ref) {
            //alert(document.getElementById("ppic").files.length);
            //alert(document.getElementById("ppic").files[0].size);
            //alert($(file)[0].files[0].size);
            if ($(file)[0].files[0].size > 2097152) {
                // alert("<=2 MB");
                return;
            }
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(ref).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>
    <script>
        $(document).ready(function() {
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
            function dofetch() {
                var uid = $("#uid").val();

                //var pwd=$("#pwd").val();
                //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;

                $.getJSON("json-fetch-contributor-profile.php?uid=" + uid, function(aryJson) {
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
                   // $("#event").val(aryJson[0].event);
                    //  $("#dob").val(aryJson[0].dob);
                    $("#address").val(aryJson[0].address);
                    $("#busname").val(aryJson[0].busname);
                    $("#year").val(aryJson[0].year);
                    $("#offno").val(aryJson[0].offno);
                    $("#state").val(aryJson[0].state);
                  //  $("#function").val(aryJson[0].function);
                    
                   
                    //====================

                    //-=--=-=-=====
                    var pic1 = aryJson[0].pic1;
                    var pic2 = aryJson[0].pic2;
                    var pic3 = aryJson[0].pic3;
                    $("#ppic1").prop("src", "uploads/" + pic1);
                    $("#ppic2").prop("src", "uploads/" + pic2);
                    $("#ppic3").prop("src", "uploads/" + pic3);
                    $("#hdn1").val(pic1);
                    $("#hdn2").val(pic2);
                    $("#hdn3").val(pic3);
                    
                });
            };
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
                <h2>Contributor Profile </h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-10 offset-md-1 border">
                <form action="contributor-profile-process.php" method="post" name="frm" enctype="multipart/form-data">

                    <input type="hidden" name="hdn1" id="hdn1">
                    <input type="hidden" name="hdn2" id="hdn2">
                    <input type="hidden" name="hdn3" id="hdn3">
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
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
                                <small id="errPwd" class="form-text text-muted">*</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" aria-describedby="emailHelp" placeholder="Enter mobile">

                            </div>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="busname">Bussiness/Firm Name</label>
                                <input type="text" class="form-control" name="busname" id="busname" aria-describedby="emailHelp" placeholder="Enter name">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Est. Year</label>
                                <input type="text" class="form-control" name="year" id="year" aria-describedby="emailHelp" placeholder="Enter year (yyyy)">

                            </div>
                        </div>



                    </div>



                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address"> Office Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">

                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="offno"> Office Number</label>
                                <input type="text" class="form-control" name="offno" id="offno" placeholder="Enter number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="city"> City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="state"> State</label>
                                <input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
                            </div>
                        </div>
                    </div>
                 <!--   <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="function"> Function</label>
                                <input type="text" class="form-control" name="function" id="function" placeholder="Enter function">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="event"> Event</label>
                                <input type="text" class="form-control" name="event" id="event" placeholder="Enter Event">
                            </div>
                        </div>


                    </div>-->

                    <div class="form-row">
                        <div class="col-md-4 form-group text-center">
                            Display Pic: <br>
                            <img src="pics/userinfo.png" class="mt-1 mb-1" width="100" height="100" alt="" id="ppic1">
                            <input type="file" accept="image/*" multiple name="pic1" id="pic1" onchange="showpreview(this,ppic1);">

                        </div>
                        <div class="col-md-4 form-group text-center">
                            Display Pic: <br>
                            <img src="pics/userinfo.png" class="mt-1 mb-1" width="100" height="100" alt="" id="ppic2">
                            <input type="file" accept="image/*" multiple name="pic2" id="pic2" onchange="showpreview(this,ppic2);">

                        </div>
                        <div class="col-md-4 form-group text-center">
                            Display Pic: <br>
                            <img src="pics/userinfo.png" class="mt-1 mb-1" width="100" height="100" alt="" id="ppic3">
                            <input type="file" accept="image/*" multiple name="pic3" id="pic3" onchange="showpreview(this,ppic3);">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            <input type="submit" value="Save" name="btn" class="btn btn-primary" id="btnSave">
                            <input type="submit" value="Update" name="btn" class="btn btn-primary" id="btnUpdate">

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>



</body>

</html>
