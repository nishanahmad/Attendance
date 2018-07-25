<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $fillable = [
        'user_id', 'date', 'checkIn','checkOut'
    ];
	
	public $timestamps = false;	
	
    public function user()
    {
        return $this->belongsTo('App\User');
    }	
}
