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
                 ویرایش/{{  $video->title}}
                <a class="btn btn-primary float-left text-white py-2 px-4" href="{{ route('videos.all') }}">بازگشت به صفحه ویدئوها</a>
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
                      <form action="{{ route('videos.update',$video->id) }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>عنوان</label>
                                          <input type="text" class="form-control" name="title" value="{{ $video->title }}">
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>سرفصل</label>
                                          <select class="form-control" name="headline_id">
                                            @foreach ($headlines as $headline)
                                            <option value="{{ $headline->id }}">{{ $headline->title }}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>قیمت</label>
                                          <input type="text" class="form-control" name="price" value="{{ $video->price }}">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>تصویر</label>
                                          <input class="form-control" type="file" name="thumbnail">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>دمو ویدئو</label>
                                          <input class="form-control" type="file" name="demo">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>ویدئو اصلی</label>
                                          <input class="form-control" type="file" name="source">
                                      </div>
                                  </div>

                              </div>
                              <div class="form-group">
                                  <label>توضیحات</label>
                                  <textarea name="description" id="editor" >{{ $video->description }}</textarea>
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



