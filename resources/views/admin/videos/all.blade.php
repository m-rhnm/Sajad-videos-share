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
                ویدئوها
                <a class="btn btn-primary float-left text-white py-2 px-4" href="products-add.php">افزودن ویدئو جدید</a>
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">لیست ویدئوها</h3>

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
                                  <th>ایدی</th>
                                  <th>عنوان</th>
                                  <th>سرفصل</th>
                                  <th>منتشرکننده</th>
                                  <th>توضیحات</th>
                                  <th>لینک دمو</th>
                                  <th>قیمت</th>
                                  <th>تاریخ ایجاد</th>
                                  <th>عملیات</th>
                              </tr>
                              @foreach ($videos as $video)
                              <tr>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->headline->title }}</td>
                                <td>{{ $video->user->name }}</td>
                                <td>{{ $video->description }}</td>
                                <td>
                                    <a href="#" class="btn btn-default btn-icons" title="لینک دمو"><i class="fa fa-link"></i></a>
                                </td>
                                <td>{{ $video->price }} تومان</td>
                                <td>{{ $video->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-default btn-icons" ><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-default btn-icons"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                              @endforeach
                            
                              </tbody></table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                    <div class="d-flex justify-content-center">
                        <ul class="pagination mt-3">
                              {{-- Previous Page Link --}}
                              @if ($videos->onFirstPage())
                                  <span>&laquo;</span>
                              @else
                                  <a href="{{ $videos->previousPageUrl() }}" rel="prev">&laquo;</a>
                              @endif
                          
                              {{-- Page numbering --}}
                              @for ($i = 1; $i <= $videos->lastPage(); $i++)
                                  <a href="{{ $videos->url($i) }}">{{ $i }}</a>
                              @endfor
                          
                              {{-- Next Page Link --}}
                              @if ($videos->hasMorePages())
                                  <a href="{{ $videos->nextPageUrl() }}" rel="next">&raquo;</a>
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
