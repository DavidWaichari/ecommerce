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
                        <h3 class="card-title">Add Category</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/categories') }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Add Category</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('admin.categories.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Enter Name" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" readonly>{{ old('description', $category->description) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status" disabled>
                                                <option value="active" {{ $category->status === 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $category->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
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
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="{{route('admin.categories.edit', $category->slug)}}" class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Category Icon</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 text-center">
                                        @if ($category->icon)
                                        <i class="fa fa-{{$category->icon}}" aria-hidden="true"></i>
                                        @else
                                        <h3>No Icon Available</h3>
                                        @endif
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
                            <h5 class="modal-title" id="modal-default-label">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete the category "{{ $category->name }}"? This will delete all the corresponding sub categories, products and their transanctions</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/admin/categories/{{ $category->slug }}" method="POST">
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
