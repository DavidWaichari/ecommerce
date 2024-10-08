@extends('layouts/app')
@section('content')
 <!-- section-->
 <div class="mt-4">
    <div class="container">
       <!-- row -->
       <div class="row">
          <!-- col -->
          <div class="col-12">
             <!-- breadcrumb -->
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                   <li class="breadcrumb-item"><a href="/">Home</a></li>
                   <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <!-- section -->
 <section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
       <!-- row -->
       <div class="row">
          <div class="col-12">
             <!-- card -->
             <div class="card py-1 border-0 mb-8">
                <div>
                   <h1 class="fw-bold">Shop Cart</h1>
                   <p class="mb-0">Shopping in 382480</p>
                </div>
             </div>
          </div>
       </div>
       <!-- row -->
       <div class="row">
          <div class="col-lg-8 col-md-7">
            <form method="POST" action="/cart/update/multiple">
                @csrf
             <div class="py-3">
                {{-- <!-- alert -->
                <div class="alert alert-danger p-2" role="alert">
                   You’ve got FREE delivery. Start
                   <a href="#!" class="alert-link">checkout now!</a>
                </div> --}}
                <ul class="list-group list-group-flush">
                   <!-- list group -->
                   @foreach ($cart_items as $product)
                    <li class="list-group-item py-3 ps-0 border-top">
                        <!-- row -->
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6 col-lg-7">
                                <div class="d-flex">
                                <img src="{{$product['featured_image_url']}}" alt="Ecommerce" class="icon-shape icon-xxl">
                                <div class="ms-3">
                                    <!-- title -->
                                    <a href="{{route('product.details', $product['slug'])}}" class="text-inherit">
                                        <h6 class="mb-0">{{$product['name']}}</h6>
                                    </a>
                                    <span><small class="text-muted">{{$product['discount_price']}} / item</small></span>
                                    <!-- text -->
                                    <div class="mt-2 small lh-1">
                                        <a href="/cart/remove/{{$product['id']}}" class="text-decoration-none text-inherit">
                                            <span class="me-1 align-text-bottom">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-success">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            </span>
                                            <span class="text-muted">Remove</span>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- input group -->
                            <div class="col-4 col-md-4 col-lg-3">
                                <!-- input -->
                                <!-- input -->
                                <div class="input-group input-spinner">
                                <input type="text" name="product_ids[]" value="{{$product['id']}}" hidden>
                                <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity">
                                <input type="number" step="1"  value="{{$product['quantity']}}" name="quantities[]" class="quantity-field form-control-sm form-input">
                                <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity">
                                </div>
                            </div>
                            <!-- price -->
                            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                <span class="fw-bold">KES {{$product['total']}}</span>
                            </div>
                        </div>
                    </li>
                   @endforeach
                <!-- btn -->
                <div class="d-flex justify-content-between mt-4">
                   <a href="/" class="btn btn-primary">Continue Shopping</a>
                   <button type="submit" class="btn btn-dark">Update Cart</button>
                </div>
            </form>
             </div>
          </div>

          <!-- sidebar -->
          <div class="col-12 col-lg-4 col-md-5">
             <!-- card -->
             <div class="mb-5 card mt-6">
                <div class="card-body p-6">
                   <!-- heading -->
                   <h2 class="h5 mb-4">Summary</h2>
                   <div class="card mb-2">
                      <!-- list group -->
                      <ul class="list-group list-group-flush">
                         <!-- list group item -->
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                               <div>Item Subtotal</div>
                            </div>
                            <span>KES {{$cart_items->sum('total')}}</span>
                         </li>

                         <!-- list group item -->
                         {{-- <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                               <div>Tax VAT(16%)</div>
                            </div>
                            <span>KES {{0.16 * $cart_items->sum('total')}}</span>
                         </li> --}}
                         <!-- list group item -->
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                               <div class="fw-bold">Total</div>
                            </div>
                            {{-- <span class="fw-bold">KES {{(0.16 * $cart_items->sum('total')) +  $cart_items->sum('total')}}</span> --}}
                            <span class="fw-bold">KES {{$cart_items->sum('total')}}</span>
                         </li>
                      </ul>
                   </div>
                   <div class="d-grid mb-1 mt-4">
                      <!-- btn -->
                      <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg d-flex justify-content-between align-items-center">
                         Go to Checkout
                         <span class="fw-bold">KES {{(0.16 * $cart_items->sum('total')) +  $cart_items->sum('total')}}</span>
                      </a>
                   </div>
                   <!-- text -->
                   <p>
                      <small>
                         By placing your order, you agree to be bound by the Freshcart
                         <a href="#!">Terms of Service</a>
                         and
                         <a href="#!">Privacy Policy.</a>
                      </small>
                   </p>

                   <!-- heading -->
                   {{-- <div class="mt-8">
                      <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                      <form>
                         <div class="mb-2">
                            <!-- input -->
                            <label for="giftcard" class="form-label sr-only">Email address</label>
                            <input type="text" class="form-control" id="giftcard" placeholder="Promo or Gift Card">
                         </div>
                         <!-- btn -->
                         <div class="d-grid"><button type="submit" class="btn btn-outline-dark mb-1">Redeem</button></div>
                         <p class="text-muted mb-0"><small>Terms &amp; Conditions apply</small></p>
                      </form>
                   </div> --}}
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
@section('scripts')
<script>
    // Handle the minus button click
    $('.button-minus').click(function (e) {
        e.preventDefault();

        // Find the associated quantity input field
        var input = $(this).closest('.input-spinner').find('.quantity-field');
        var currentVal = parseInt(input.val());

        // Decrease the quantity but ensure it's at least 1
        if (currentVal > 1) {
            input.val(currentVal - 1);
        }
    });

    // Handle the plus button click
    $('.button-plus').click(function (e) {
        e.preventDefault();

        // Find the associated quantity input field
        var input = $(this).closest('.input-spinner').find('.quantity-field');
        var currentVal = parseInt(input.val());

        // Increase the quantity
        input.val(currentVal + 1);
    });
</script>
@endsection
