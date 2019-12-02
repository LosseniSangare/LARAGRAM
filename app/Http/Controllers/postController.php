<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Posts;

class postController extends Controller
{
    public function __construct(){
      return $this->middleware('auth');
    }

public function create(){
    return view('posts.create');
}

public function store(Request $request){

  $data=$request->validate([
    'caption'=>['required','min:1','string'],
    'image'  =>['required','image'],
  ]);

    $imagePath = $request->image->store('uploads','public');

    $image=Image::make(public_path("/storage/{$imagePath}"))->fit(1200,1200);
    $image->save();

    auth()->user()->posts()->create([
    'caption' => $data['caption'],
    'image'   => $imagePath,
  ]);

  return redirect()->route('profile.show',['user'=>auth()->user()]);
}

public function show(Posts $post){
    return view('posts.show',compact('post'));
}

}
