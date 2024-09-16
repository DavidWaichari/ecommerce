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
                            <p class="mb-0">
                                Already have an account? Click here to
                                <a href="/login">Sign in</a>
                                .
                            </p>
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
                                    <a href="#" class="fs-5 text-inherit collapsed h4" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="true"
                                        aria-controls="flush-collapseOne">
                                        <i class="feather-icon icon-map-pin me-2 text-muted"></i>
                                        Add delivery address
                                    </a>
                                    <!-- btn -->
                                    <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addAddressModal">Add a new address</a>
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
                                                        <strong>{{ $address['first_name'] }}
                                                            {{ $address['last_name'] }}</strong>
                                                        <br>

                                                        {{ $address['address'] }} {{ $address['city'] }},
                                                        <br>

                                                        {{ $address['county'] }}, Kenya,
                                                        <br>

                                                        <abbr title="Phone">{{ $address['phone_number'] }}</abbr>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- accordion item -->
                            <!-- accordion item -->
                            <form action="/checkout/process" method="post">
                                @csrf
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
                                <!-- accordion item -->
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
                                                                    value="cash_on_delivery" required>
                                                                <label class="form-check-label ms-2"
                                                                    for="cashonDelivery"></label>
                                                            </div>
                                                            <div>
                                                                <!-- title -->
                                                                <h5 class="mb-1 h6">Cash on Delivery</h5>
                                                                <p class="mb-0 small">Pay with cash when your order is
                                                                    delivered.</p>
                                                            </div>
                                                        </div>
                                                        {{-- <!-- Credit Card Option -->
                                                        <div class="d-flex mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="credit_card">
                                                                <label class="form-check-label ms-2" for="creditCard"></label>
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
                                            <div>
                                                Tax VAT(16%)
                                                <i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip"
                                                    title="Default tooltip"></i>
                                            </div>
                                            <div class="fw-bold">KES {{0.16 * $cart_items->sum('total')}}</div>
                                        </div>
                                    </li>
                                    <!-- list group item -->
                                    <li class="list-group-item px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between fw-bold">
                                            <div>Total</div>
                                            <div>KES {{(0.16 * $cart_items->sum('total')) +  $cart_items->sum('total')}}</div>
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
    <!-- Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body p-6">
                    <div class="d-flex justify-content-between mb-5">
                        <!-- Heading -->
                        <div>
                            <h5 class="h6 mb-1" id="addAddressModalLabel">New Shipping Address</h5>
                            <p class="small mb-0">Add new shipping address for your order delivery.</p>
                        </div>
                        <div>
                            <!-- Close button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <!-- Form start -->
                    <form action="/checkout/address" method="POST">
                        <!-- Include CSRF token -->
                        @csrf

                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-12">
                                <input type="text" class="form-control" name="first_name" placeholder="First name"
                                    aria-label="First name" required>
                            </div>

                            <!-- Last Name -->
                            <div class="col-12">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name"
                                    aria-label="Last name" required>
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>

                            <!-- Phone Number -->
                            <div class="col-12">
                                <input type="text" class="form-control" name="phone_number"
                                    placeholder="Phone number" required>
                            </div>

                            <!-- County -->
                            <div class="col-12">
                                <select class="form-control" name="county" id="county" required>
                                    <option value="Baringo">Baringo</option>
                                    <option value="Bomet">Bomet</option>
                                    <option value="Bungoma">Bungoma</option>
                                    <option value="Busia">Busia</option>
                                    <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                    <option value="Embu">Embu</option>
                                    <option value="Garissa">Garissa</option>
                                    <option value="Homa Bay">Homa Bay</option>
                                    <option value="Isiolo">Isiolo</option>
                                    <option value="Kajiado">Kajiado</option>
                                    <option value="Kakamega">Kakamega</option>
                                    <option value="Kericho">Kericho</option>
                                    <option value="Kiambu">Kiambu</option>
                                    <option value="Kilifi">Kilifi</option>
                                    <option value="Kirinyaga">Kirinyaga</option>
                                    <option value="Kisii">Kisii</option>
                                    <option value="Kisumu">Kisumu</option>
                                    <option value="Kitui">Kitui</option>
                                    <option value="Kwale">Kwale</option>
                                    <option value="Laikipia">Laikipia</option>
                                    <option value="Lamu">Lamu</option>
                                    <option value="Machakos">Machakos</option>
                                    <option value="Makueni">Makueni</option>
                                    <option value="Mandera">Mandera</option>
                                    <option value="Marsabit">Marsabit</option>
                                    <option value="Meru">Meru</option>
                                    <option value="Migori">Migori</option>
                                    <option value="Mombasa">Mombasa</option>
                                    <option value="Murang'a">Murang'a</option>
                                    <option value="Nairobi City">Nairobi City</option>
                                    <option value="Nakuru">Nakuru</option>
                                    <option value="Nandi">Nandi</option>
                                    <option value="Narok">Narok</option>
                                    <option value="Nyamira">Nyamira</option>
                                    <option value="Nyandarua">Nyandarua</option>
                                    <option value="Nyeri">Nyeri</option>
                                    <option value="Samburu">Samburu</option>
                                    <option value="Siaya">Siaya</option>
                                    <option value="Taita-Taveta">Taita-Taveta</option>
                                    <option value="Tana River">Tana River</option>
                                    <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                    <option value="Trans Nzoia">Trans Nzoia</option>
                                    <option value="Turkana">Turkana</option>
                                    <option value="Uasin Gishu">Uasin Gishu</option>
                                    <option value="Vihiga">Vihiga</option>
                                    <option value="Wajir">Wajir</option>
                                    <option value="West Pokot">West Pokot</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="col-12">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>

                            <!-- City -->
                            <div class="col-12">
                                <input type="text" class="form-control" name="city" placeholder="City">
                            </div>

                            <!-- Form buttons -->
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-outline-primary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save Address</button>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </div>
    </div>
@endsection
