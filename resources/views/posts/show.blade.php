@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="card">
                <div class="card-header h2 text-center"><b>{{ __('Post du '.$post->created_at) }}</b></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8" style="border-right:1px solid">
                      <div class="">
                        <img src="{{asset("/storage/{$post->image} ")}}" class="w-100" >
                      </div>
                    </div>
                    <div class="col-md-4 text-center">
                      <div class="h4 "><b> {{$post->user->username}} </b></div>
                        <p>{{$post->caption}}</p>
                    </div>
                  </div>
                </div>

        </div>
    </div>
</div>
@endsection
