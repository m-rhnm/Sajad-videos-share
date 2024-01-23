<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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
}
