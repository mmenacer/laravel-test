<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostHastags;
use App\Models\PostHasVideo;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function destory($id){
            $tag=Tag::findOrFail($id);
            $tag->delete();
         
    }
}
