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

 $scope.bedsummary = @json($bedsummary);

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

//console.log($scope.beddetailsummary);

url = "https://cms.indianrail.gov.in/CMSREPORT/JSP/rpt/crew/CrewDetail1.do?hmode=crewBiodataReports&type=OtherDetails&XML=%3C%3Fxml+version%3D%221.0%22+encoding%3D%22UTF-8%22%3F%3E+%3CCMSPublishXML+baseLanguage%3D%22string%22+transLanguage%3D%22string%22%3E++%3CCMSREPORT+action%3D%22REP%22+relationship%3D%22string%22++transLanguage%3D%22string%22%3E++%3Czone%3ESC%3C%2Fzone%3E+%3Cdivision%3EGTL%3C%2Fdivision%3E+%3Clobby%3ENRE%3C%2Flobby%3E+%3Cdesig1%3EALP%3C%2Fdesig1%3E+%3Cdesig2%3ESALP%3C%2Fdesig2%3E+%3Cdesig3%3ELPG%3C%2Fdesig3%3E+%3Cdesig4%3Efalse%3C%2Fdesig4%3E+%3Cdesig5%3Efalse%3C%2Fdesig5%3E+%3Cdesig6%3Efalse%3C%2Fdesig6%3E+%3Cdesig7%3Efalse%3C%2Fdesig7%3E+%3Cdesig8%3Efalse%3C%2Fdesig8%3E+%3Cdesig9%3Efalse%3C%2Fdesig9%3E+%3Cdesig10%3Efalse%3C%2Fdesig10%3E+%3Cdesig11%3Efalse%3C%2Fdesig11%3E+%3Cdesig12%3Efalse%3C%2Fdesig12%3E+%3Cdesig13%3Efalse%3C%2Fdesig13%3E+%3Cdesig14%3Efalse%3C%2Fdesig14%3E+%3Cabnormality1%3ECOMMERCIAL%3C%2Fabnormality1%3E+%3Cabnormality2%3Efalse%3C%2Fabnormality2%3E+%3Cabnormality3%3Efalse%3C%2Fabnormality3%3E+%3Cabnormality4%3Efalse%3C%2Fabnormality4%3E+%3Cabnormality5%3Efalse%3C%2Fabnormality5%3E+%3Cabnormality6%3Efalse%3C%2Fabnormality6%3E+%3Cabnormality7%3Efalse%3C%2Fabnormality7%3E+%3Cabnormality8%3Efalse%3C%2Fabnormality8%3E+%3Cabnormality9%3Efalse%3C%2Fabnormality9%3E+%3Cabnormality10%3Efalse%3C%2Fabnormality10%3E+%3Cabnormality11%3Efalse%3C%2Fabnormality11%3E+%3Cabnormality12%3Efalse%3C%2Fabnormality12%3E+%3CstartingDate%3E%3C%2FstartingDate%3E+%3CendDate%3E%3C%2FendDate%3E+%3CmonthYearDateFormat%3E%3C%2FmonthYearDateFormat%3E+%3CmsgSrc%3ECS%3C%2FmsgSrc%3E+%3Ctraction%3EALL%3C%2Ftraction%3E+%3Ccadre%3EE%27%2C%27M%27%2C%27B%3C%2Fcadre%3E+%3CfghtCochSht%3EFghtCoch%3C%2FfghtCochSht%3E+%3Cdesignation%3EPILOT%3C%2Fdesignation%3E+%3Cactive%3EActive%3C%2Factive%3E+%3Crlevel%3ELOBBY%3C%2Frlevel%3E+%3Cdurationtype%3EFORTNIGHT%3C%2Fdurationtype%3E+%3CcombALP%3ECOMB%3C%2FcombALP%3E+%3CslotData%3Enot+Slot+Data%3C%2FslotData%3E+%3CdesigSelect%3EOFFICIATING%3C%2FdesigSelect%3E+%3CcrewAvailableCheckList%3ECrewAvailableFIFO%3C%2FcrewAvailableCheckList%3E+%3CcontValue%3EContinuous%3C%2FcontValue%3E+%3CmandatoryRequirementDueFilter%3EReft%3C%2FmandatoryRequirementDueFilter%3E+%3CsignOnOFFVal%3ESignOnVal%3C%2FsignOnOFFVal%3E+%3ClocoTraction%3EALL%3C%2FlocoTraction%3E+%3Ccont_NoncontValue%3EContinuousHQ%3C%2Fcont_NoncontValue%3E+%3CcontValueOption%3ESignOnOff%3C%2FcontValueOption%3E+%3Cspare%3Espare%3C%2Fspare%3E+%3CcrewBAStatus%3ESIGNON%3C%2FcrewBAStatus%3E+%3Cpddpad%3EHQ+crew+at+HQ%3C%2Fpddpad%3E+%3CcrewIDBaseID%3ECrewID%3C%2FcrewIDBaseID%3E+%3CcrewDesgLevel%3EGoods%3C%2FcrewDesgLevel%3E+%3CcurrentMidnignt%3ECURRENT%3C%2FcurrentMidnignt%3E+%3CabnormalityStatus%3EPN%3C%2FabnormalityStatus%3E+%3CcadreFilter%3EnotCadre%3C%2FcadreFilter%3E+%3Cyear1%3E%3C%2Fyear1%3E+%3CcrewBookingWrWorWise%3ECallBookLobbyWise%3C%2FcrewBookingWrWorWise%3E+%3Cmonth1%3E%3C%2Fmonth1%3E+%3CslotFilter%3EPrevious%3C%2FslotFilter%3E+%3CpreodicCoursesVal%3EDONE%3C%2FpreodicCoursesVal%3E+%3CdetailLevel%3ESummary%3C%2FdetailLevel%3E+%3ClocoGroupVal%3EELEC-CONV%3C%2FlocoGroupVal%3E+%3Ctime%3E4%3C%2Ftime%3E+%3ClocoTypeWiseVal%3EGroup%3C%2FlocoTypeWiseVal%3E+%3CreportGroupVal%3ELobby%3C%2FreportGroupVal%3E+%3CdfccRadio%3EALL%3C%2FdfccRadio%3E+%3CfromSttn%3Enull%3C%2FfromSttn%3E+%3CtoSttn%3Enull%3C%2FtoSttn%3E+%3CslotValueCombo%3ESlot%3C%2FslotValueCombo%3E+%3ClocoNosearch%3E%3C%2FlocoNosearch%3E+%3CmonthCombo%3EPrevious%3C%2FmonthCombo%3E+%3CmonthComboValueText%3EPrevious%3C%2FmonthComboValueText%3E+%3CindexValue%3E0%3C%2FindexValue%3E+%3CslotValueText%3ESlot%3C%2FslotValueText%3E+%3Croute%3E-+-+-Route-+-+-%3C%2Froute%3E+%3Croutename%3E-+-+Route-+-+-%3C%2Froutename%3E+%3CfromSttnNameRoute%3E%3C%2FfromSttnNameRoute%3E+%3CtoSttnNameRoute%3E%3C%2FtoSttnNameRoute%3E+%3CtrainingValue%3E-+-+Select+-+-%3C%2FtrainingValue%3E+%3C%2FCMSREPORT%3E++%3C%2FCMSPublishXML%3E&lobby=NRE&lobbyList=SC-GTL-NRE";

urll = "https://cms.indianrail.gov.in/CMSREPORT/JSP/rpt/LoginAction.do?hmode=login&isResponsive=Y&userId=NRECC&userPassword=CMS2024&jcaptcha=7gd1r";



/*
  setTimeout(function () {
  	let win = window.frames.example;

  console.log(win.postMessage("message", url));

    }, 10000);


*/

/*
$http.get('https://cms.indianrail.gov.in/CMSREPORT/JSP/rpt/LoginAction.do?hmode=login&isResponsive=Y&userId=NRECC&userPassword=CMS2024&jcaptcha=7gd1r')
    .then(function(response) {
         var html = response.data;
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(html, 'text/html');
                    var id = doc.getElementById("capt").ownerDocument;
                    $scope.id = id;
                    //console.log(doc.documentElement.outerHTML);
                    console.log($scope.id);
    }, function(error) {
        console.error('Error fetching data', error);
    });


*/




//window.open('https://cms.indianrail.gov.in/CMSREPORT/JSP/rpt/LoginAction.do?hmode=login&isResponsive=Y&userId=NRECC&userPassword=CMS2024&jcaptcha=bgjdr');



/*
 let desired_output = (bedsummary) => {
    let unique_values = bedsummary
        .map((item) => item.age)
        .filter(
            (value, index, current_value) => current_value.indexOf(value) === index
        );
    return unique_values;
};

console.log(desired_output(bedsummary));
*/




});


</script>
</x-app-layout>
