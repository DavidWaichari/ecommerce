@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Add Product</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/products') }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.products.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- Category Select -->
                                    <div class="form-group">
                                        <div class="d-flex flex-column align-items-start">
                                            <label for="categorySelect">Select Category</label>
                                            <select class="select2 form-control" id="categorySelect" name="category_id">
                                                <option value="" selected="selected">Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Sub Category Select -->
                                    <div class="form-group">
                                        <div class="d-flex flex-column align-items-start">
                                            <label for="subCategorySelect">Select Sub Category</label>
                                            <select class="select2 form-control" id="subCategorySelect" name="sub_category_id">
                                                <option value="" selected="selected">Select Sub Category</option>
                                                @foreach ($sub_categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Name Input -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                    </div>

                                    <!-- Description Input -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                                    </div>

                                    <!-- Status Select -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="Active" selected>Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Featured Image Input -->
                                    <div class="form-group">
                                        <label for="featured_image">Featured Image</label>
                                        <input type="file" class="form-control-file" id="featured_image" name="featured_image" accept="image/*" required>
                                    </div>

                                    <!-- Images Input -->
                                    <div class="form-group">
                                        <label for="images">Additional Images</label>
                                        <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple>
                                    </div>
                                    <!-- Featured Status Checkbox -->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured">
                                            <label class="form-check-label" for="is_featured">Featured</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Initialize Select2 Elements
        $('.select2').select2();

        // Initialize Select2 Elements with Bootstrap4 theme
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@endsection
