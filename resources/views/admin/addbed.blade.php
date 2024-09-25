<x-app-layout>
    <x-slot name="header" >
        <h2  class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bed Addition Page')}}
        </h2>
    </x-slot>
        @if ($message = \Session::get('success'))

        <div class="flex items-center justify-center mt-4">
                <x-jet-button class="block ml-4"  id="hidesuccess" style="background-color: green;text-align: center;">
                    {{ $message }}
                </x-jet-button>
            </div>
@endif









<form method="post" enctype="multipart/form-data" action="{{ url('addbeds') }}">
            @csrf

            <div>
                <x-jet-label for="division" value="{{ __('Division') }}" />
                <x-jet-input style="text-transform: uppercase;" id="division" class="block mt-1 w-full" type="text" name="division" :value="old('division')" required autofocus autocomplete="division" />
            </div>

             <div>
                <x-jet-label for="station" value="{{ __('Station') }}" />
                <x-jet-input style="text-transform: uppercase;" id="station" class="block mt-1 w-full" type="text" name="station" :value="old('station')" required autofocus autocomplete="station" />
            </div>

     		<div>
     			<x-jet-label for="building" value="{{ __('Building No') }}" />
					<select class="form-select" id="building" name="building">
					  <option value="1">1</option>
					  <option value="2">2</option>
					</select>
     		</div>

            <div>
            <br>
                <input type="radio" id="floor" name="floor" value="0">
  				<label for="floor">Ground Floor</label>
 				<input type="radio" id="floor" name="floor" value="1">
  				<label for="floor">First Floor</label>
 				<input type="radio" id="floor" name="floor" value="2">
  				<label for="floor">Second Floor</label>
                
            </div>
<br>

			<div>
                <x-jet-label for="roomno" value="{{ __('Room No') }}" />
                <x-jet-input id="roomno" class="block mt-1 w-full" type="text" name="roomno" :value="old('roomno')" required autofocus autocomplete="roomno" />
            </div>
            <div>
                <x-jet-label for="bedno" value="{{ __('Bedno') }}" />
                <x-jet-input id="bedno" class="block mt-1 w-full" type="text" name="bedno" :value="old('bedno')" required autofocus autocomplete="bedno" />
            </div>

            <div>
                <x-jet-label for="addedby" value="{{ __('User') }}" />
                <x-jet-input style="text-transform: uppercase;" id="addedby" readonly class="block mt-1 w-full" type="text" name="addedby" :value="old('addedby', auth()->user()->name)" required autofocus autocomplete="addedby" />
            </div>

          

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Add') }}
                </x-jet-button>
            </div>
        </form>
       

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

<script>
           setTimeout(function() {
    $('#hidesuccess').fadeOut('fast');
}, 2000); // <-- time in milliseconds
            
       
    </script>



</x-app-layout>
