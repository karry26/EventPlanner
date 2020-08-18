<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        // alert(1);
        $(document).ready(function() {
                    // alert(1);
                    loadFunctions();

                    function loadFunctions() {
                        // alert(1);
                        $.getJSON("json-fetch-functions.php", function(jsonAry) {
                            //  alert(2);
                            //    alert(JSON.stringify(jsonAry));

                            var i;
                            for (i = 0; i < jsonAry.length; i++) {

                                var item = document.createElement("option");
                                item.text = jsonAry[i].function;
                                item.value = jsonAry[i].function;
                                document.getElementById("functions").append(item);
                            }
                        });
                    }
                    $("#btn").click(function() {
                       // alert();
                        var uid = $("#uid").val();
                        var functions = $("#functions").val();
                        var sservices = $("#sservices").val();

                        //var pwd=$("#txtPwd").val();
                        //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;

                        $.get("contributor-services-process.php?uid=" + uid + "&functions=" + functions + "&sservices=" + sservices + "&btn=Save" , function(response) {
                            // alert('2');
                            alert(response);

                        });

                           });


                        $("#functions").change(function() {
                            $("#sservices").val("");
                            var selFunction = $("#functions").val();

                            $.getJSON("json-fetch-services.php?function=" + selFunction, function(jsonAry) {
                                //alert(JSON.stringify(jsonAry));
                                //alert(jsonAry[0].services);
                                var ary = jsonAry[0].services.split(";");
                                //alert(ary.length);
                                document.getElementById("services").length = 1;
                                for (i = 0; i < ary.length; i++) {

                                    var item = document.createElement("option");
                                    //alert(ary[i]);
                                    item.text = ary[i];
                                    item.value = ary[i];
                                    document.getElementById("services").append(item);
                                }


                            });

                        });

                        $("#services").change(function() {
                            // alert($("#sservices").value);
                            if ($("#sservices").val().includes($("#services").val()) == 0) {
                                $("#sservices").val($("#sservices").val() +
                                    $("#services").val() + ' ; ');

                            } else
                                alert("Already Added");
                        })


                    });

    </script>
</head>


<body>
    <!--<form action="contributor-services-process.php" method="post">-->
    <!--// <center>-->
    <div class=" container mt-3 border-right table-bordered border-dark">
        <center>
            <div>

                <h3 class="bg-dark text-white">
                    Add Services
                </h3>

            </div>
        </center>
        <div class="form-row mt-5">

            <div class="offset-md-4 col-md-4">
                <label for="uid"> Uid:
                </label>
                <center>
                    <input type="text" id="uid" class="form-control" placeholder="Enter uid" name="uid">

                </center>
            </div>

        </div>
        <div class="form-row mt-3">

            <div class="offset-md-1 col-md-4">


                <label for="functions"> Functions:
                </label>

                <select name="functions" id="functions" class="form-control">
                    <option value="select">select</option>
                </select>
            </div>
            <div class="col-md-4 offset-md-2">
                <label for="functions">
                    Services:
                </label>


                <select name="services" id="services" class="form-control">
                    <option value="select">select</option>
                </select>
            </div>

        </div>
        <div class="form-row mt-5">

            <div class="offset-md-4 col-md-4">
                <label for="sservices"> Selected Serices:
                </label>
                <center>
                    <input type="text" id="sservices" class="form-control" placeholder="Selected Services" name="sservices">

                </center>
            </div>

        </div>
        <div class="mt-5 mb-5">
            <center>
                <input type="button" id="btn" class="btn btn-outline-success my-2 my-sm-0 nav-tabs nav-justified bg-dark  " value="Save" name="btn">
            </center>
        </div>

    </div>
    <!--   </form>-->
</body>

<!-- </center>-->



</html>
