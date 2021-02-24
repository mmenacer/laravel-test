@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<label for="exampleInputEmail1"> Tags</label>

             

               
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tag</th>
  
    </tr>
  </thead>
  <tbody>
      @foreach ($postHasta as $postHastae)
      <tr>

      <th scope="row">{{$postHastae->id}}</th>
      <td>{{$postHastae->name}}</td>    
        <td><button onclick="deletedTag({{ $postHastae->id }})" >Delete tag</button></td>

      </tr>
     
      @endforeach
  </tbody>
</table>




<label for="exampleInputEmail1"> Videos</label>

             

               
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tag</th>
  
    </tr>
  </thead>
  <tbody>
      @foreach ($postHasVid as $postHasVide)
      <tr>

      <th scope="row">{{$postHasVide->id}}</th>
      <td>{{$postHasVide->name}}</td>    
        <td><button onclick="deletedVideo({{ $postHasVide->id }})" >Delete Video</button></td>

      </tr>
     
      @endforeach
  </tbody>
</table>



<form method="POST" action=" {{url('/updatePostfunction',$post->id )}}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Post Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $post->name}}" required autocomplete="name" autofocus>

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
                {{ __('Update Post') }}
            </button>

          
        </div>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
<script>
      function deletedTag(id){
        axios.delete('/delete_tag/'+ id).then((
              )=>{
                location.reload();
              })
        }

        function deletedVideo(id){
        axios.delete('/delete_video/'+ id).then((
              )=>{
                location.reload();
              })
        }
    </script>


@endsection