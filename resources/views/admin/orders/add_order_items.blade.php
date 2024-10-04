@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
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
                        <h3 class="card-title">Add Order Item</h3>
                        <div class="col-md-1">
                            <a href="{{ route('admin.orders.details', $order->id) }}" type="button" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Order Item</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.orders.addItem') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <div class="card-body">
                                    <!-- Product Select -->
                                    <div class="form-group">
                                        <div class="d-flex flex-column align-items-start">
                                            <label for="productSelect">Select Product</label>
                                            <select class="select2 form-control" id="productSelect" name="product_id" required>
                                                <option value="" selected="selected">Select Product</option>
                                                @foreach ($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}} | S.P {{$product->discount_price}} | {{$product->category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Quantity -->
                                    <div class="form-group">
                                        <label for="quantity">No of Items</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity " step="1" required>
                                    </div>
                                    {{-- <!-- Discount Price -->
                                    <div class="form-group">
                                        <label for="discount_price">Discount Selling Price</label>
                                        <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="Enter discount price" step="0.01" required>
                                    </div> --}}
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
