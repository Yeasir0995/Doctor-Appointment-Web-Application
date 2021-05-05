<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use\App\Doctor;

class Doctor extends Authenticatable
{
    use Notifiable;

       protected $guard = 'doctor';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'password','lastname', 'state', 'specialization',
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setFirstNameAttribute($value) {
        $this->attributes['firstname'] = ucfirst($value);
    }  
   
    //accessor
    public function getFirstNameAttribute($value) {
    return strtoupper($value);
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    //relationship method naming must be single
    public function Appointment() {
        return $this->hasMany('App\TIME');
    }


    
}
