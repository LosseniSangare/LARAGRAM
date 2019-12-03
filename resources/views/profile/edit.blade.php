@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier votre profil') }}</div>
                <div class="card-body">

                    <form method="post" action="{{ route('profile.update',compact('user')) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="Titre" class="ml-3 col-form-label text-md-right">{{ __('TITRE') }}</label>

                            <div class="col-md-12">
                                <input id="Titre" type="Titre" class="form-control @error('Titre') is-invalid @enderror" name="Titre" value="{{ $user->profile->Titre ?? old('Titre') }}"  autocomplete="Titre" autofocus>

                                @error('Titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                        </div>




                        <div class="form-group row">
                            <label for="description" class="ml-3 col-form-label text-md-right">{{ __('URL') }}</label>

                            <div class="col-md-12">
                              <textarea name="description" rows="5" class="col-md-12"> {{$user->profile->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                        </div>



                        <div class="form-group row">
                            <label for="url" class="ml-3 col-form-label text-md-right">{{ __('URL') }}</label>

                            <div class="col-md-12">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $user->profile->url ?? old('url') }}"  autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                        </div>




                        <div class="form-group row">
                            <label for="image" id="validatedCustomFile"  class="ml-3 col-form-label text-md-right">{{ __('IMAGE') }}</label>
                            <div class="custom-file col-md-12 ">
                              <input type="file" name="image" class="custom-file-input @error ('image') is-invalid  @enderror" id="validatedCustomFile" >
                              <label class="custom-file-label" for="validatedCustomFile">Choisir l'image</label>

                              @error('image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier mon profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
