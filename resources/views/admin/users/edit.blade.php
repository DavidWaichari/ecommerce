@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                        <h3 class="card-title">Edit User</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/users') }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" autocomplete="off">
                                @csrf
                                @method('PUT') <!-- Add this for PUT request -->
                                <div class="card-body">
                                    <!-- Name Input -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->full_name }}" placeholder="Enter Name" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="text" class="form-control" id="name" name="email" value="{{ $user->email }}" placeholder="Enter Name" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone Number</label>
                                        <input type="text" class="form-control" id="name" name="email" value="{{ $user->phone_number }}" placeholder="Enter Name" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_admin">Is Active Admin</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>Roles</h5>
                                    <div class="row">
                                    @foreach ($roles as $role)

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" 
                                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
