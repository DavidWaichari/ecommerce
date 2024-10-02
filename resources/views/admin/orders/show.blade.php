@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">Order Details</h3>
                        <div class="col-md-1">
                            <a href="{{ url('/admin/orders') }}" class="btn btn-block btn-info btn-md">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Order Details -->
                    <div class="row">
                        <div class="col-xl-12 col-12 mb-5">
                            <div class="card h-100 card-lg">
                                <div class="card-body p-6">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <h2 class="mb-0">Order ID: #{{ $order->id }}</h2>
                                            <span class="badge bg-light-warning text-dark-warning ms-2">{{ $order->status }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Customer Details</h6>
                                                    <p class="mb-1 lh-lg">
                                                        {{ $order->user->full_name }}<br>
                                                        {{ $order->user->email }}<br>
                                                        {{ $order->user->phone_number }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Shipping Address</h6>
                                                    <p class="mb-1 lh-lg">
                                                        {{ $order->user->county }} County<br>
                                                        {{ $order->user->city }}, Suite Ave.<br>
                                                        Customer No. {{ $order->user->phone_number }}<br>
                                                        Shipping Contact No. {{ $order->contact_number }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Order Details</h6>
                                                    <p class="mb-1 lh-lg">
                                                        Order Date: <span class="text-dark">{{ $order->created_at->format('M d, Y h:i A') }}</span><br>
                                                        Order Total: <span class="text-dark">{{ $order->total_amount }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table mb-0 text-nowrap table-centered">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>Products</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->items as $item)
                                                            <tr>
                                                                <td>{{ $item->product->name }}</td>
                                                                <td>KES {{ $item->unit_price }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>KES {{ $item->total_amount }}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="3" class="fw-medium text-dark">Sub Total:</td>
                                                            <td class="fw-medium text-dark">KES {{ $order->items->sum('total_amount') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="fw-medium text-dark">Shipping Cost:</td>
                                                            <td class="fw-medium text-dark">KES {{ $order->shipping_cost }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="fw-medium text-dark">Tax VAT(16%):</td>
                                                            <td class="fw-medium text-dark">KES {{ $order->tax_amount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="fw-semibold text-dark">Grand Total:</td>
                                                            <td class="fw-semibold text-dark">KES {{ $order->total_amount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Payment Method</h6>
                                            <span>{{ $order->payment_method }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Delivery Instructions</h5>
                                            <textarea class="form-control mb-3" rows="3" disabled>{{ $order->delivery_instructions }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Approve, Reject, Delete Buttons with Modals -->
                                    <div class="row">
                                        @can('approve-order')
                                            <div class="col-md-4 text-center">
                                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#approveOrderModal">Approve Order</a>
                                            </div>
                                        @endcan
                                        @can('reject-order')
                                            <div class="col-md-4 text-center">
                                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#rejectOrderModal">Reject Order</a>
                                            </div>
                                        @endcan
                                        @can('delete-order')
                                            <div class="col-md-4 text-center">
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteOrderModal">Delete Order</a>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>

    <!-- Approve Order Modal -->
    <div class="modal fade" id="approveOrderModal" tabindex="-1" aria-labelledby="approveOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveOrderModalLabel">Approve Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve this order?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Order Modal -->
    <div class="modal fade" id="rejectOrderModal" tabindex="-1" aria-labelledby="rejectOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectOrderModalLabel">Reject Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to reject this order?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Order Modal -->
    <div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOrderModalLabel">Delete Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this order? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
