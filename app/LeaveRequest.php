<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = [
        'user_id', 'date'
    ];
	
	
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
