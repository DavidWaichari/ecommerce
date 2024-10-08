@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stock Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stock Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Stock Overview</h3>
                        <div class="col-md-1">
                            <a href="/admin/stocks" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Stock Details</h3>
                                </div>

                                <!-- Stock Details Form -->
                                <form action="{{ route('admin.stocks.update', $stock->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="supplierSelect">Select Supplier</label>
                                            <select class="select2 form-control" id="supplierSelect" name="supplier_id" required>
                                                <option value="" selected="selected">Select supplier</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" {{ $stock->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                        {{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="stock_date">Stock Date</label>
                                            <input type="date" class="form-control" id="stock_date" name="stock_date" value="{{ $stock->stock_date }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="total_amount">Total Amount</label>
                                            <input type="number" class="form-control" id="total_amount" value="{{ $stock->total_amount }}" placeholder="Enter total amount" step="0.01" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="Unconfirmed" {{ $stock->status == 'Unconfirmed' ? 'selected' : '' }}>Unconfirmed</option>
                                                <option value="Confirmed" {{ $stock->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="receipt">Receipt</label>
                                            <input type="file" class="form-control-file" id="receipt" name="receipt" accept="image/*">
                                            @if ($stock->receipt)
                                                <small><a href="/admin/stocks/{{$stock->id }}/download-receipt">Current receipt: {{ $stock->receipt }}</a></small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="d-flex align-items-center justify-content-between">
                                            @can('update-stock')
                                                <button type="submit" class="btn btn-info">Update</button>
                                            @endcan
                                            @can('delete-stock')
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $stock->id }}">Delete</button>
                                            @endcan
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Stock Items</h3>
                                        <div class="col-md-3">
                                            <a  href="/admin/stocks/create?stock_id={{$stock->id}}" type="button" class="btn btn-block btn-primary btn-md">Add Item</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>No. of Items</th>
                                                <th>Unit SP</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stockItems as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $item->no_of_items }}</td>
                                                    <td>{{ number_format($item->unit_sp, 2) }}</td>
                                                    <td>{{ number_format($item->total_amount, 2) }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <!-- Delete Item Modal -->
                                                <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-label" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modal-delete-label">Delete Stock Item</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this stock item?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{ route('admin.stockItems.destroy', $item->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
