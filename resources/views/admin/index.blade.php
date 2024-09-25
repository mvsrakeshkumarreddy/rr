<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin page') }}
        </h2>
    </x-slot>

<div class="content">
    
                <input type="radio" id="floor" ng-model = "search.station" value="RU" ng-click = "search.building = '' ">
                <label for="floor">RU</label>&nbsp;
                <input type="radio" id="floor" ng-model = "search.station" value="NRE" ng-click = "search.building = '' ">
                <label for="floor">NRE</label>&nbsp;
                <input type="radio" id="floor" ng-model = "search.station" value="YA" ng-click = "search.building = '' ">
                <label for="floor">YA</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="TPTY" ng-click = "search.building = '' ">
                <label for="floor">TPTY</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="GTL" ng-click = "search.building = '' ">
                <label for="floor">GTL</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="DHNE" ng-click = "search.building = '' ">
                <label for="floor">DHNE</label>&nbsp;
<input type="radio" id="floor" ng-model = "search.station" value="GY" ng-click = "search.building = '' ">
                <label for="floor">GY</label>&nbsp;
<button ng-click = "search.station = '' "><span  ng-click = "search.building = '' ">(&#x2715;) </span></button>
<hr>
</div>
<div class="content" ng-show = "search.station == 'GTL'">
    
<input type="radio" id="building" ng-model = "search.building" value="1">
                <label for="building">Building - 1</label>&nbsp;
                <input type="radio" id="building" ng-model = "search.building" value="2">
                <label for="building">Building - 2</label>&nbsp;
</div>





<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Ground Floor
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
     
 <div class="content">
          <div ng-repeat = "beddetails in beddetails | filter:search " style="padding-right: 2px;">
     
          <div class="mixcard" ng-style="beddetails.bedstatus == 0 && {'background-color':'green'}  || beddetails.bedstatus == 1 && {'background-color':'red'}" ng-show = "beddetails.floor == 0">
              
          <div  ng-show = "beddetails.floor == 0" style="color: white;">[[beddetails.roomno]]<i class="material-icons md-48">home</i></div>

            <div ng-show = "beddetails.floor == 0" style="color: white;">[[beddetails.bedno]]<i class="material-icons md-48">bedroom_child</i></div>
          </div>



            
           
      </div>



      </div>
    </div>
    
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        1st Floor
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
       
<div class="content">
          <div ng-repeat = "beddetails in beddetails | filter:search " style="padding-right: 2px;">
<!--

      <div class="card" ng-style="beddetails.bedstatus == 0 && {'background-color':'green'}  || beddetails.bedstatus == 1 && {'background-color':'red'}" ng-show = "beddetails.floor == 1">
      <p style="font-size: 15px;font-weight: bold;color: white;">[[beddetails.crewid]] <span ng-show = "beddetails.bedstatus == 1"> - [[beddetails.checkintime]] Rest Hrs</span></p>

            <div class="icon">[[beddetails.bedno]]<i class="material-icons md-48">bedroom_child</i></div>
            
           
            <p class="title">[[beddetails.crewname]] <span ng-show = "beddetails.bedstatus == 1">/</span> [[beddetails.desig]]</p>
           
      </div>
-->

 <div class="mixcard" ng-style="beddetails.bedstatus == 0 && {'background-color':'green'}  || beddetails.bedstatus == 1 && {'background-color':'red'}" ng-show = "beddetails.floor == 1">
              
          <div  ng-show = "beddetails.floor == 1" style="color: white;">[[beddetails.roomno]]<i class="material-icons md-48">home</i></div>

            <div ng-show = "beddetails.floor == 1" style="color: white;">[[beddetails.bedno]]<i class="material-icons md-48">bedroom_child</i></div>
          </div>
          </div>
      </div>




      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        2nd Floor
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
    
<div class="content">
          <div ng-repeat = "beddetails in beddetails | filter:search " style="padding-right: 2px;">

<!--
      <div class="card" ng-style="beddetails.bedstatus == 0 && {'background-color':'green'}  || beddetails.bedstatus == 1 && {'background-color':'red'}" ng-show = "beddetails.floor == 2">
      <p style="font-size: 15px;font-weight: bold;color: white;">[[beddetails.crewid]] <span ng-show = "beddetails.bedstatus == 1"> - [[beddetails.checkintime]] Rest Hrs</span></p>

            <div class="icon">[[beddetails.bedno]]<i class="material-icons md-48">bedroom_child</i></div>
            
           
            <p class="title">[[beddetails.crewname]] <span ng-show = "beddetails.bedstatus == 1">/</span> [[beddetails.desig]]</p>
           
      </div>
-->
 <div class="mixcard" ng-style="beddetails.bedstatus == 0 && {'background-color':'green'}  || beddetails.bedstatus == 1 && {'background-color':'red'}" ng-show = "beddetails.floor == 2">
              
          <div  ng-show = "beddetails.floor == 2" style="color: white;">[[beddetails.roomno]]<i class="material-icons md-48">home</i></div>

            <div ng-show = "beddetails.floor == 2" style="color: white;">[[beddetails.bedno]]<i class="material-icons md-48">bedroom_child</i></div>
          </div>


          </div>
      </div>



      </div>
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

 $scope.beddetails = @json($beddetails);

 const currentdatetime = new Date();
 const currentdtstring = Date.parse(currentdatetime);
 $scope.currentdtstring = currentdtstring;

for (var i = 0; i < $scope.beddetails.length; i++) {
    if ($scope.beddetails[i]['bedstatus'] == 1) 
    {
        const difdtstring = Date.parse($scope.beddetails[i]['checkintime']);
        $scope.difdtstring = difdtstring;
        var h = ($scope.currentdtstring-$scope.difdtstring)/60/60/1000;
        $scope.beddetails[i]['checkintime'] = h.toFixed(2);
    }
}

});


</script>
</x-app-layout>
