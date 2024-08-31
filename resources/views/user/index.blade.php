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
            <input type="hidden" class="form-control" id="building" name="building" :value="old('building')">
          </div>
          <div class="mb-3">
            <label for="crewid" class="col-form-label">Crew ID</label>
            <input type="text" class="form-control" id="crewid" required="required" name="crewid" :value="old('crewid')">
          </div>
          <div class="mb-3">
            <label for="crewname" class="col-form-label">Crew Name</label>
            <input type="text" class="form-control" id="crewname" required="required" name="crewname" :value="old('crewname')">
          </div>
          <div>
                <x-jet-label for="desig" value="{{ __('Designation') }}" />
                    <select class="form-select" id="desig" name="desig">
                      <option value="LPM">LPM</option>
                      <option value="LPP">LPP</option>
                      <option value="LPG">LPG</option>
                      <option value="SALP">SALP</option>
                      <option value="ALP">ALP</option>
                      <option value="TMR">TMR</option>
                    </select>
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
            <input type="hidden" class="form-control" id="cbuilding" name="cbuilding" :value="old('cbuilding')">
            <input type="hidden" class="form-control" id="cdesig" name="cdesig" :value="old('cdesig')">
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
          
        @foreach($groundfloor as $beddetails)
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
      <p style="font-size: 15px;font-weight: bold;color: white;">{{$beddetails->crewid}}@if($beddetails->checkintime != null) -   {{round(((-strtotime($beddetails->checkintime)+strtotime(date('Y-m-d H:i:s')))/60+330)/60,2)}} Rest Hrs @endif</p>

            <div class="icon">{{$beddetails->bedno}}<i class="material-icons md-48">bedroom_child</i></div>
            @if($beddetails->bedstatus == 0)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text showdetails" data-details="Check-in" data-bedno="{{$beddetails->bedno}}" data-bedid="{{$beddetails->id}}" data-station="{{$beddetails->station}}" data-division="{{$beddetails->division}}" data-building="{{$beddetails->building}}">Check-in</a>
            @endif
            @if($beddetails->bedstatus == 1)
            <p class="title">{{$beddetails->crewname}} / {{$beddetails->desig}}</p>
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#checkoutexampleModal" class="text showdetails" data-details="Check-out" data-cbedno="{{$beddetails->bedno}}" data-cbedid="{{$beddetails->id}}" data-ccrewid="{{$beddetails->crewid}}" data-ccrewname="{{$beddetails->crewname}}" data-cdesig="{{$beddetails->desig}}" data-ccheckintime="{{$beddetails->checkintime}}" data-cbuilding="{{$beddetails->building}}">Check-out</a>
            @endif
      </div>
    @endforeach
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
          
        @foreach($firstfloor as $beddetails)
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
      <p style="font-size: 15px;font-weight: bold;color: white;">{{$beddetails->crewid}}@if($beddetails->checkintime != null) -   {{round(((-strtotime($beddetails->checkintime)+strtotime(date('Y-m-d H:i:s')))/60+330)/60,2)}} Rest Hrs @endif</p>

            <div class="icon">{{$beddetails->bedno}}<i class="material-icons md-48">bedroom_child</i></div>
            @if($beddetails->bedstatus == 0)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text showdetails" data-details="Check-in" data-bedno="{{$beddetails->bedno}}" data-bedid="{{$beddetails->id}}" data-station="{{$beddetails->station}}" data-division="{{$beddetails->division}}" data-building="{{$beddetails->building}}">Check-in</a>
            @endif
            @if($beddetails->bedstatus == 1)
            <p class="title">{{$beddetails->crewname}} / {{$beddetails->desig}}</p>
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#checkoutexampleModal" class="text showdetails" data-details="Check-out" data-cbedno="{{$beddetails->bedno}}" data-cbedid="{{$beddetails->id}}" data-ccrewid="{{$beddetails->crewid}}" data-ccrewname="{{$beddetails->crewname}}" data-cdesig="{{$beddetails->desig}}" data-ccheckintime="{{$beddetails->checkintime}}" data-cbuilding="{{$beddetails->building}}">Check-out</a>
            @endif
      </div>
    @endforeach
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
          
        @foreach($secondfloor as $beddetails)
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
      <p style="font-size: 15px;font-weight: bold;color: white;">{{$beddetails->crewid}}@if($beddetails->checkintime != null) -   {{round(((-strtotime($beddetails->checkintime)+strtotime(date('Y-m-d H:i:s')))/60+330)/60,2)}} Rest Hrs @endif</p>

            <div class="icon">{{$beddetails->bedno}}<i class="material-icons md-48">bedroom_child</i></div>
            @if($beddetails->bedstatus == 0)
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text showdetails" data-details="Check-in" data-bedno="{{$beddetails->bedno}}" data-bedid="{{$beddetails->id}}" data-station="{{$beddetails->station}}" data-division="{{$beddetails->division}}" data-building="{{$beddetails->building}}">Check-in</a>
            @endif
            @if($beddetails->bedstatus == 1)
            <p class="title">{{$beddetails->crewname}} / {{$beddetails->desig}}</p>
            <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#checkoutexampleModal" class="text showdetails" data-details="Check-out" data-cbedno="{{$beddetails->bedno}}" data-cbedid="{{$beddetails->id}}" data-ccrewid="{{$beddetails->crewid}}" data-ccrewname="{{$beddetails->crewname}}" data-cdesig="{{$beddetails->desig}}" data-ccheckintime="{{$beddetails->checkintime}}" data-cbuilding="{{$beddetails->building}}">Check-out</a>
            @endif
      </div>
    @endforeach
      </div>

      </div>
    </div>
  </div>
</div>





    <script type="text/javascript">
        $(document).on('click', '.showdetails', function(e){
            let bedno = $(this).data('bedno');
            let cbedno = $(this).data('cbedno');
            let bedid = $(this).data('bedid');
            let cbedid = $(this).data('cbedid');
            let details = $(this).data('details');
            let station = $(this).data('station');
            let building = $(this).data('building');
            let cbuilding = $(this).data('cbuilding');
            let cdesig = $(this).data('cdesig');
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
            $('.building').text(building);
            $('.cbuilding').text(cbuilding);
            $('.cdesig').text(cdesig);
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
            $('#building').val(building);
            $('#cbuilding').val(cbuilding);
            $('#cdesig').val(cdesig);
            $('#division').val(division);
            $('#ccrewid').val(ccrewid);
            $('#ccrewname').val(ccrewname);
            //$('#tokenno').val(tokenno);
            $('#ccheckintime').val(ccheckintime);
        })


    </script>

</x-app-layout>
