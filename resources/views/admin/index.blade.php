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
</div>


 <div class="content">
          <div ng-repeat = "beddetails in students | filter:search ">
      <div class="card" ng-style="beddetails.bedstatus == 0 && {'background-color':'green'}  || beddetails.bedstatus == 1 && {'background-color':'red'}">
      <p style="font-size: 15px;font-weight: bold;color: white;">[[beddetails.crewid]] <span ng-show = "beddetails.bedstatus == 1">Time</span></p>

            <div class="icon">[[beddetails.bedno]]<i class="material-icons md-48">bedroom_child</i></div>
            
           
            <p class="title">[[beddetails.crewname]] <span ng-show = "beddetails.bedstatus == 1">/</span> [[beddetails.desig]]</p>
           
      </div>
          </div>
      </div>



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

 $scope.students = @json($beddetails);
 

});


</script>
</x-app-layout>
