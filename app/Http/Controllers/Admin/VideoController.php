<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Headline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\videos\StoreRequest;
use App\Http\Requests\videos\UpdateRequest;
use Symfony\Component\HttpFoundation\File\File;

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
        $demo_path = Storage::putFile('public/demo', $request->file('demo'));
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

    public function remove($videos_id)
    {
       $video = Video::find($videos_id);
       $removeVideo =$video->delete();
       if(!$removeVideo)
       {
         return back()->with('failed',' ویدئو مورد نظر حذف نشد ');
       }
         return back()->with('success','ویدئو  مورد نظر با موفقیت حذف شد ');
    }
    
    public function edit($videos_id)
    {
       $headlines = Headline::all();
       $video = Video::find($videos_id);
       return view('admin.videos.edit',compact('video','headlines'));
    }

    public function update( UpdateRequest $request,$vidoe_id )
    {
      $videos = Video::find($vidoe_id);
    
      //dd($videos);
       if (isset($request['source']) && $request['source'] instanceof File )
        {
          $orginal_path = Storage::putFile('private', $request->file('source'));
        }
        if (isset($request['demo']) && $request['demo'] instanceof File )
        {
          $demo_path = Storage::putFile('demo', $request->file('demo'));
        }
        if(isset($request['thumbnail']) && $request['thumbnail'] instanceof File)
        {
          $thumbnail_path = Storage::putFile('thumbnail', $request->file('thumbnail'));
        }
      $updatedVideos = $videos->update(
      [
        'title' => $request['title'],
        'headline_id' => $request['headline_id'],
        'price' => $request['price'],
        'thumbnail_url' => isset($thumbnail_path) ? $thumbnail_path : $videos->getOriginal('thumbnail_url'),
        'demo_url' => isset($demo_path) ? $demo_path : $videos->getOriginal('demo_url'),
        'source_url' => isset($orginal_path) ? $orginal_path : $videos->getOriginal('source_url'),
        'description'=> $request['description'],  
      ]);

      if ($updatedVideos) {
        return back()->with('success', 'ویدئو مورد نظر با موفقیت ایجاد شد ');
            
        }
        return back()->with('failed', 'ویدئو مورد نظر ایجاد نشد ');
        
    
   }
}




       