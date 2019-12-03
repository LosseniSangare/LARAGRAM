<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Auth;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\User;
class profileController extends Controller
{
	protected $guarded = [];

public function __construct(){
	$this->middleware('auth');
}
	public function show(User $user){
   return view('profile.show',compact('user'));
	 // return($user);
	}

public function edit(User $user){
// dd(Gate::allows('update-profile'));
	$this->authorize('update',$user->profile) ;
			return view('profile.edit',compact('user'));
}

public function update(User $user){
$this->authorize('update',$user->profile);
$data = request()->validate([
	'Titre'=>['required','min:2'],
	'description'=>['required','min:3'],
	'url'=>['required','url']
]);
auth()->user()->profile->update($data);

return redirect(route('profile.show',compact('user')));
}



}
