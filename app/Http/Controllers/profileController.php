<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class profileController extends Controller
{

public function __construct(){
	$this->middleware('auth');
}
	public function show(User $user){
   return view('profile.show',compact('user'));
	 // return($user);
	}

public function edit(User $user){
		return view('profile.edit',compact('user'));
}

public function update(User $user){

}



}
