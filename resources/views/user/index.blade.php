<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User page') }}
        </h2>
    </x-slot>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="details"></span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="{{ url('checkins') }}">
        @csrf
          <div class="mb-3">
            <input type="hidden" class="form-control" id="bedid" name="bedid" :value="old('bedid')">
            <input type="hidden" class="form-control" id="bedno" name="bedno" :value="old('bedno')">
            <input type="hidden" class="form-control" id="station" name="station" :value="old('station')">
            <input type="hidden" class="form-control" id="division" name="division" :value="old('division')">
          </div>
          <div class="mb-3">
            <label for="crewid" class="col-form-label">Crew ID</label>
            <input type="text" class="form-control" id="crewid" required="required" name="crewid" :value="old('crewid')">
          </div>
          <div class="mb-3">
            <label for="crewname" class="col-form-label">Crew Name</label>
            <input type="text" class="form-control" id="crewname" required="required" name="crewname" :value="old('crewname')">
          </div>
          <div class="mb-3">
            <label for="tokenno" class="col-form-label">Token</label>
            <input type="text" class="form-control" id="tokenno" required="required" name="tokenno" :value="old('tokenno')">
          </div>
          <div class="mb-3">
            <label for="checkintime" class="col-form-label">Check-in Time</label>
            <input type="datetime-local" class="form-control" id="checkintime" name="checkintime" :value="old('checkintime')" required="required">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Check-in</button>
      </div>
        </form>






      </div>
      
    </div>
  </div>
</div>


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
            @if($beddetails->bedstatus == 0)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text showdetails" data-details="Check-in" data-bedno="{{$beddetails->bedno}}" data-bedid="{{$beddetails->id}}" data-station="{{$beddetails->station}}" data-division="{{$beddetails->division}}">Check-in</a>
            @endif
            @if($beddetails->bedstatus == 1)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text showdetails" data-details="Check-out" data-bedno="{{$beddetails->bedno}}" data-bedid="{{$beddetails->id}}" data-station="{{$beddetails->station}}" data-division="{{$beddetails->division}}">Check-out</a>
            @endif
      </div>
    @endforeach
   </div>
    <script type="text/javascript">
        $(document).on('click', '.showdetails', function(e){
            let bedno = $(this).data('bedno');
            let bedid = $(this).data('bedid');
            let details = $(this).data('details');
            let station = $(this).data('station');
            let division = $(this).data('division');
            $('.details').text(details);
            $('.bedid').text(bedid);
            $('.bedno').text(bedno);
            $('.station').text(station);
            $('.division').text(division);

            $('#bedid').val(bedid);
            $('#bedno').val(bedno);
            $('#station').val(station);
            $('#division').val(division);
        })


    </script>

</x-app-layout>
