@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <label > Post ID :  {{ $post->id }}</label>

                <label >  POST Name : {{ $post->name }}</label>
                <label >   Videos :</label>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Video</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                        <tr>

                        <th scope="row">{{$video->id}}</th>
                        <td>{{$video->name}}</td>
                        </tr>
                       
                        @endforeach
                    </tbody>
                  </table>
                <label for="exampleInputEmail1"> Tags</label>

             

               
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Tag</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                        <tr>

                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        </tr>
                       
                        @endforeach
                    </tbody>
                  </table>

                 
             

                

            </div>
        </div>
    </div>
</div>
@endsection