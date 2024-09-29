@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                        <h3 class="card-title">Edit Category</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/categories') }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description">{{ old('description', $category->description) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active" {{ $category->status === 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $category->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Font Awesome Web Icon e.g desktop</label>
                                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Font awesome icon e.g. desktop" value="{{ old('icon', $category->icon) }}">
                                    </div>
                                   <!-- Has Processor Checkbox -->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="hidden" name="has_processor" value="0">
                                            <input type="checkbox" class="form-check-input" id="has_processor" name="has_processor"
                                                 {{ old('has_processor', $category->has_processor) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="has_processor">Has Processor</label>
                                        </div>
                                    </div>

                                    <!-- Featured Image Input -->
                                    <div class="form-group">
                                        <label for="featured_image">Featured Image</label>
                                        <input type="file" class="form-control-file" id="featured_image" name="featured_image" accept="image/*">
                                        @if ($category->featured_image_url)
                                            <img src="{{ asset($category->featured_image_url) }}" alt="Featured Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                                        @endif
                                    </div>

                                    <!-- Additional Images Input -->
                                    <div class="form-group">
                                        <label for="images">Additional Images</label>
                                        <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple>
                                        @if ($category->images)
                                            <div class="mt-2">
                                                @foreach ($category->images_urls as $image)
                                                    <img src="{{ asset($image) }}" alt="Additional Image" class="img-thumbnail" style="max-width: 150px; margin-right: 5px;">
                                                @endforeach
                                            </div>
                                        @endif
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
