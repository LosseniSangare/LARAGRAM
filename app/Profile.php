<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	 protected $fillable = [
      'Titre','description','url', 'user_id',
    ];
    public function user(){
      return $this->belongsTo('App\Users');
    }


		public function getImage(){
			$imagePath = $this->image ?? 'avatar/user-default.png';
			return "/storage/".$imagePath ;
		}
		public function followers(){
			return $this->belongsToMany('App\User');
		}
}
