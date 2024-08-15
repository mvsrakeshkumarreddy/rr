<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin page') }}
        </h2>
    </x-slot>

   <div class="content">
    @foreach($beddetails as $beddetails)
    @php
    if($beddetails['bedstatus'] == 0)
    {
        $colorr = "green";
    }
    elseif ($beddetails['bedstatus'] == 1) 
    {
        $colorr = "red";
    }
    elseif ($beddetails['bedstatus'] == 2) 
    {
        $colorr = "#FFD133";
    }
    @endphp
      <div class="card" style="background-color: {{$colorr}}">
            <div class="icon">{{$beddetails->bedno}}<i class="material-icons md-48">bedroom_child</i></div>
            <p class="title">{{$beddetails->bedno}}</p>
            <p class="text">{{$beddetails->bedstatus}}</p>
         
      </div>
    @endforeach
   </div>



</div> 
</x-app-layout>
