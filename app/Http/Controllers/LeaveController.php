<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LeaveRequest;


class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 	
	
    public function view()
    {
		return view('leaveRequest');
    }
	
    public function request(Request $request)
    {
		$user_id = Auth::user()->id;
		$leaveDate = date("Y-m-d",strtotime($request->get('selectedDate')));
		$today = date("Y-m-d");
		if($leaveDate <= $today)
			return redirect()->back()->with('status', 'Please select a date in future');
		else
		{
			$leaveRequest =  new LeaveRequest(array('date' => $leaveDate, 'user_id' => $user_id));			
			$leaveRequest->save();			
			
			return redirect('/home')->with('status', 'Success!!!</br> The leave request is sent the admin. Pending for approval');
		}
	}	
}