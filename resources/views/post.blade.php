@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Post Name</th>
                        <th scope="col">Video Name</th>
                        <th scope="col">Tag Name</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"><a href="/add_post">Add post</a></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($posts as $post)
                        <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->name}}</td>
                        <td>
                        @foreach ($posthasVideos as $posthasVideo)
                            @if($posthasVideo->post_id == $post->id)
                            {!! $video= App\Models\Video::findOrFail($posthasVideo->video_id)->name!!},
                            
                            
                            @endif
                        @endforeach
                       
                        </td>
                        <td>
                          @foreach ($posthastags as $posthastag)
                          @if($posthastag->post_id == $post->id)
                          {{$tag= App\Models\Tag::findOrFail($posthastag->tag_id)->name}},
                         
                          @endif
                      @endforeach
                        </td> 
                        <td><a href="{{ route('show.post', $post->id) }}">View</a></td>
                        <td><a href="{{ route('update.post', $post->id) }}">Edit<a></td>
                          <td>
                        <form
                        action="{{route('delete.post', $post->id) }}"
                        method="POST"
                        onsubmit="return confirm('Etes vous sur ?');"
                        >
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                      </td> 
                        

                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                  
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <label>Are you sure you want to delete?</label>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="delete" >Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>


<script>


   function deleted(e){
 
 consol.log(e);
   }
  </script>
@endsection