@extends('admin.master')

@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Brand List</h3>

          <div class="card-tools">
            <a type="button" href="{{url('/create-brands')}}" class="btn btn-primary btn-xs" >
              <i class="fas fa-plus"></i> Create
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Brand Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_description}}</td>
                        <td>
                            <img src="{{$brand->image_path}}" width="200">
                        </td>
                        <td>{{$brand->status == 1 ? 'Active' : 'Inactive'}}</td>
                        <td>{{date('d/m/Y', strtotime($brand->created_at))}}</td>
                        <td>
                        <a href="{{url('edit-brand/'.$brand->id)}}" class="btn btn-xs btn-info">Edit</a>
                        <a href="{{url('delete-brand/'.$brand->id)}}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sl.</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Brand Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
