<?php

namespace App;
	
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'is_active', 'name', 'email', 'password', 'photo_id',
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
	
/** Custom Methods **/
	
	public function role(){
		
		return $this->belongsTo('App\Role');
	}
	
	public function photo(){
		
		return $this->belongsTo('App\Photo');
	}
	
	public function isAdmin(){
		
		if($this->role->name == "Administrator" && $this->is_active == 1){
			
			return true;
		}
		
		return false;
	}
	
	
	public function post(){
		
		return $this->hasMany('App\Post');
	}
}
