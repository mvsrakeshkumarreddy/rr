<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Addbed;
use App\Models\Checkin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
    	if(Auth::id())
    	{
    		$usertype = Auth()->user()->usertype;
    		$userstationcode = Auth()->user()->stationcode;
    		$userbuilding = Auth()->user()->building;

    		if($usertype == 'user')
    		{
    			$beddetails = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->get();
    			//$bedcheckdetails = checkin::orderBy('bedno', 'ASC')->where('station', $userstationcode)->whereNull('checkouttime')->get();
    			//$bedcheckdetails = DB::table('addbeds')->leftJoin('checkins', 'addbeds.id', '=', 'checkins.bedid')->whereNull('checkins.checkouttime')->get();
    			$groundfloor = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->where('floor', 0)->get();
    			$firstfloor = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->where('floor', 1)->get();
    			$secondfloor = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->where('floor', 2)->get();
    			return view('user.index', compact('beddetails','groundfloor','firstfloor','secondfloor'));
    		}
    		elseif ($usertype == 'admin') 
    		{
    			$beddetails = addbed::orderBy('bedno', 'ASC')->get();
    			$groundfloor = addbed::orderBy('bedno', 'ASC')->where('floor', 0)->get();
    			$firstfloor = addbed::orderBy('bedno', 'ASC')->where('floor', 1)->get();
    			$secondfloor = addbed::orderBy('bedno', 'ASC')->where('floor', 2)->get();
    			return view('admin.index', compact('beddetails','groundfloor','firstfloor','secondfloor'));
    		}
    		else
    		{
    			return redirect()->back();
    		}
    	}
    	else
    	{
    		return view('auth.login');
    	}


    }

    public function addbed(Request $request)
    {

    	if(Auth::id())
    	{
    		$usertype = Auth()->user()->usertype;
    		$userstationcode = Auth()->user()->stationcode;

    		if ($usertype == 'admin') 
    		{
    			return view('admin.addbed');
    		}
    		else
    		{
    			return redirect()->back();
    		}
    	}

    	
    }

 public function addbeds(Request $request)
    {
    	
    	$beddata = new Addbed;
    	$beddata->division = strtoupper($request->division);
    	$beddata->station =  strtoupper($request->station);
    	$beddata->building =  $request->building;
    	$beddata->floor = strtoupper($request->floor);
    	$beddata->bedno =  $request->bedno;
    	$beddata->addedby = strtoupper($request->addedby);
    	$beddata-> save();

    	\Session::flash('success', 'Data inserted Successfully.');
    	return redirect()->back();
    	
    }


public function checkins(Request $request)
{


	$checkindata = new Checkin;
	$checkindata->bedid = $request->bedid;
	$checkindata->bedno = $request->bedno;
	$checkindata->division = $request->division;
	$checkindata->station = $request->station;
	$checkindata->building = $request->building;
	$checkindata->crewid = strtoupper($request->crewid);
	$checkindata->crewname = strtoupper($request->crewname);
	$checkindata->desig = strtoupper($request->desig);
	$checkindata->tokenno = $request->tokenno;
	$checkindata->checkintime = $request->checkintime;
	$checkindata->save();


	//$bedstatuschange = addbed::where('id', $checkindata->bedid)->get();
	

	DB::table('addbeds')->where('id', $request->bedid)->update(['bedstatus' => 1, 'crewid' => $checkindata->crewid, 'crewname' => $checkindata->crewname, 'desig' => $checkindata->desig, 'tokenno' => $checkindata->tokenno, 'checkintime' => $checkindata->checkintime,]);
	



	

	\Session::flash('success', 'Data inserted Successfully.');
    return redirect()->back();

}


public function checkouts(Request $request)
{

/*
	$checkoutdata = new Checkout;
	$checkoutdata->cbedid = $request->cbedid;
	$checkoutdata->cbedno = $request->cbedno;
	//$checkoutdata->division = $request->division;
	//$checkoutdata->station = $request->station;
	$checkoutdata->ccrewid = $request->ccrewid;
	//$checkoutdata->crewname = strtoupper($request->crewname);
	//$checkoutdata->tokenno = $request->tokenno;
	$checkoutdata->ccheckintime = $request->ccheckintime;
	//$checkoutdata->save();
*/
	date_default_timezone_set('Asia/Kolkata');
	$checkouttime = date('Y-m-d H:i:s');


	//$bedstatuschange = addbed::where('id', $checkindata->bedid)->get();
	

	DB::table('addbeds')->where('id', $request->cbedid)->update(['bedstatus' => 0, 'crewid' => null, 'crewname' => null, 'desig' => null, 'tokenno' => null,  'checkintime' => null]);
	DB::table('checkins')->where('bedid', $request->cbedid)->whereNull('checkouttime')->update(['checkouttime' => $checkouttime]);
	



	

	\Session::flash('success', 'Data inserted Successfully.');
    return redirect()->back();

}

public function checkinsummary()
{
	if(Auth::id())
    	{
    		$usertype = Auth()->user()->usertype;
    		$userstationcode = Auth()->user()->stationcode;
    		$userbuilding = Auth()->user()->building;

    		if($usertype == 'user')
    		{
    			$beddetails = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->get();
    			//$bedcheckdetails = checkin::orderBy('bedno', 'ASC')->where('station', $userstationcode)->whereNull('checkouttime')->get();
    			//$bedcheckdetails = DB::table('addbeds')->leftJoin('checkins', 'addbeds.id', '=', 'checkins.bedid')->whereNull('checkins.checkouttime')->get();
    			$groundfloor = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->where('floor', 0)->get();
    			$firstfloor = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->where('floor', 1)->get();
    			$secondfloor = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->where('building', $userbuilding)->where('floor', 2)->get();
    			return view('user.index', compact('beddetails','groundfloor','firstfloor','secondfloor'));
    		}
    		elseif ($usertype == 'admin') 
    		{
    			$checkindetails = checkin::orderBy('id', 'ASC')->get();
    			
    			return view('admin.checkinsummary', compact('checkindetails'));
    		}
    		else
    		{
    			return redirect()->back();
    		}
    	}
}


}
