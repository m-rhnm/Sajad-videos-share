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
                سرفصل ها / ویرایش {{ $headline->title }}
                <a class="btn btn-primary float-left text-white py-2 px-4" href="{{ route('headlines.all') }}">بازگشت به صفحه سرفصل ها</a>
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
                      <form action="{{ route('headlines.update',$headline->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="headline_id" value="{{ $headline->id }}">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>نامک</label>
                                          <input type="text" class="form-control" name="slug" value="{{ $headline->slug }}">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>عنوان</label>
                                          <input type="text" class="form-control" name="title" value="{{ $headline->title }}">
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



