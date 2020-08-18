<?php
session_start();
if(!isset($_SESSION["uid"]))
{
header("location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div class="container">
       <div class="col-md-12 "> 
          <h1>
              Welcome: <?php echo $_SESSION["uid"]?>
          </h1>
           
       </div>
        <div class=" text-center  bg-dark text-light " style="height=100px">
            <h2>Admin Dashboard  </h2>
            <div class="float-md-right"><a href="project-logout.php"
                       > <input type="button" class="btn btn-outline-success my-2 my-sm-0 nav-tabs nav-justified  " value="Logout"></a></div>
        </div>
        <div class="mt-5 form-row">


            <div class="col-md-3">
                <div class="card  ext-white bg-dark mb-3 " style="width: 18rem;">
                    <img class=" card-img-top" src="pics/images.png" alt="Card image cap">
                    <div class="card-body ">
                        <center>

                            <a href="admin-fetch-contributor.php"> <input type="button" class="btn btn-outline-success my-2 my-sm-0 nav-tabs nav-justified  " value="Contributor "></a>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-md-3 offset-md-1">
                <div class="card  ext-white bg-dark mb-3 " style="width: 18rem;">
                    <img class=" card-img-top" src="pics/images.png" alt="Card image cap">
                    <div class="card-body ">
                        <center>


                            <a href="admin-fetch-client.php"> <input type="button" class="btn btn-outline-success my-2 my-sm-0 nav-tabs nav-justified  " value="Client"></a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-3 offset-md-1">
                <div class="card  ext-white bg-dark mb-3 " style="width: 18rem;">
                    <img class=" card-img-top" src="pics/images.png" alt="Card image cap">
                    <div class="card-body ">
                        <center>


                            <a href="admin-fetch-authentication.php"> <input type="button" class="btn btn-outline-success my-2 my-sm-0 nav-tabs nav-justified  " value="Authentication"></a>
                        </center>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

</body>

</html>
