<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/angular.min.js"></script>
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">

	<script>
		var module = angular.module("mymodule", []);
		module.controller("mycontroller", function($scope, $http) {
//console.log(2);
			$scope.doFetchAll = function() {
               // console.log(2);
				$scope.jsonAry;
				$http.get("admin-fetch-client-process.php").then(fine, notfine);

				function fine(response) {
					//alert(JSON.stringify(response));
					//alert(JSON.stringify(response.data)); //== jsonAry
					$scope.jsonAry = response.data;
					//console.log(JSON.stringify(response)); 

				}

				function notfine(response) {
					alert(JSON.stringify(response));
				}
			}
			//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			/*$scope.doDelete = function(uid) {
				if (confirm("R u Sure?") == true) {
					$http.get("angular-delete-process.php?uid=" + uid).then(fine, notfine);

					function fine(response) {
						alert(JSON.stringify(response.data));
						$scope.doFetchAll();
					}

					function notfine(response) {
						alert(JSON.stringify(response));
					}
				}
			}*/
			//=-=-=-=-=-=-=-=-=-===-=0=0=-=-=-=0==0==0
			//$scope.oneRecord;
			$scope.doShowOne=function(uid)
			{console.log(2);
				$http.get("admin-fetch-client-uid.php?uid=" + uid).then(fine, notfine);

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

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="doFetchAll();">
	<!--<center>
		<div class="btn btn-primary" ng-click="doFetchAll();">Fetch All</div>
	</center>-->
	<hr>


	<div class="container">
	<center>
    <div class=" text-center  bg-dark text-light " style="height=100px">
            <h2> CLIENT FETCH </h2>
        </div>
	   
	</center>
		<details>
			<summary>See in Grid</summary>
			<table class="table table-striped">
				<tr>
					<th>UID</th>
					<th>NAME</th>
					<th>CITY</th>
					<th>ADDRESS</th>
					<th>EMAIL</th>
					<th>MOBILE</th>
					<th>OCCUPATION</th>
					
					<th>DOB</th>
					
					<th>PIC</th>
					
				
				</tr>
				<tr ng-repeat="oneObj in jsonAry">
					<td>{{oneObj.uid}}</td>
					<td>{{oneObj.name}}</td>
					<td>{{oneObj.city}}</td>
					<td>{{oneObj.address}}</td>
					<td>{{oneObj.email}}</td>
					<td>{{oneObj.mobile}}</td>
					<td>{{oneObj.occupation}}</td>
					<td>{{oneObj.dob}}</td>
					
					<td>
						<a href="uploads/{{oneObj.pic}}" target="_blank">
							<img src="uploads/{{oneObj.pic}}" width="50" height="50" alt="">
						</a>
					</td>
				<!--	<td>
						<div class="btn btn-danger" ng-click="doDelete(oneObj.uid);">Delete</div>
					</td>-->
				</tr>



			</table>
		</details>
	<hr>
	<hr>
		<!-- ********************************************************** -->
		<details>
			<summary>See in Grid</summary>
			<center> Serch:<input type="text" ng-model="google"></center>
			<div class="row mt-3">
				<div class="col-md-3 " ng-repeat="oneObj in jsonAry | filter:google">
					<div class="card border border-primary" >
					<img src="uploads/{{oneObj.pic}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">{{oneObj.uid}}</h5>
						<p class="card-text"><span class="text-danger"> Name:</span>{{oneObj.name}}</p>
						<div 
						 ng-click="doShowOne(oneObj.uid);" class="btn btn-primary" style="">Details</div>
					</div>
				</div>
				</div>
			</div>
		</details>

	</div>
 <!--==-=-=-=-=-=-=-=-=-=-=-=-=MODAL DETAILS -==-=-=-=-=-=--->
<!-- Modal -->
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
       <img src="uploads/{{oneRecord[0] .pic}}" width="200" height="200" class="card-img-top" alt="...">
        UID:{{oneRecord[0].uid}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>

</html>
