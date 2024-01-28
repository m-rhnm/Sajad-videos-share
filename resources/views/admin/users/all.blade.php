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
                کاربران
                <a class="btn btn-primary float-left text-white py-2 px-4" href="{{ route('admin.users.create') }}">افزودن کاربر جدید</a>
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
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">لیست کاربران</h3>

                          <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                  <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="table table-striped table-valign-middle mb-0">
                          <table class="table table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th>آیدی</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>موبایل</th>
                                    <th>نقش کاربری</th>
                                    <th>تاریخ عضویت</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach ($users as $user)
                                  <tr>
                                      <td>{{ $user->id }}</td>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->phone_number }}</td>
                                      <td>{{ $user->role }}</td>
                                      <td>{{ $user->created_at }}</td>
                                      <td>
                                        <form action="{{ route('admin.users.remove', $user->id) }}" method="post">
                                          @method('delete')
                                          @csrf
                                          <button class="btn btn-default btn-icons"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <form action="{{ route('admin.users.edit', $user->id) }}" method="get">
                                          @csrf
                                          <button class="btn btn-default btn-icons"><i class="fa fa-edit"></i></button>
                                        </form>
                                      </td>
                                  </tr>
                                @endforeach
                               
                            </tbody>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                    <div class="d-flex justify-content-center">
                
                        <ul class="pagination mt-3">
                            {{-- Previous Page Link --}}
                            @if ($users->onFirstPage())
                                <span>&laquo;</span>
                            @else
                                <a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a>
                            @endif
                        
                            {{-- Page numbering --}}
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <a href="{{ $users->url($i) }}">{{ $i }}</a>
                            @endfor
                        
                            {{-- Next Page Link --}}
                            @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a>
                            @else
                                <span>&raquo;</span>
                            @endif
                        </ul>
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