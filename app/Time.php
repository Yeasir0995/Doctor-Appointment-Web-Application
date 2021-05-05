<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Admin;

class Time extends Model
{
    
    
    public function user () {
    	return $this->belongsTo('App\Admin');
    }
}
