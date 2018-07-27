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
			if(Auth::user()->role != 'Admin')
				return view('home');							
			else
				return view('adminHome');							
		}
			

		else
			return view('auth/login');			
    }
}
