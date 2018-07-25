<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LeaveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 	
	
    public function view()
    {
		return view('leaveRequest');
    }
	
    public function request()
    {
		$user_id = Auth::user()->id;
		
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
}