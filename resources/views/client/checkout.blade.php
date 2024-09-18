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
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Checkout</li>
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
                <!-- col -->
                <div class="col-12">
                    <div>
                        <div class="mb-8">
                            <!-- text -->
                            <h1 class="fw-bold mb-0">Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-7 col-lg-6 col-md-12">
                        <!-- accordion -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <!-- accordion item -->
                            <div class="accordion-item py-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- heading one -->
                                    <a href="#" class="fs-5 text-inherit collapsed h4">
                                        <i class="feather-icon icon-map-pin me-2 text-muted"></i>
                                        Delivery address
                                    </a>
                                    <!-- btn -->
                                    <a href="#" class="btn btn-outline-primary btn-sm">Update details</a>
                                    <!-- collapse -->
                                </div>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="mt-5">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-md-6 col-12 mb-4">
                                                <!-- form -->
                                                <div class="card card-body p-6">
                                                    <!-- address -->
                                                    <address>
                                                        <strong>{{$user->full_name}}</strong>
                                                        <br>
                                                        {{ $user->address}},
                                                        <br>
                                                        {{$user->county}}
                                                        <br>
                                                        <abbr title="Phone">{{ $user->phone_number }}</abbr>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- accordion item -->
                            <form action="/checkout/process" method="post">
                                @csrf
                                <!-- New Contact Number Field -->
                                <div class="accordion-item py-4">
                                    <a href="#" class="text-inherit h5" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <i class="feather-icon icon-phone me-2 text-muted"></i>
                                        Contact Number
                                        <!-- collapse -->
                                    </a>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-5">
                                            <label for="contactNumber" class="form-label sr-only">Contact Number</label>
                                            <input type="text" class="form-control" id="contactNumber" placeholder="Enter your contact number"
                                                name="contact_number" required value="{{$user->phone_number}}">
                                            <p class="form-text">Provide a contact number where you can be reached.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delivery Instructions -->
                                <div class="accordion-item py-4">
                                    <a href="#" class="text-inherit h5" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>
                                        Delivery instructions
                                        <!-- collapse -->
                                    </a>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-5">
                                            <label for="DeliveryInstructions" class="form-label sr-only">Delivery
                                                instructions</label>
                                            <textarea class="form-control" id="DeliveryInstructions" rows="3" placeholder="Write delivery instructions "
                                                name="delivery_instructions"></textarea>
                                            <p class="form-text">Add instructions for how you want your order shopped and/or
                                                delivered</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment Method -->
                                <div class="accordion-item py-4">
                                    <a href="#" class="text-inherit h5" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">
                                        <i class="feather-icon icon-credit-card me-2 text-muted"></i>
                                        Payment Method
                                        <!-- collapse -->
                                    </a>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-5">
                                            <div>
                                                <!-- card -->
                                                <div class="card card-bordered shadow-none">
                                                    <div class="card-body p-6">
                                                        <!-- check input -->
                                                        <!-- Cash on Delivery Option -->
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_method" id="cashonDelivery"
                                                                    value="Cash" required>
                                                                <label class="form-check-label ms-2"
                                                                    for="cashonDelivery">Cash on Delivery</label>
                                                                    <p class="mb-0 small">Pay with cash when your order is
                                                                        delivered.</p>
                                                            </div>
                                                        </div>
                                                        {{-- <!-- Credit Card Option -->
                                                        <div class="d-flex mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="credit_card">
                                                                <label class="form-check-label ms-2" for="creditCard">Credit Card</label>
                                                            </div>
                                                            <div>
                                                                <!-- title -->
                                                                <h5 class="mb-1 h6">Credit Card</h5>
                                                                <p class="mb-0 small">Pay using your credit or debit card.</p>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!-- Button -->
                                                <div class="mt-5 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary ms-2">Place Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12 offset-xl-1 col-xl-4 col-lg-6">
                        <div class="mt-4 mt-lg-0">
                            <div class="card shadow-sm">
                                <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
                                <ul class="list-group list-group-flush">
                                    <!-- list group item -->
                                    @foreach ($cart_items as $item)
                                        <li class="list-group-item px-4 py-3">
                                            <div class="row align-items-center">
                                                <div class="col-2 col-md-2">
                                                    <img src="{{$item['featured_image_url']}}" alt="Ecommerce"
                                                        class="img-fluid">
                                                </div>
                                                <div class="col-5 col-md-5">
                                                    <h6 class="mb-0">{{$item['name']}}</h6>
                                                    <span><small class="text-muted">{{$item['discount_price']}} / Item</small></span>
                                                </div>
                                                <div class="col-2 col-md-2 text-center text-muted">
                                                    <span>{{$item['quantity']}}</span>
                                                </div>
                                                <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                    <span class="fw-bold">KES {{$item['total']}}</span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- list group item -->
                                    @endforeach
                                    <li class="list-group-item px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>Item Subtotal</div>
                                            <div class="fw-bold">KES {{$cart_items->sum('total')}}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>Shipping Cost</div>
                                            <div class="fw-bold">KES {{ $shipping_cost }}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                Tax VAT(16%)
                                                <i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip"
                                                    title="Default tooltip"></i>
                                            </div>
                                            <div class="fw-bold">KES {{0.16 * $cart_items->sum('total')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="fw-bold">Total Cost</div>
                                            <div class="fw-bold">KES {{$cart_items->sum('total') + $shipping_cost}}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
