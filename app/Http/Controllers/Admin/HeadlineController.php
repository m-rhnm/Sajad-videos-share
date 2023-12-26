<?php

namespace App\Http\Controllers\Admin;

use App\Models\Headline;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\headlines\StoreRequest;
use App\Http\Requests\headlines\UpdateRequest;

class HeadlineController extends Controller
{

    public function __construct( public Request $request)
    {

    }

    public function all()
    {
      $headlines = Headline::paginate(5);
      return view('admin.headlines.all' ,compact('headlines'));
    }
   public function create()
   {
     return view('admin.headlines.create');
   }
   public function store(StoreRequest $request)
   {
    $validate_data = $request->validated();
    $createdHeadline = Headline::create([
      'title' => $validate_data['title'],
      'slug' => $validate_data['slug']
    ]);
    if(!$createdHeadline){
      return back()->with('failed','سر فصل مورد نظر ایجاد نشد ');
    }
    return back()->with('success','سر فصل مورد نظر با موفقیت ایجاد شد ');
    
   }
   public function edit($headline_id)
   {
      $headline =Headline::find($headline_id);
      return view('admin.headlines.edit',compact('headline'));
   }
   public function update($headline_id , UpdateRequest $request)
   {
      $vlidation_data = $request->validated();
      $correctHeadline = Headline::find($headline_id);
      $updatedHeadline = $correctHeadline->update([
        'title' => $vlidation_data['title'],
        'slug' => $vlidation_data['slug'],
      ]);
      if(!$updatedHeadline)
      {
        return back()->with('failed','سر فصل مورد نظر ویرایش نشد ');
      }
      return back()->with('success','سر فصل مورد نظر با موفقیت ویرایش شد ');
      
   }
   public function remove($headline_id)
   {
      $headline = Headline::find($headline_id);
      $romoveHeadline =$headline->delete();
      if(!$romoveHeadline)
      {
        return back()->with('failed','سر فصل مورد نظر حذف نشد ');
      }
        return back()->with('success','سر فصل مورد نظر با موفقیت حذف شد ');
   }

}
