<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TimeSheet;
use App\User;


class TimeSheetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 	
	
    public function checkInView()
    {
		return view('timesheets.checkIn');
    }
	
    public function checkOutView()
    {
		date_default_timezone_set('Asia/Calcutta'); 
		$now = date('H:i:s');		
		return view('timesheets.checkOut',compact('now'));
    }	
	
    public function checkIn()
    {
		$user_id = Auth::user()->id;
		date_default_timezone_set('Asia/Calcutta'); 
		$today = date('Y-m-d');
		$now = date('H:i:s');
		

		
		try
		{
			$timeSheet = new TimeSheet(array('date' => $today, 'user_id' => $user_id, 'checkIn' => $now));			
			$timeSheet->save();			
		}
		catch(\Illuminate\Database\QueryException $e)
		{
			return redirect()->back()->with('status', 'Error!!! Please contact admin with the following error detail :<br><br>'.$e->getMessage());										
		}
		
		try
		{
			$user = User::whereId($user_id)->firstOrFail();
			$user -> isCheckedIn = 1;
			$user -> save();
		}
		catch(ModelNotFoundException $e)
		{
			return redirect()->back()->with('status', 'Error!!! Please contact admin with the following error detail :<br><br>'.$e->getMessage());										
		}		
		return redirect('home');    			
	}	
	
    public function checkOut()
    {
		$user_id = Auth::user()->id;
		date_default_timezone_set('Asia/Calcutta'); 
		$today = date('Y-m-d');
		$now = date('H:i:s');
		

		try
		{
			$timeSheet = TimeSheet::where('user_id',$user_id)
									->where('date',$today)
									->first();	
			$timeSheet-> checkOut = $now;			
			$timeSheet->save();

		}
		catch(\Illuminate\Database\QueryException $e)
		{
			return redirect()->back()->with('status', 'Error!!! Please contact admin with the following error detail :<br><br>'.$e->getMessage());										
		}
		
		try
		{
			$user = User::whereId($user_id)->firstOrFail();
			$user -> isCheckedIn = 0;			
			$user -> save();
		}
		catch(\Illuminate\Database\QueryException $e)
		{
			return redirect()->back()->with('status', 'Error!!! Please contact admin with the following error detail :<br><br>'.$e->getMessage());										
		}
		return redirect('home');    					
	}		
}
