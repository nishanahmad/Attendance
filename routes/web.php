<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@home');
Route::get('home', 'HomeController@home');
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');

Route::get('checkIn', 'TimeSheetController@checkInView');
Route::post('checkIn', 'TimeSheetController@checkIn');
Route::get('checkOut', 'TimeSheetController@checkOutView');
Route::post('checkOut', 'TimeSheetController@checkOut');

Route::get('leaveRequest', 'LeaveRequestController@view');
Route::post('leaveRequest', 'LeaveRequestController@request');

Route::get('/leaves/{company?}','LeaveController@view');

Auth::routes();

