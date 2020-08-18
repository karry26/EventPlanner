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
   <!-- <script>
        alert('1');

    </script>-->
    <script>
        $(document).ready(function() {


            //==-=-=-=-=-=-=-=-=-=
            $("#sign").click(function(){
                var uid = $("#uidd").val();
                var pwd = $("#pwdd").val();
                
                //var pwd=$("#txtPwd").val();
                //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;

                $.get("project-login.php?uid="+uid+ "&pwd="+pwd, function(response){
                    // alert('2');
                    alert(response);
                    if(response=='Client')
                        {
                            location.href="client-dashboard.php";
                        }
                    else 
                        if(response=='Contributor')
                            {
                                location.href="contributor-dashboard.php";
                            }
                    else
                        if(response=='Admin')
                        {
                             location.href="admin-dashboard.php";
                            
                        }
                    else{
                        alert("invalid uid/password");
                    }
                    //$("#k").html(response);
                });
            });
            
        });

    </script>
</head>

<body>
    <div class=" container">
        <div class="col-md-12">
            <nav class="navbar navbar-dark bg-dark  navbar-expand-lg ">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <input type="button" class="btn btn-outline-success my-2 my-sm-0 nav-tabs nav-justified text-white" value="Sign Up" data-target="#exampleModalCenter" data-toggle="modal">
                        </li>

                        <li>
                            <input type="button" class="btn btn-outline-success my-2 my-sm-0 text-white" value="Sign In" data-target="#exampleModalCenter2" data-toggle="modal">

                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <!-- Modal -->
    <form action=project-signup.php method="post" enctype="multipart/form-data">
       
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">SIGN UP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="inputEmail4">Username</label>
                                <input type="text" class="form-control" id="uid" placeholder="Username" name="uid">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="inputEmail4">Password</label>
                                <input type="password" class="form-control " id="pwd" name="pwd" placeholder="Password" p>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="inputEmail4">Category</label>
                                <select name="cat" id="cat" class="form-control">
                                    <option value="Contributor">Contributor</option>
                                    <option value="Client">Client</option>
                                    <option value="Admin">Admin</option>

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name='btn' value="Save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



    </form>
    <form action="project-login.php" 
				method="get" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">SIGN IN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="uidd">Username</label>
                            <input type="text" class="form-control" id="uidd" placeholder="Username" name="uidd">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="inputEmail4">Password</label>
                            <input type="password" class="form-control " id="pwdd" placeholder="Password" name=pwdd>
                        </div>
                    </div>
                </div>
                <div class="modal-footer align-items-center">
                    <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button   type = "button" id="sign" class="btn btn-primary">Sign IN</button>
                </div>
            </div>
        </div>
    </div>
    </form>
