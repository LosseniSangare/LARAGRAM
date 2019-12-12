<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name','username','email', 'password',
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

public static function boot(){
  parent::boot();

  static::created(function($user){
    $user->profile()->create([
      'Titre'=>'Le profil de '.$user->username
    ]);
  });
}

    public function getRouteKeyName(){
        return 'username';
    }

    public function profile(){
      return $this->hasOne('App\Profile');
    }
    public function posts(){
      return $this->hasMany('App\Posts')->orderBy('created_at','DESC');
    }


public function following(){
return  $this->belongsToMany('App\Profile');
}

    public function isAdmin(){
      return false;
    }
}
