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

    		if($usertype == 'user')
    		{
    			$beddetails = addbed::orderBy('bedno', 'ASC')->where('station', $userstationcode)->get();
    			//$bedcheckdetails = checkin::orderBy('bedno', 'ASC')->where('station', $userstationcode)->whereNull('checkouttime')->get();
    			//$bedcheckdetails = DB::table('addbeds')->leftJoin('checkins', 'addbeds.id', '=', 'checkins.bedid')->whereNull('checkins.checkouttime')->get();
    			return view('user.index', compact('beddetails'));
    		}
    		elseif ($usertype == 'admin') 
    		{
    			$beddetails = addbed::orderBy('bedno', 'ASC')->get();
    			return view('admin.index', compact('beddetails'));
    		}
    		else
    		{
    			return redirect()->back();
    		}
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
	$checkindata->crewid = strtoupper($request->crewid);
	$checkindata->crewname = strtoupper($request->crewname);
	$checkindata->tokenno = $request->tokenno;
	$checkindata->checkintime = $request->checkintime;
	$checkindata->save();


	//$bedstatuschange = addbed::where('id', $checkindata->bedid)->get();
	

	DB::table('addbeds')->where('id', $request->bedid)->update(['bedstatus' => 1, 'crewid' => $checkindata->crewid, 'crewname' => $checkindata->crewname, 'tokenno' => $checkindata->tokenno, 'checkintime' => $checkindata->checkintime,]);
	



	

	\Session::flash('success', 'Data inserted Successfully.');
    return redirect()->back();

}



}
