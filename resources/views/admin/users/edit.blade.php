@extends('layouts.admin.master')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">
                        <a class="nav-link drawer" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                             ویرایش/{{ $user->name}}
                        <a class="btn btn-primary float-left text-white py-2 px-4" href="{{ route('admin.users.all') }}">بازگشت به صفحه کاربران</a>
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
            @include('errors.message')
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card card-defualt">
                            <!-- form start -->
                            <form action="{{ route('admin.users.update',$user->id) }}" method="post">
                            @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>نام و نام خانوادگی</label>
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ایمیل</label>
                                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>موبایل</label>
                                                <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>نقش کاربری</label>
                                                <select class="form-control" name="role">
                                                    <option name="Admin" value="Admin">مدیر</option>
                                                    <option  name="Teacher" value="Teacher">مدرس</option>
                                                    <option name='Normal' value="Normal">کاربر عادی</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-left">ذخیره کردن</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
  