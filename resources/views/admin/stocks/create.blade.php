@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stock</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Stock</li>
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
                        <h3 class="card-title">Add Stock Item</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/stocks') }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Stock Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.stocks.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <!-- Validation Errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <!-- Supplier Select -->
                                    <div class="form-group">
                                        <label for="supplierSelect">Select Supplier</label>
                                        <select class="select2 form-control" id="supplierSelect" name="supplier_id">
                                            <option value="" selected="selected">Select supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Product Select -->
                                    <div class="form-group">
                                        <label for="productSelect">Select Product</label>
                                        <select class="select2 form-control" id="productSelect" name="product_id" required>
                                            <option value="" selected="selected">Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Stock Date -->
                                    <div class="form-group">
                                        <label for="stock_date">Stock Date</label>
                                        <input type="date" class="form-control" id="stock_date" name="stock_date">
                                    </div>

                                    <!-- Number of Items -->
                                    <div class="form-group">
                                        <label for="no_of_items">Number of Items</label>
                                        <input type="number" class="form-control" id="no_of_items" name="no_of_items" placeholder="Enter number of items" required>
                                    </div>

                                    <!-- Total Amount -->
                                    <div class="form-group">
                                        <label for="total_amount">Total Amount</label>
                                        <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Enter total amount" step="0.01" required>
                                    </div>

                                    <!-- Unit Buying Price -->
                                    <div class="form-group">
                                        <label for="unit_bp">Unit Buying Price (BP)</label>
                                        <input type="number" class="form-control" id="unit_bp" name="unit_bp" placeholder="Enter unit buying price" step="0.01" required readonly>
                                    </div>

                                    <!-- Unit Selling Price -->
                                    <div class="form-group">
                                        <label for="unit_sp">Unit Selling Price (SP)</label>
                                        <input type="number" class="form-control" id="unit_sp" name="unit_sp" placeholder="Enter unit selling price" step="0.01" required>
                                    </div>

                                    <!-- Receipt -->
                                    <div class="form-group">
                                        <label for="receipt">Receipt</label>
                                        <input type="file" class="form-control-file" id="receipt" name="receipt" accept="image/*">
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

        // Calculate and update the unit buying price (unit_bp) when total amount or no_of_items changes
        $('#total_amount, #no_of_items').on('input', function() {
            var totalAmount = parseFloat($('#total_amount').val()) || 0;
            var noOfItems = parseFloat($('#no_of_items').val()) || 0;

            if (noOfItems > 0) {
                var unitBp = (totalAmount / noOfItems).toFixed(2);
                $('#unit_bp').val(unitBp);
            } else {
                $('#unit_bp').val(0); // Reset unit buying price if no_of_items is invalid or zero
            }
        });
    });
</script>
@endsection
