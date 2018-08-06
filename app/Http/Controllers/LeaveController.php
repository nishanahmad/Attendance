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
	
    public function view($company)
    {
		$today = date("Y-m-d");
		$leaveRequests = LeaveRequest::where('date', '>=', $today)
			->whereHas('user', function($query) use ($company) {
				$query->where('company', '=', $company);
			})
			->orderBy('date')
			->get();
		
		return view('leaves.list',compact('leaveRequests'));
    }	
}