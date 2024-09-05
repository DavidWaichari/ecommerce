@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Suppliers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Suppliers</li>
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
                        <h3 class="card-title">Suppliers List</h3>
                        <div class="col-md-2">
                            <a href="/admin/suppliers/create" type="button" class="btn btn-block btn-info btn-md">Add Supplier</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="text-center">SNO</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td><a href="{{route('admin.suppliers.show', $supplier->id)}}">{{ $supplier->name }}</a></td>
                                        <td>{{ $supplier->phone_number }}</td>
                                        <td>{{ $supplier->description }}</td>
                                        <td>{{ $supplier->status }}</td>
                                        <td>{{ $supplier->updatedBy->name }}</td>
                                        <td>{{ $supplier->updated_at }}</td>
                                        <td>
                                            <a href="/admin/suppliers/{{ $supplier->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default-{{ $supplier->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">SNO</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @foreach ($suppliers as $supplier)
                        <div class="modal fade" id="modal-default-{{ $supplier->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label-{{ $supplier->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-default-label-{{ $supplier->id }}">Delete Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the supplier "{{ $supplier->name }}"? This will delete all the corresponding transanctions</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/admin/suppliers/{{ $supplier->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
    $(function () {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
@endsection
