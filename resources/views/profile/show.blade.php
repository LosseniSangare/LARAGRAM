@extends('layouts.app')

@section('content')

<div class="container">

        <div class="row mt-4">
	        	<div class="col-md-3 text-center mb-5">
	        		<img src="{{asset('svg/profile.jpeg')}}" class="rounded-circle" width="140px" height="120px">
	        	</div>

	        	<div class="col-md-9">

	        		<div class="d-flex">
			        		<div class=" h3 mr-3">{{$user->username}}</div>
			        		<button class="btn btn-primary  pt-2">S'abonner</button>
					    </div>

                  <div class=" mt-3">
                    <span class="mr-3"> <strong>{{$user->posts->count()}}</strong> publications </span>
                    <span class="mr-3"> <strong>0</strong>abonnés  </span>
                    <span class="mr-3"> <strong>0</strong>abonnements </span>
                  </div>
                 @can ('update', $user->profile)
                      <div class="mt-5 ml-3">
                      <a href="{{route('profile.edit',compact('user'))}}" class="btn btn-outline-success text-center"><strong> Modifier mes information</strong></a>
                    </div>
                @endcan

                  <div class="mt-5">

                      <div class=" h5"> <strong>{{$user->profile->Titre}}</strong> </div>
                        <div class="">{{$user->profile->description}}  </div>
                        <div class=""> <a href="{{$user->profile->url}}"><strong>{{$user->profile->url}}</strong></a>  </div>

                    </div>

	        	</div>

            <div class="row mt-5 m-1">
                @foreach ($user->posts as $post)
                  <div class="col-md-4 mb-4" >
                  <a href="{{route('posts.show',['post'=>$post->id])}}">
                  <img src="{{asset('storage/'.$post->image)}}" class="w-100" >
                  </a>
                </div>
                @endforeach



                                    <div class="col-md-4 mb-4"style="background:#eff;border:solid 3px ; border-radius:10px" >
                                            <div class="text-center m-2">
                                                  <a href="{{route('posts.create')}}">
                                                    <img src="{{asset('svg/photo.png')}}" width="50px" class="rounded-circle" style="border:solid black">
                                                 </a>
                                                </div>
                                                 <div class="text-center h5">
                                                <strong>Ajouter un post dans votre profil</strong>
                                                </div>
                                                    <div class="text-center ">
                                                      <span >Ajoutez un post dans votre profil pour que vos amis vous reconnaissent.</span>
                                                    </div>
                                                    <div class="text-center mt-3 mb-3 " >
                                                    	<a href="{{route('posts.create')}}">
                                                        <button class="btn btn-sm btn-primary  pt-2" >
                                                          <strong>Créer un post</strong>
                                                        </button>
                                                      </a>
                                                    </div>
                                                </div>
                          </div>

                        </div>

                    </div>
                </div>

@endsection
