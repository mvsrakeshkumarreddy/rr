<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Addbed;

class AdminController extends Controller
{
    public function index()
    {
    	if(Auth::id())
    	{
    		$usertype = Auth()->user()->usertype;

    		if($usertype == 'user')
    		{
    			return view('user.index');
    		}
    		elseif ($usertype == 'admin') 
    		{
    			return view('admin.index');
    		}
    		else
    		{
    			return redirect()->back();
    		}
    	}
    }

    public function addbed(Request $request)
    {


    	return view('admin.addbed');
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



}
