@extends('layouts/app')
@section('content')
 <!-- Start Main Slider Area -->
 <div class="main-slider-with-categories pt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <ul class="slider-categories">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ url('/shop?category=' . $category->slug) }}" class="nav-link">
                                <i class="fa fa-{{ $category->icon }}"></i>
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="home-slides-two owl-carousel owl-theme">
                    {{-- <div class="main-slider-item-box">
                        <div class="main-slider-content">
                            <b>Big Sale Offer</b>
                            <h1>Get the Best Deals on Headphone</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                            <div class="slider-btn">
                                <a href="#" class="default-btn">
                                    <i class="flaticon-shopping-cart"></i>
                                    Shop Now
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="main-slider-item-box item-two">
                        <div class="main-slider-content">
                            <b>Big Sale Offer</b>
                            <h1>New Arrivals CCTV Camera</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                            <div class="slider-btn">
                                <a href="#" class="default-btn">
                                    <i class="flaticon-shopping-cart"></i>
                                    Shop Now
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="main-slider-item-box item-three">
                        <div class="main-slider-content">
                            <b>Big Sale Offer</b>
                            <h1>High-Quality Product Camera</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                            <div class="slider-btn">
                                <a href="#" class="default-btn">
                                    <i class="flaticon-shopping-cart"></i>
                                    Shop Now
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($featured_products as $product)
                    <div class="main-slider-item-box" style="background-color: #fdd33f">
                        <div class="row">
                            <div class="col-6">
                                <div class="main-slider-content">
                                    <b>Big Sale Offer</b>
                                    <h1>High-Quality {{$product->name}}</h1>
                                    <p>{{$product->description}}</p>

                                    <div class="slider-btn">
                                        <a href="/shop" class="default-btn">
                                            <i class="flaticon-shopping-cart"></i>
                                            Shop Now
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 bg-transparent">
                                <img src="{{ asset('uploads/featured_images/' . $product->featured_image) }}"  alt="Featured Image">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Slider Area -->

<!-- Start Support Area -->
<section class="support-area ptb-50">
    <div class="container">
        <div class="support-inner-box">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-support">
                        <div class="icon">
                            <i class="flaticon-free-shipping"></i>
                        </div>

                        <div class="support-content">
                            <h3>Reliable Shipping</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-support">
                        <div class="icon">
                            <i class="flaticon-return"></i>
                        </div>

                        <div class="support-content">
                            <h3>30 Days Money Returns</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-support">
                        <div class="icon">
                            <i class="flaticon-security"></i>
                        </div>

                        <div class="support-content">
                            <h3>100% Secure Payment</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-support">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>

                        <div class="support-content">
                            <h3>24/7 Customer Support</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Support Area -->

<!-- Start Bestsellers Area -->
<div class="row">
    <div id="exampleSlider1" class="exampleSlider">
    <div class="MS-content">
        <div class="item">
            <p>Item<br>1</p>
        </div>
        <div class="item">
            <p>Item<br>2</p>
        </div>
        <div class="item">
            <p>Item<br>3</p>
        </div>
        <div class="item">
            <p>Item<br>4</p>
        </div>
        <div class="item">
            <p>Item<br>5</p>
        </div>
        <div class="item">
            <p>Item<br>6</p>
        </div>
        <div class="item">
            <p>Item<br>7</p>
        </div>
        <div class="item">
            <p>Item<br>8</p>
        </div>
        <div class="item">
            <p>Item<br>9</p>
        </div>
        <div class="item">
            <p>Item<br>10</p>
        </div>
    </div>
    <div class="MS-controls">
        <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
        <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
    </div>
</div>
</div>
<section class="bestsellers-area pb-20">
    <div class="container">
        <div class="section-title">
            <h2>Bestsellers</h2>
        </div>

        <div class="tab bestsellers-list-tab">
            <ul class="tabs">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('/shop?category=' . $category->slug) }}" class="nav-link">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab_content">
                <div class="tabs_item">
                    <div class="row">
                        @foreach ($best_sellers as $best_seller)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-bestsellers-products">
                                <div class="bestsellers-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/bestsellers-products/bestsellers-products-1.jpg" alt="image"></a>
                                    @if ($best_seller->is_sold)
                                    <div class="tag">Sale</div>
                                    @else
                                    <div class="tag">New</div>
                                    @endif
                                    <ul class="bestsellers-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="bestsellers-products-content">
                                    <h3>
                                        <a href="products-details.html">Action Camera</a>
                                    </h3>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                    <span>$150.00</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Bestsellers Area -->

<!-- Start Collection Area -->
<section class="collection-area">
    <div class="container">
        <div class="collection-inner-box bg-b8bae1">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="collection-image">
                        <img src="/ejon/assets/img/collection/collection-1.png" alt="image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="collection-content">
                        <span>New Arrival</span>
                        <h3>Best Gadget</h3>
                        <p>Collection</p>

                        <div class="collection-btn">
                            <a href="#" class="default-btn">
                                <i class="flaticon-shopping-cart"></i>
                                Shop Now
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="collection-image">
                        <img src="/ejon/assets/img/collection/collection-2.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Collection Area -->

<!-- Start Offer Products Area -->
<section class="offer-products-area pt-50 pb-20">
    <div class="container">
        <div class="section-title">
            <h2>Special Offer</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="single-offer-products">
                    <div class="offer-products-image">
                        <a href="products-details.html"><img src="/ejon/assets/img/offer-products/large-offer-products.png" alt="image"></a>
                        <div class="tag">-50%</div>
                    </div>

                    <div class="offer-products-content">
                        <span>Gadget</span>
                        <h3>
                            <a href="products-details.html">Bluetooth Headphone</a>
                        </h3>
                        <div class="price">
                            <span class="new-price">$150.00</span>
                            <span class="old-price">$75.00</span>
                        </div>
                        <ul class="rating">
                            <li>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </li>
                        </ul>

                        <div class="offer-soon-content">
                            <div id="timer" class="flex-wrap d-flex justify-content-center">
                                <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-offer-products-box">
                            <div class="offer-products-image">
                                <a href="products-details.html"><img src="/ejon/assets/img/offer-products/offer-products-4.jpg" alt="image"></a>
                                <div class="tag">-50%</div>

                                <ul class="offer-action">
                                    <li>
                                        <a href="cart.html" data-tooltip="tooltip" data-placement="top" title="Add to Cart">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="flaticon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="Quick View" data-bs-toggle="modal" data-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="offer-products-content">
                                <span>Gadget</span>
                                <h3>
                                    <a href="products-details.html">Smartphone</a>
                                </h3>
                                <div class="price">
                                    <span class="new-price">$150.00</span>
                                    <span class="old-price">$300.00</span>
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="single-offer-products-box">
                            <div class="offer-products-image">
                                <a href="products-details.html"><img src="/ejon/assets/img/offer-products/offer-products-5.jpg" alt="image"></a>
                                <div class="tag">-40%</div>

                                <ul class="offer-action">
                                    <li>
                                        <a href="cart.html" data-tooltip="tooltip" data-placement="top" title="Add to Cart">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="flaticon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="Quick View" data-bs-toggle="modal" data-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="offer-products-content">
                                <span>Gadget</span>
                                <h3><a href="products-details.html">Bluetooth Headphone</a></h3>
                                <div class="price">
                                    <span class="new-price">$700.00</span>
                                    <span class="old-price">$999.00</span>
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 offset-lg-0 offset-md-3">
                        <div class="single-offer-products-box">
                            <div class="offer-products-image">
                                <a href="products-details.html"><img src="/ejon/assets/img/offer-products/offer-products-6.jpg" alt="image"></a>
                                <div class="tag">-20%</div>

                                <ul class="offer-action">
                                    <li>
                                        <a href="cart.html" data-tooltip="tooltip" data-placement="top" title="Add to Cart">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="flaticon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="Quick View" data-bs-toggle="modal" data-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="offer-products-content">
                                <span>Gadget</span>
                                <h3>
                                    <a href="#">Air Conditioner</a>
                                </h3>
                                <div class="price">
                                    <span class="new-price">$350.00</span>
                                    <span class="old-price">$700.00</span>
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="offer-overview">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="offer-image">
                                        <img src="/ejon/assets/img/offer-products/offer-products-7.png" alt="image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="offer-content">
                                        <h3>Special Discount Offer</h3>
                                        <span>$499.00</span>

                                        <div class="offer-btn">
                                            <a href="#" class="default-btn">
                                                <i class="flaticon-shopping-cart"></i>
                                                Shop Now
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Offer Products Area -->

<!-- Start Arrivals Products Area -->
<section class="arrivals-products-area pb-20">
    <div class="container">
        <div class="section-title">
            <h2>New Arrivals</h2>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-arrivals-products">
                    <div class="arrivals-products-image">
                        <a href="products-details.html"><img src="/ejon/assets/img/arrivals-products/arrivals-products-1.jpg" alt="image"></a>
                        <div class="tag">New</div>
                        <ul class="arrivals-action">
                            <li>
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="arrivals-products-content">
                        <h3>
                            <a href="products-details.html">Smart Watch</a>
                        </h3>
                        <ul class="rating">
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                        </ul>
                        <span>$99.00</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-arrivals-products">
                    <div class="arrivals-products-image">
                        <a href="products-details.html"><img src="/ejon/assets/img/arrivals-products/arrivals-products-2.jpg" alt="image"></a>
                        <div class="tag">New</div>
                        <ul class="arrivals-action">
                            <li>
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="arrivals-products-content">
                        <h3>
                            <a href="products-details.html">Digital Camera</a>
                        </h3>
                        <ul class="rating">
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                        </ul>
                        <span>$125.00</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-arrivals-products">
                    <div class="arrivals-products-image">
                        <a href="products-details.html"><img src="/ejon/assets/img/arrivals-products/arrivals-products-3.jpg" alt="image"></a>
                        <div class="tag">Sale</div>
                        <ul class="arrivals-action">
                            <li>
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="arrivals-products-content">
                        <h3>
                            <a href="products-details.html">Wireless Headphone</a>
                        </h3>
                        <ul class="rating">
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                        </ul>
                        <span>$175.00</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-arrivals-products">
                    <div class="arrivals-products-image">
                        <a href="products-details.html"><img src="/ejon/assets/img/arrivals-products/arrivals-products-4.jpg" alt="image"></a>
                        <div class="tag">New</div>
                        <ul class="arrivals-action">
                            <li>
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="arrivals-products-content">
                        <h3>
                            <a href="products-details.html">Bluetooth Speaker</a>
                        </h3>
                        <ul class="rating">
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                            <li><i class='bx bxs-star'></i></li>
                        </ul>
                        <span>$75.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Arrivals Products Area -->

<!-- Start Special Products Area -->
<section class="special-products-area pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="section-title">
                    <h2>Special Products</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-special-products">
                            <div class="special-products-image">
                                <a href="products-details.html"><img src="/ejon/assets/img/special-products/special-products-1.jpg" alt="image"></a>
                                <div class="tag">New</div>
                                <ul class="special-action">
                                    <li>
                                        <a href="cart.html">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="special-products-content">
                                <h3>
                                    <a href="products-details.html">Digital Camera</a>
                                </h3>
                                <ul class="rating">
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                </ul>
                                <span>$700.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="single-special-products">
                            <div class="special-products-image">
                                <a href="products-details.html"><img src="/ejon/assets/img/special-products/special-products-2.jpg" alt="image"></a>
                                <div class="tag">New</div>
                                <ul class="special-action">
                                    <li>
                                        <a href="cart.html">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="special-products-content">
                                <h3>
                                    <a href="products-details.html">Smart TV</a>
                                </h3>
                                <ul class="rating">
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                </ul>
                                <span>$500.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 offset-lg-0 offset-md-3">
                        <div class="single-special-products">
                            <div class="special-products-image">
                                <a href="products-details.html"><img src="/ejon/assets/img/special-products/special-products-3.jpg" alt="image"></a>
                                <div class="tag">New</div>
                                <ul class="special-action">
                                    <li>
                                        <a href="cart.html">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="special-products-content">
                                <h3>
                                    <a href="#">New Smart Phone</a>
                                </h3>
                                <ul class="rating">
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                </ul>
                                <span>$1175.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="special-products-inner">
                    <div class="inner-content">
                        <span>New Arrival</span>
                        <h3>Special Laptop</h3>
                        <p>Stock is Limited</p>

                        <div class="inner-btn">
                            <a href="#" class="default-btn">
                                <i class="flaticon-shopping-cart"></i>
                                Shop Now
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Special Products Area -->
@endsection
@section('scripts')
    <script>
        $('#exampleSlider1').multislider({interval: 2500});
    </script>
@endsection
