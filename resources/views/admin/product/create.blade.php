@extends('admin.master')

@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Product</li>
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
          <h3 class="card-title">Product Entry</h3>

          <div class="card-tools">
            <a type="button" href="{{url('/products')}}" class="btn btn-primary btn-xs" >
              <i class="fas fa-plus"></i> List
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
            <form action="{{url('/create-products')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product Brand</label>
                    <select class="form-control" name="brand_id">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label>Regular Price</label>
                    <input type="text" class="form-control" name="regular_price" placeholder="Enter Regular Price">
                  </div>
                  <div class="form-group">
                    <label>Discount Price</label>
                    <input type="text" class="form-control" name="discount_price" placeholder="Enter Discount Price">
                  </div>
                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea id="summernote" class="form-control" name="product_description" placeholder="Enter Product Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product Tags</label>
                    <textarea class="form-control" name="tags" placeholder="Enter Product Tags"></textarea>
                  </div>
                  <div class="input_fields_wrap">
                    <button class="add_field_button">Add More Fields</button>
                    <div>
                      <input type="text" name="mytext[1]">
                      <input type="date" name="mydate[1]">
                      <select name="myselect[1]"><option>Please Select</option></select>
                  </div>
                </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  <script>
      $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div> <input type="text" name="mytext[' + x + ']"/> <input type="date" name="mydate[' + x + ']"/> <select name="myselect[' + x + ']"><option>Please Select</option></select> <a href="#" class="remove_field">Remove</a> </div>'); // add input boxes.
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
      </script>
@endsection
