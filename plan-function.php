<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>
     <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="js/angular.min.js"></script>
   
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script>
        $(document).ready(function() {
            /*$.("#btnSeach").click(function(){
                 
            
               // console.log("india");
              
				

					/*function notfine(response) {
						alert(JSON.stringify(response));
					}*/



   /*         //==-=-=-=-=-=-=-=-=-=
         $("#btnSearch").click(function() {
                   alert(1);
                   var functions = $("#functions").val();
                   var service = $("#services").val();
                   var city = $("#city").val();
                   var state = $("#state").val();
                   alert(state);
                   //var pwd=$("#txtPwd").val();
                   //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;

                   $.getJSON("search-contributor.php?function=" + functions + "&services=" + service + "&city=" + city + "&state=" + state, function(jsonAry) {
                       alert(JSON.stringify(jsonAry));

                       //	$scope.oneRecord=response.data;
                       //alert($scope.oneRecord[0].uid);
                       $("#modal-details").modal("show");

                   });
               });
           //  alert(1);*/
             loadFunctions();
//alert(1);
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
            loadstates();

            function loadstates() {
                //  alert(1);
                $.getJSON("json-fetch-states.php", function(jsonAry) {
                    //  alert(2);
                    alert(JSON.stringify(jsonAry));

                    var i;
                    for (i = 0; i < jsonAry.length; i++) {

                        var item = document.createElement("option");
                        item.text = jsonAry[i].state;
                        item.value = jsonAry[i].state;
                        document.getElementById("state").append(item);
                    }
                });
            }
            $("#state").change(function() {
                //$("#sservices").val("");
                var sstate = $("#state").val();

                $.getJSON("json-fetch-city.php?state=" + sstate, function(jsonAry) {
                    /* alert(JSON.stringify(jsonAry));*/
                    //alert(jsonAry[0]);
                    // var ary = jsonAry[0].services.split(";");
                    //alert(ary.length);
                    var i;
                    document.getElementById("city").length = 1;
                    for (i = 0; i < jsonAry.length; i++) {

                        var item = document.createElement("option");
                        //alert(ary[i]);
                        item.text = jsonAry[i].city;
                        item.value = jsonAry[i].city;
                        document.getElementById("city").append(item);
                    }


                });


            });



        });
    </script>
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
           // console.log(1);
           // console.log(1);
            $scope.pp = function()


            {
                //console.log(2);
                var functions = $("#functions").val();
                var services = $("#services").val();
                var city = $("#city").val();
                var state = $("#state").val();


                $scope.jsonAry;
                $http.get("search-contributor.php?function=" + functions + "&services=" + services + "&city=" + city + "&state=" + state).then(fine, notfine);


                function fine(response) {
                    
                    $scope.jsonAry = response.data;
                    //console.log( $scope.jsonAry[0].name);
                }

                function notfine(response) {
                    alert(JSON.stringify(response));
                }
            }
            $scope.doShowOne=function(uid)
			{   //console.log(2);
				$http.get("admin-fetch-contributor-uid.php?uid=" + uid).then(fine, notfine);

					function fine(response) {
						//alert(JSON.stringify(response.data));
						$scope.oneRecord=response.data;
						//alert($scope.oneRecord[0].uid);
						$("#modal-details").modal("show");
						
					}

					function notfine(response) {
						alert(JSON.stringify(response));
					}
			}


        });

    </script>


</head>
<!--//-->

<body ng-app="mymodule" ng-controller="mycontroller">
    <div>
        <div class=" text-center  bg-dark text-light " style="height=100px">
            <h2>PLAN A FUNCTION </h2>
        </div>


        <div class="form-row">
            <div class="col-md-3 border-right border-dark">
                <br>
                <br>
                <div>
                    <label for="functions">
                        FUNCTIONS

                    </label>
                    <select name="functons" id="functions" class="form-control">
                        <option value="none">
                            select
                        </option>
                    </select>
                </div>
                <br>
                <br>


                <div>
                    <label for="services">
                        SERVICES

                    </label>
                    <select name="services" id="services" class="form-control">
                        <option value="none">
                            select
                        </option>
                    </select>
                </div>
                <br>
                <br>

                <div>
                    <label for="state">
                        STATE

                    </label>
                    <select name="state" id="state" class="form-control">
                        <option value="none">
                            select
                        </option>
                    </select>
                </div>
                <br>
                <br>

                <div>
                    <label for="city">
                        CITY

                    </label>
                    <select name="city" id="city" class="form-control">
                        <option value="none">
                            select
                        </option>
                    </select>
                </div>
                <br>
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <div value="Search" name="btn" class="btn btn-primary" id="btnSearch" ng-click=pp();>Search
                        </div>
                        <!-- -->

                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>
            <div class="col-md-9 off" >

                <center> Serch:<input type="text" ng-model="google"></center>
                <div class="row mt-3">
                    <div class="col-md-3 " ng-repeat="oneObj in jsonAry | filter:google">
                        <div class="card border border-primary">
                            <img src="uploads/{{oneObj.pic1}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{oneObj.uid}}</h5>
                                <p class="card-text"><span class="text-danger"> Name:</span>{{oneObj.name}}</p>
                                <div class="btn btn-primary" style="" ng-click="doShowOne(oneObj.uid);">Details</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
</body>
<!--ghfhggggggggggggggggggggggggggggggggggggg-->
<div class="modal" id="modal-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="uploads/{{oneRecord[0] .pic1}}"   alt="..." width="250" height="250" ><br>
                <b>UID:</b>{{oneRecord[0].uid}} 
                <br>
                    <b>NAME:</b>{{oneRecord[0].name}}
                <br>
                    <b>MOBILE:</b>{{oneRecord[0].mobile}}<br>
                
                    <b>BUSSINESS NAME</b>:{{oneRecord[0].busname}}<br>
                    <b>YEAR</b>:{{oneRecord[0].year}}<br>
                    <b>ADDRESS</b>:{{oneRecord[0].address}}<br>
                    <b>OFFICE NO</b>:{{oneRecord[0].offno}}<br>
                    <b>CITY</b>:{{oneRecord[0].city}}<br>
                    <b>STATE</b>:{{oneRecord[0].state}}<br>
                    <input type="text" class="form-control" id="sms" placeholder="Type Message">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" >Send Message</button>
            </div>
        </div>
    </div>
</div>
<!--
SELECT * FROM `planner` where POSITION("Cattering" IN services)>0
-->
