<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
class profileController extends Controller
{
	protected $guarded = [];

public function __construct(){
	// $this->middleware('auth');
}
	public function show(User $user){
		$follows= (auth()->user() )? auth()->user()->following->contains($user->profile->id) : 'false';
   return view('profile.show',compact('user','follows'));
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
	'url'=>['required','url'],
	'image'=>['sometimes','image','max:3000']
]);

if(request()->image){
	$imagePath = request()->image->store('avatar','public');

	$image=Image::make(public_path("/storage/{$imagePath}"))->fit(800,800);
	$image->save();

	auth()->user()->profile()->update(array_merge($data,['image'=>$imagePath]));

}else{
	auth()->user()->profile->update($data);
}
	return redirect(route('profile.show',compact('user')));


}



}
