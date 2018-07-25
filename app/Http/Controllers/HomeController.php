<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
		if (Auth::check())
		{
			
			if(Auth::user()->isCheckedIn)
			{
				$string = 'Checked In';
				return view('home',compact('string'));			
			}
			else
			{
				$string = 'Not Checked In';
				return view('home',compact('string'));							
			}
				
		}

		else
			return view('auth/login');			
		
    }
}
