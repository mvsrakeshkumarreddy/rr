<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin page') }}
        </h2>
    </x-slot>


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





});
</script>



</x-app-layout>
