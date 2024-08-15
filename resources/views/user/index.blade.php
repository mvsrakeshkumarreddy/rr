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



<div class="modal fade" id="checkoutexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="details"></span> - <span class="crewid"></span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><span class="crewname"></span></p>
        <form method="post" enctype="multipart/form-data" action="{{ url('checkouts') }}">
        @csrf
          <div class="mb-3">
            <input type="hidden" class="form-control" id="cbedid" name="cbedid" :value="old('cbedid')">
            <input type="hidden" class="form-control" id="cbedno" name="cbedno" :value="old('cbedno')">
            <input type="hidden" class="form-control" id="ccrewname" name="ccrewname" :value="old('ccrewname')">
            <input type="hidden" class="form-control" id="ccheckintime" name="ccheckintime" :value="old('ccheckintime')">
            </div>
          
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Check-out</button>
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
      <p style="font-size: 15px;font-weight: bold;color: white;">{{$beddetails->crewid}}@if($beddetails->checkintime != null) -   {{date('H:i', mktime(0,(intval((strtotime(date('Y-m-d H:i:s'))-strtotime($beddetails->checkintime))/60)+330)))}} Rest Hrs @endif</p>

            <div class="icon">{{$beddetails->bedno}}<i class="material-icons md-48">bedroom_child</i></div>
            <p class="title">{{$beddetails->crewname}}</p>
            @if($beddetails->bedstatus == 0)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text showdetails" data-details="Check-in" data-bedno="{{$beddetails->bedno}}" data-bedid="{{$beddetails->id}}" data-station="{{$beddetails->station}}" data-division="{{$beddetails->division}}">Check-in</a>
            @endif
            @if($beddetails->bedstatus == 1)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#checkoutexampleModal" class="text showdetails" data-details="Check-out" data-cbedno="{{$beddetails->bedno}}" data-cbedid="{{$beddetails->id}}" data-ccrewid="{{$beddetails->crewid}}" data-ccrewname="{{$beddetails->crewname}}" data-ccheckintime="{{$beddetails->checkintime}}">Check-out</a>
            @endif
      </div>
    @endforeach
   </div>
    <script type="text/javascript">
        $(document).on('click', '.showdetails', function(e){
            let bedno = $(this).data('bedno');
            let cbedno = $(this).data('cbedno');
            let bedid = $(this).data('bedid');
            let cbedid = $(this).data('cbedid');
            let details = $(this).data('details');
            let station = $(this).data('station');
            let division = $(this).data('division');
            let ccrewid = $(this).data('ccrewid');
            let ccrewname = $(this).data('ccrewname');
            //let tokenno = $(this).data('tokenno');
            let ccheckintime = $(this).data('ccheckintime');
            $('.details').text(details);
            $('.bedid').text(bedid);
            $('.cbedid').text(cbedid);
            $('.bedno').text(bedno);
            $('.cbedno').text(cbedno);
            $('.station').text(station);
            $('.division').text(division);
            $('.ccrewid').text(ccrewid);
            $('.ccrewname').text(ccrewname);
            //$('.tokenno').text(tokenno);
            $('.ccheckintime').text(ccheckintime);

            $('#bedid').val(bedid);
            $('#cbedid').val(cbedid);
            $('#bedno').val(bedno);
            $('#cbedno').val(cbedno);
            $('#station').val(station);
            $('#division').val(division);
            $('#ccrewid').val(ccrewid);
            $('#ccrewname').val(ccrewname);
            //$('#tokenno').val(tokenno);
            $('#ccheckintime').val(ccheckintime);
        })


    </script>

</x-app-layout>
