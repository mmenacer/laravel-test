@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add_post') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Post Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Videos') }}</label>

                            <select name="videos[]" multiple="" id="">
                                <option value="" selected disabled>select video</option>
                                @foreach ($videos as $video)
                                <option value="{{$video->id}}">{{$video->name}}</option>
                                
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tag') }}</label>

                            <select name="tags[]" multiple="" id="">
                                <option value="" selected disabled>select tag</option>
                                @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                
                                @endforeach
                            </select>
                          </div>
                         
                       

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Post') }}
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
