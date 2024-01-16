<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Headline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\videos\StoreRequest;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function all()
    {
      $videos = Video::paginate(5);
      return view('admin.videos.all' ,compact('videos'));
    }
    public function create()
    {
        $headlines = Headline::all();
        return view('admin.videos.create',compact('headlines'));
    }
    public function store(StoreRequest $request)
    {
        $orginal_path = Storage::putFile('private', $request->file('source'));
        $demo_path = Storage::putFile('demo', $request->file('demo'));
        $thumbnail_path = Storage::putFile('thumbnail', $request->file('thumbnail'));
    
        $videos_create = Video::create([
            'title' => $request['title'],
            'headline_id' => $request['headline_id'],
            'price' => $request['price'],
            'thumbnail_url' => $thumbnail_path,
            'demo_url' => $demo_path,
            'source_url' => $orginal_path,
            'description'=> $request['description'],  
        ]);
    
        if (!$videos_create) {
            return back()->with('failed', 'ویدئو مورد نظر ایجاد نشد ');
        }
    
        return back()->with('success', 'ویدئو مورد نظر با موفقیت ایجاد شد ');
    }
}
