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
                        <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">Order Details</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/orders') }}" type="button"
                                class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- row -->

                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-12 mb-5">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <div class="card-body p-6">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <h2 class="mb-0">Order ID: #{{ $order->id }}</h2>
                                            <span
                                                class="badge bg-light-warning text-dark-warning ms-2">{{ $order->status }}</span>
                                        </div>
                                        <!-- select option -->
                                        <div class="d-md-flex ">
                                            {{-- <div class="mb-2 mb-md-0">
                                  <select class="form-control">
                                     <option selected>Status</option>
                                     <option value="Success">Success</option>
                                     <option value="Pending">Pending</option>
                                     <option value="Cancel">Cancel</option>
                                  </select>
                               </div>
                               <!-- button -->
                               <div class="ms-md-3">
                                  <a href="#" class="btn btn-primary">Save</a>
                                  <a href="#" class="btn btn-secondary">Download Invoice</a>
                               </div> --}}
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="row">
                                            <!-- address -->
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Customer Details</h6>
                                                    <p class="mb-1 lh-lg">
                                                        {{ $order->user->full_name }}
                                                        <br />
                                                        {{ $order->user->email }}
                                                        <br />
                                                        {{ $order->user->phone_number }}
                                                    </p>
                                                    {{-- <a href="#">View Profile</a> --}}
                                                </div>
                                            </div>
                                            <!-- address -->
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Shipping Address</h6>
                                                    <p class="mb-1 lh-lg">
                                                        {{ $order->user->county }} County
                                                        <br />
                                                        {{ $order->user->city }}, Suite Ave.
                                                        <br />
                                                        Customer No. {{ $order->user->phone_number }}
                                                        <br />
                                                        Shipping Contact No. {{ $order->contact_number }}
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- address -->
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Order Details</h6>
                                                    <p class="mb-1 lh-lg">
                                                        Order ID:
                                                        <span class="text-dark">{{ $order->id }}</span>
                                                        <br />
                                                        Order Date:
                                                        <span class="text-dark">
                                                            {{ $order->created_at->format('M d, Y h:i A') }}</span>
                                                        <br />
                                                        Order Total:
                                                        <span class="text-dark">{{ $order->total_amount }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <!-- Table -->
                                            <table class="table mb-0 text-nowrap table-centered">
                                                <!-- Table Head -->
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Products</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <!-- tbody -->
                                                <tbody>
                                                    @foreach ($order->items as $item)
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-inherit">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <img src="../assets/images/products/product-img-1.jpg"
                                                                                alt="" class="icon-shape icon-lg" />
                                                                        </div>
                                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                                            <h5 class="mb-0 h6">{{ $item->product->name }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <td><span class="text-body">KES {{ $item->unit_price }}</span>
                                                            </td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>KES {{ $item->total_amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="border-bottom-0 pb-0"></td>
                                                        <td class="border-bottom-0 pb-0"></td>
                                                        <td colspan="1" class="fw-medium text-dark">
                                                            <!-- text -->
                                                            Sub Total :
                                                        </td>
                                                        <td class="fw-medium text-dark">
                                                            <!-- text -->
                                                            KES {{$order->items->sum('total_amount')}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0 pb-0"></td>
                                                        <td class="border-bottom-0 pb-0"></td>
                                                        <td colspan="1" class="fw-medium text-dark">
                                                            <!-- text -->
                                                            Shipping Cost
                                                        </td>
                                                        <td class="fw-medium text-dark">
                                                            <!-- text -->
                                                            KES {{$order->shipping_cost}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0 pb-0"></td>
                                                        <td class="border-bottom-0 pb-0"></td>
                                                        <td colspan="1" class="fw-medium text-dark">
                                                            <!-- text -->
                                                            Tax VAT(16%)
                                                        </td>
                                                        <td class="fw-medium text-dark">
                                                            <!-- text -->
                                                            KES {{$order->tax_amount}}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="1" class="fw-semibold text-dark">
                                                            <!-- text -->
                                                            Grand Total
                                                        </td>
                                                        <td class="fw-semibold text-dark">
                                                            <!-- text -->
                                                            KES {{$order->total_amount}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-4 mb-lg-0">
                                            <h6>Payment Method</h6>
                                            <span>{{ $order->payment_method }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Delivery Instructions</h5>
                                            <textarea class="form-control mb-3" rows="3" disabled>{{ $order->delivery_instructions }}</textarea>
                                            <!-- Push the button to the right using flexbox -->
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="btn btn-danger">Reject order</a>
                                                <a href="#" class="btn btn-warning">Approve order</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@endsection
