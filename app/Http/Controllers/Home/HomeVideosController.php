<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Headline;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeVideosController extends Controller
{
    public function index()
    {
        $headlines = Headline::all();
        $videos = Video::paginate(9);
        return view('frontend.videos.all',compact('headlines', 'videos'));
    }
    public function show($video_id)
    {
        $videos = Video::findOrFail($video_id); 
        $simillerVideos = Video::where('headline_id',$videos->headline_id)->take(4)->get();
        return view('frontend.videos.show',compact('videos','simillerVideos'));
    }

}
