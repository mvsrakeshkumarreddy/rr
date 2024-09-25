<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




<div class="content">
	
<div class="card text-bg-secondary mb-3" style="max-width: 18rem;height: 350px;" ng-repeat = "beddetailsummary in beddetailsummary" >
  <div class="card-header" style="background-color: blue;">RR - [[beddetailsummary.rr]]</div>
  <div class="card-body">
    <h5 class="card-title">SUMMARY</h5>
  <table class="table">

  <tbody>
    <tr class="table-info">
      <th scope="row">Total Buildings : </th>
      <td>[[beddetailsummary.totalbuildings]]</td>
    </tr>
    <tr class="table-info">
      <th scope="row">Total Rooms : </th>
      <td>[[beddetailsummary.totalrooms]]</td>
    </tr>
    <tr class="table-info">
      <th scope="row">Total Beds : </th>
      <td>[[beddetailsummary.totalbeds]]</td>
    </tr>
    <tr class="table-warning">
      <th scope="row">Beds under Maintenance : </th>
      <td>[[beddetailsummary.maintenancebeds]]</td>
    </tr>
    <tr class="table-danger">
      <th scope="row">Beds Occupied : </th>
      <td>[[beddetailsummary.occupiedbeds]]</td>
    </tr>
    <tr class="table-success">
      <th scope="row">Beds Vacant : </th>
      <td>[[beddetailsummary.vacantbeds]]</td>
    </tr>
  </tbody>
  </table>
 </div>
</div>
</div>

First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: [[ firstName ]]

<div>
	[[id]]
</div>

<script>
var rakeshApp = angular.module('rakeshApp', []);
rakeshApp.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

});
rakeshApp.controller('rakeshCtrl', function($scope, $http) {

 $scope.bedsummary = @json($beddetails);

$scope.distinctrr = [];
$scope.totalbuildings = [];
$scope.totalbeds = [];
$scope.totalrooms = [];
$scope.maintenancebeds = [];
$scope.occupiedbeds = [];
$scope.vacantbeds = [];
$scope.beddetailsummary = [];
for (var i = 0; i < $scope.bedsummary.length; i++)
{
   if(!($scope.distinctrr.includes($scope.bedsummary[i]["station"])))
   {
      $scope.distinctrr.push($scope.bedsummary[i]["station"]);
   }
}

//console.log($scope.distinctrr);
for (var i = 0; i < $scope.distinctrr.length; i++)
{
	$scope.bedcount = 0;
	$scope.building = 0;
	$scope.room = 0;
	$scope.maintenancecount = 0;
	$scope.occupiedcount = 0;
	$scope.vacantcount = 0;
   for (var j = 0; j < $scope.bedsummary.length; j++) 
   {
   		if($scope.bedsummary[j]["station"] == $scope.distinctrr[i])
   		{
   			$scope.bedcount=$scope.bedcount+1;
   			if($scope.bedsummary[j]["building"]>$scope.building)
   			{
   				$scope.building = $scope.bedsummary[j]["building"];
   			}
   			if($scope.bedsummary[j]["roomno"]>$scope.room)
   			{
   				$scope.room = $scope.bedsummary[j]["roomno"];
   			}
   			if($scope.bedsummary[j]["bedstatus"] == 2)
   			{
   				$scope.maintenancecount++;
   			}
   			if($scope.bedsummary[j]["bedstatus"] == 1)
   			{
   				$scope.occupiedcount++;
   			}
   			if($scope.bedsummary[j]["bedstatus"] == 0)
   			{
   				$scope.vacantcount++;
   			}

   			
   		}
   }
   			$scope.totalbeds.push($scope.bedcount);
   			$scope.totalbuildings.push($scope.building);
   			$scope.totalrooms.push($scope.room);
   			$scope.maintenancebeds.push($scope.maintenancecount);
   			$scope.occupiedbeds.push($scope.occupiedcount);
   			$scope.vacantbeds.push($scope.vacantcount);

}

for (var i = 0; i < $scope.distinctrr.length; i++) 
{
	$scope.beddetailsummary.push({rr : $scope.distinctrr[i], totalbeds : $scope.totalbeds[i], totalbuildings : $scope.totalbuildings[i], totalrooms : $scope.totalrooms[i], maintenancebeds : $scope.maintenancebeds[i], occupiedbeds : $scope.occupiedbeds[i], vacantbeds : $scope.vacantbeds[i] });
}

console.log($scope.beddetailsummary);

});


</script>
</x-app-layout>
