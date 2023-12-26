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
                سرفصل ها
                <a class="btn btn-primary float-left text-white py-2 px-4" href="{{ route('headlines.create') }}">افزودن سرفصل جدید</a>
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
                          <h3 class="card-title">لیست سرفصل ها</h3>

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
                                  <th>نامک</th>
                                  <th>عنوان</th>
                                  <th>تاریخ ایجاد</th>
                                  <th>عملیات</th>
                                </tr>
                                @foreach ($headlines as $headline)
                                <tr>
                                    <td>{{ $headline->id }}</td>
                                    <td>{{ $headline->slug }}</td>
                                    <td>{{ $headline->title }}</td>
                                    <td>{{ $headline->created_at }}</td>
                                    <td>
                                        <a href="{{ route('headlines.edit',$headline->id) }}" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('headlines.remove',$headline->id) }}" method="post" style="display: inline">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-default btn-icons"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach                               
                              </tbody>
                            </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="d-flex justify-content-center">
                      <ul class="pagination mt-3">
                            {{-- Previous Page Link --}}
                            @if ($headlines->onFirstPage())
                                <span>&laquo;</span>
                            @else
                                <a href="{{ $headlines->previousPageUrl() }}" rel="prev">&laquo;</a>
                            @endif
                        
                            {{-- Page numbering --}}
                            @for ($i = 1; $i <= $headlines->lastPage(); $i++)
                                <a href="{{ $headlines->url($i) }}">{{ $i }}</a>
                            @endfor
                        
                            {{-- Next Page Link --}}
                            @if ($headlines->hasMorePages())
                                <a href="{{ $headlines->nextPageUrl() }}" rel="next">&raquo;</a>
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
 