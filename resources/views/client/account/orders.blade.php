@extends('layouts/app')
@section('content')
<!-- section -->
<section>
    <div class="container">
       <!-- row -->
       <div class="row">
          <!-- col -->
          <div class="col-12">
             <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                <!-- heading -->
                <h3 class="fs-5 mb-0">Account Setting</h3>
                <!-- button -->
                <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                   <i class="bi bi-text-indent-left fs-3"></i>
                </button>
             </div>
          </div>
          <!-- col -->
          <div class="col-lg-3 col-md-4 col-12 border-end d-none d-md-block">
             <div class="pt-10 pe-lg-10">
                <!-- nav -->
                @include('client/account/sidebar')
             </div>
          </div>
          <div class="col-lg-9 col-md-8 col-12">
             <div class="py-6 p-md-6 p-lg-10">
                <!-- heading -->
                <h2 class="mb-6">Your Orders</h2>

                <div class="table-responsive-xxl border-0">
                   <!-- Table -->
                   <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                      <!-- Table Head -->
                      <thead class="bg-light">
                         <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Products</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                         </tr>
                      </thead>
                      <tbody>
                         <!-- Table body -->
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
                                    <a href="{{route('product.details', $item->product->slug)}}" class="text-inherit">{{$item->quantity}} {{$item->product->name}} @ {{$item->price}}</a> <hr>
                                    @endforeach
                                </td>
                                <td class="align-middle border-top-0">{{$order->total_amount}}</td>
                                <td class="align-middle border-top-0">   {{$order->created_at->format('M d, Y h:i A')}}</td>
                                <td class="align-middle border-top-0">
                                <span class="badge bg-warning">{{$order->status}}</span>
                                </td>
                            </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
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
