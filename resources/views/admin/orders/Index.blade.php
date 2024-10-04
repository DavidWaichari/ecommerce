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
                        <h3 class="card-title">Orders List</h3>
                        <div class="col-md-2">
                            <a href="{{route('admin.orders.create')}}" type="button" class="btn btn-sm btn-info">Add Order</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Products</th>
                                    <th>Sub-Total</th>
                                    <th>Tax(VAT - 16%)</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Customer</th>
                                    <th>Actions</th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="align-middle border-top-0 w-0">
                                   {{$loop->index + 1}}
                                    </td>
                                    <td class="align-middle border-top-0">
                                   {{$order->id}}
                                    </td>
                                    <td class="align-middle border-top-0">
                                        @foreach ($order->items as $item)
                                        <p><a href="/admin/products/{{$item->product->slug}}" class="text-inherit">{{$item->quantity}} {{$item->product->name}} @ {{$item->price}}</a></p>
                                        @endforeach
                                    </td>
                                    <td class="align-middle border-top-0">{{$order->sub_total}}</td>
                                    <td class="align-middle border-top-0">{{$order->tax_amount}}</td>
                                    <td class="align-middle border-top-0">{{$order->total_amount}}</td>
                                    <td class="align-middle border-top-0">   {{$order->created_at->format('M d, Y h:i A')}}</td>
                                    <td class="align-middle border-top-0">
                                        <span class="badge bg-warning">{{$order->status}}</span>
                                    </td>
                                    <td class="align-middle border-top-0">
                                        @if ($order->user)
                                        <span">{{$order->user->full_name}}</span>
                                        @else
                                        <span">No user</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="/admin/orders/{{ $order->id }}/edit" class="btn btn-sm btn-primary">Edit</a> --}}
                                        <a href="/admin/orders/{{ $order->id }}/details" class="btn btn-sm btn-info">Details</a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default-{{ $order->id }}">Delete</button>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Products</th>
                                        <th>Sub-Total</th>
                                        <th>Tax(VAT - 16%)</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Customer</th>
                                        <th>Actions</th>
                                     </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @foreach ($orders as $order)
                        <div class="modal fade" id="modal-default-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label-{{ $order->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-default-label-{{ $order->id }}">Delete order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the order "{{ $order->name }}"? This will delete all the corresponding sub orders, products and their transanctions</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/admin/orders/{{ $order->slug }}" method="POST">
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

