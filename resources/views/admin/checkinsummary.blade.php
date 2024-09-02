<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin page') }}
        </h2>
    </x-slot>

<div class="content">
    
                <input type="radio" id="floor" ng-model = "search.station" value="RU">
                <label for="floor">RU</label>&nbsp;
                <input type="radio" id="floor" ng-model = "search.station" value="NRE">
                <label for="floor">NRE</label>&nbsp;
                <input type="radio" id="floor" ng-model = "search.station" value="YA">
                <label for="floor">YA</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="TPTY">
                <label for="floor">TPTY</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="GTL">
                <label for="floor">GTL</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="DHNE">
                <label for="floor">DHNE</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="GY">
                <label for="floor">GY</label>&nbsp;
<button ng-click = "search.station = '' "> (&#x2715;)</button>
</div>

<div class="table-responsive">
  <table class="table">
     <caption>Check-in and Check-out summary</caption>
  <thead>
    <tr style="background-color: LightGray">
      <th scope="col">DIVISION</th>
      <th scope="col">STATION</th>
      <th scope="col">BUILDING</th>
      <th scope="col">BEDNO</th>
      <th scope="col">CREW-ID</th>
      <th scope="col">CREW NAME</th>
      <th scope="col">DESIG</th>
      <th scope="col">TOKEN NO</th>
      <th scope="col">CHECK-IN TIME</th>
      <th scope="col">CHECK-OUT TIME</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat = "checkindetails in checkindetails | filter:search"  ng-style="checkindetails.checkouttime == NULL && {'color':'red'}">
    <td>[[checkindetails.division]]</td>
    <td>[[checkindetails.station]]</td>
    <td>[[checkindetails.building]]</td>
    <td>[[checkindetails.bedno]]</td>
    <td>[[checkindetails.crewid]]</td>
    <td>[[checkindetails.crewname]]</td>
    <td>[[checkindetails.desig]]</td>
    <td>[[checkindetails.tokenno]]</td>
    <td>[[checkindetails.checkintime]]</td>
    <td>[[checkindetails.checkouttime]]</td>
    </tr>
  </tbody>
  </table>
</div>





First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: [[ firstName ]]



<script>
var rakeshApp = angular.module('rakeshApp', []);
rakeshApp.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

});
rakeshApp.controller('rakeshCtrl', function($scope) {

 $scope.checkindetails = @json($checkindetails);


});


</script>
</x-app-layout>
