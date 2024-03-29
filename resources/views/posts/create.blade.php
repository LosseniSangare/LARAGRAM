@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Creer un post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.create') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('LEGENDE') }}</label>

                            <div class="col-md-6">
                                <input id="caption" type="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ $caption ?? old('caption') }}"  autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                        </div>

                        <div class="form-group row">
                            <label for="image" id="validatedCustomFile"  class="col-md-4 col-form-label text-md-right">{{ __('IMAGE') }}</label>
                            <div class="custom-file col-md-6 ">
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
                                    {{ __('Créer mon Post') }}
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
