<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostHastags;
use App\Models\PostHasVideo;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost(){
        
        return view('add_post')->with('videos', Video::all())->with('tags', Tag::all());
    }
    public function add_post(Request $request){

         $post=Post::create([
            'name' => $request['name'],
            
        ]);
        foreach($request->videos as $video){

            
         PostHasVideo::create([
            'post_id' => $post->id,
            'video_id' => $video,

            
        ]);

        }
        foreach($request->tags as $tag){

            PostHastags::create([
               'post_id' => $post->id,
               'tag_id' => $tag,
   
               
           ]);
   
           }
           return  view('post')->with('posts', Post::all())
           ->with('posthastags',PostHastags::all())
           ->with('posthasVideos',PostHasVideo::all());
    }
    public function post(){
        return view('post')->with('posts', Post::all())
        ->with('posthastags',PostHastags::all())
        ->with('posthasVideos',PostHasVideo::all());
 


    }
    public function destory($id){
       $post =Post::findOrFail($id);
        $post->delete();
        return view('post')->with('posts', Post::all())
        ->with('posthastags',PostHastags::all())
        ->with('posthasVideos',PostHasVideo::all());

    }
    public function ShowpostByid($id){
        $post =Post::findOrFail($id);
        $postHasVideos=PostHasVideo::all()->where('post_id',"=",$id);
        $postHastags=PostHastags::all()->where('post_id',"=",$id);
       $videos=[];
        $tags=[];
    
        
       
        foreach($postHasVideos as $postHasVideo){
            $videos[]=Video::findOrFail($postHasVideo->video_id);

        }
        
        foreach($postHastags as $postHastag){
            $tags[]=Tag::findOrFail($postHastag->tag_id);


        } 

         return view('show_post')->with('videos',$videos)->with('tags',$tags)->with('post',$post);

    }
    public function updatePost($id){
        $post =Post::findOrFail($id);
        $postHasVideos=PostHasVideo::all()->where('post_id',"=",$id);
        $postHastags=PostHastags::all()->where('post_id',"=",$id);
       $postHasVid=[];
        $postHasta=[];
        
        
       
        foreach($postHasVideos as $postHasVideo){
            $postHasVid[]=Video::findOrFail($postHasVideo->video_id);

        }
        foreach($postHastags as $postHastag){
            $postHasta[]=Tag::findOrFail($postHastag->tag_id);


        }
        $video=Video::all();
        $tag=Tag::all() ;

         return view('edit_post')
         ->with('postHasVid',$postHasVid)
         ->with('postHasta',$postHasta)
         ->with('post',$post)
         ->with('videos',$video)
         ->with('tags',$tag);

    }
     
    public function updatePostFunction($id,Request $request){
        
        $post=Post::findOrFail($id);
        $postHasVideos=PostHasVideo::all()->where('post_id',"=",$id);
        $postHastags=PostHastags::all()->where('post_id',"=",$id);
        
        if($request->videos !==null) {
            foreach($request->videos as $video){
                $already_exist=true;
                foreach($postHasVideos as $postHasVideo){
                    if($video == $postHasVideo->id ){
                        $already_exist=false;
    
                    }
                }
                if($already_exist){
    
                    PostHasVideo::create([
                       'post_id' => $post->id,
                       'video_id' => $video,
           
                       
                   ]);
                }
                
            }
        }
        
if($request->tags !==null){
    foreach($request->tags as $tag){
        $already_exist=true;
        foreach($postHastags as $postHastag){
            if($tag == $postHastag->id ){
                $already_exist=false;

            }
        }
        if($already_exist){

            PostHastags::create([
               'post_id' => $post->id,
               'tag_id' => $tag,
   
               
           ]);
        }
        
    }
}
       
        $post->name =$request->name;
        $post->save();
        return view('post')->with('posts', Post::all())
        ->with('posthastags',PostHastags::all())
        ->with('posthasVideos',PostHasVideo::all());
    }
}
