<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\users\StoreRequest;

class UserController extends Controller
{
    public function all()
    {   $users = User::paginate(5);
        return view('admin.users.all',compact('users'));
    }
    public function create()
    {
        return view('admin.users.add');
    }
    public function store(StoreRequest $request)
    {
        $addedUsers = User::create($request->all());
        if(!$addedUsers)
        {
            return back()->with('failed','کاربر جدید اضافه نشد!!');
        }
        return back()->with('success','کاربر جدید با موفقیت ایجاد شد');

    }
    public function remove($user_id,User $user)
    {
        Video::where('user_id', $user_id)->delete();
        $users = $user->find($user_id);
        $deletedUsers = $users->delete();
        if(!$deletedUsers)
        {
            return back()->with('failed','کاربر  حذف نشد!!');
        }
        return back()->with('success','کاربر با موفقیت حذف شد');

    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.users.edit',compact('user')); 
    }
    public function update($user_id,Request $request)
    {
        $user = User::find($user_id);
        $userUpdated = $user->update($request->all());
        if(!$userUpdated)
        {
            return back()->with('failed',' عملیات ویرایش ناموفق بود !!');
        }
        return back()->with('success','کاربر  با موفقیت ویرایش شد');
    
    }
}
