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
                        <h3 class="card-title">Edit Product</h3>
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
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <!-- Category Select -->
                                    <div class="form-group">
                                        <div class="d-flex flex-column align-items-start">
                                            <label for="categorySelect">Select Category</label>
                                            <select class="select2 form-control" id="categorySelect" name="category_id">
                                                <option value="" disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <!-- Brand -->
                                     <div class="form-group">
                                        <div class="d-flex flex-column align-items-start">
                                            <label for="brandSelect">Select Brand</label>
                                            <select class="select2 form-control" id="brandSelect" name="brand_id" required>
                                                <option value="" selected="selected">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <!-- Processor -->
                                     <div class="form-group">
                                        <div class="d-flex flex-column align-items-start">
                                            <label for="processorSelect">Select Processor</label>
                                            <select class="select2 form-control" id="processorSelect" name="processor_id" required>
                                                <option value="" selected="selected">Select Processor</option>
                                                @foreach ($processors as $processor)
                                                    <option value="{{ $processor->id }}" {{ $product->processor_id == $processor->id ? 'selected' : '' }}>
                                                        {{ $processor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Name Input -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter Name" required>
                                    </div>
                                    <!-- Part Number -->
                                    <div class="form-group">
                                        <label for="name">Part Number</label>
                                        <input type="text" class="form-control" id="part_number" name="part_number" placeholder="Enter part number"  value="{{ $product->part_number }}">
                                    </div>
                                    <!-- Series Input -->
                                    <div class="form-group">
                                        <label for="name">Series</label>
                                        <input type="text" class="form-control" id="series" name="series" placeholder="Enter series" value="{{ $product->series }}">
                                    </div>
                                    <!-- Selling Price -->
                                    <div class="form-group">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="Enter selling price" step="0.01" value="{{ $product->selling_price }}" required>
                                    </div>

                                    <!-- Discount Price -->
                                    <div class="form-group">
                                        <label for="discount_price">Discount Selling Price</label>
                                        <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="Enter discount price" step="0.01" value="{{ $product->discount_price }}" required>
                                    </div>

                                    <!-- Description Input -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description">{{ $product->description }}</textarea>
                                    </div>
                                     <!-- Link -->
                                     <div class="form-group">
                                        <label for="link">Link</label>
                                        <textarea class="form-control" id="link" name="link" placeholder="Enter link">{{ $product->link }}</textarea>
                                    </div>
                                    <!-- Status Select -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Featured Image Input -->
                                    <div class="form-group">
                                        <label for="featured_image">Featured Image</label>
                                        <input type="file" class="form-control-file" id="featured_image" name="featured_image" accept="image/*">
                                        @if ($product->featured_image)
                                            <img src="{{ asset('uploads/featured_images/' . $product->featured_image) }}" alt="Featured Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                                        @endif
                                    </div>

                                    <!-- Additional Images Input -->
                                    <div class="form-group">
                                        <label for="images">Additional Images</label>
                                        <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple>
                                        @if ($product->images)
                                            <div class="mt-2">
                                                @foreach (json_decode($product->images) as $image)
                                                    <img src="{{ asset('uploads/images/' . $image) }}" alt="Additional Image" class="img-thumbnail" style="max-width: 150px; margin-right: 5px;">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Featured Status Checkbox -->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" {{ $product->is_featured ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">Featured</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
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
