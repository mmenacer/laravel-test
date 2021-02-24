<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function destory($id){
        $video=Video::findOrFail($id);
        $video->delete();
     
}
}
