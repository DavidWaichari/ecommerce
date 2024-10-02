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
                        <h3 class="card-title">Product Details</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/products') }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Product Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="POST" autocomplete="off">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="d-flex flex-column align-items-start">
                                                <label for="categorySelect">Select Category</label>
                                                <select class="select2 form-control" id="categorySelect" name="category_id" disabled>
                                                    <option value="" disabled>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex flex-column align-items-start">
                                                <label for="brandSelect">Select Brand</label>
                                                <select class="select2 form-control" id="brandSelect" name="brand_id" disabled>
                                                    <option value="" disabled>Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter Name" required readonly>
                                        </div>

                                        <!-- Part Number -->
                                        <div class="form-group">
                                            <label for="name">Part Number</label>
                                            <input type="text" class="form-control" id="part_number" name="part_number" placeholder="Enter part number"  value="{{ $product->part_number }}" readonly>
                                        </div>
                                        <!-- Series Input -->
                                        <div class="form-group">
                                            <label for="name">Series</label>
                                            <input type="text" class="form-control" id="series" name="series" placeholder="Enter series" value="{{ $product->series }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="Enter selling price" step="0.01"  value="{{ $product->selling_price }}" readonly>
                                        </div>
                                         <!-- Discount Price -->
                                    <div class="form-group">
                                        <label for="discount_price">Discount Selling Price</label>
                                        <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="Enter discount price" step="0.01" required value="{{ $product->discount_price }}" readonly>
                                    </div>
                                    <!-- Description Input -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description" readonly>{{ $product->description }}</textarea>
                                    </div>
                                     <!-- Link -->
                                     <div class="form-group">
                                        <label for="link">Link</label>
                                        <textarea class="form-control" id="link" name="link" placeholder="Enter link" readonly>{{ $product->link }}</textarea>
                                    </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status" disabled>
                                                <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="condition">Condition</label>
                                            <select class="form-control" id="condition" name="condition" disabled>
                                                <option value="New" {{ $product->condition == 'New' ? 'selected' : '' }}>New</option>
                                                <option value="Used" {{ $product->condition == 'Used' ? 'selected' : '' }}>Used</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="{{route('admin.products.edit', $product->slug)}}" class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Description</h4>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Featured Image</h4>
                                </div>
                                <div class="card-body text-center">
                                    @if ($product->featured_image_url)
                                        <img src="{{$product->featured_image_url}}" class="img-fluid" alt="Featured Image">
                                    @else
                                        <p>No featured image available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Other Images</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-wrap">
                                        @foreach($product->images_urls as $image)
                                            <div class="p-2">
                                                <img src="{{$image}}" class="img-fluid" alt="Image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-default-label">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete the product "{{ $product->name }}"? This will delete all the corresponding transactions.</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/admin/products/{{ $product->slug }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
