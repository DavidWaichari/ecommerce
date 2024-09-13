@extends('layouts/app')
@section('content')
 <!-- section -->
 <section class="py-lg-16 py-10"
 style="background: url(theme/images/pexels-luna-lovegood-4087393.jpg) no-repeat; background-position: center; background-size: cover">
 <div class="container">
     <!-- row -->
     <div class="row">
         <div class="col-xl-4 col-lg-6 col-md-7">
             <div class="card border-0 shadow">
                 <div class="card-body p-6">
                     <div class="mb-4">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-map-pin text-danger">
                             <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                             <circle cx="12" cy="10" r="3"></circle>
                         </svg>
                         <h1 class="mt-3 mb-0 h4">Check what's in your local store</h1>
                         <small>See delivery and collection options</small>
                     </div>
                     <form>
                         <div class="row g-3">
                             <div class="col">
                                 <label for="postcod" class="visually-hidden">Postcode</label>
                                 <input type="text" class="form-control" id="postcod"
                                     placeholder="Enter Postcode" maxlength="6"
                                     onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                             </div>
                             <div class="col-auto">
                                 <button type="submit" class="btn btn-primary">Check</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="mt-3">
                 <small class="text-white">
                     Hello, Sign in for the best experience. New to Freshcart?
                     <a href="#" class="text-white">Register</a>
                 </small>
             </div>
         </div>
     </div>
 </div>
</section>
<!-- section category -->
<section class="my-lg-14 my-8">
 <div class="container">
     <div class="row align-items-center mb-6">
         <div class="col-10">
             <div>
                 <!-- heading    -->
                 <h3 class="align-items-center d-flex mb-0 h4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-layers text-primary">
                         <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                         <polyline points="2 17 12 22 22 17"></polyline>
                         <polyline points="2 12 12 17 22 12"></polyline>
                     </svg>
                     <span class="ms-3">Shop by Brand</span>
                 </h3>
             </div>
         </div>
         <div class="col-2">
             <div class="slider-arrow slider-8-columns-arrow" id="slider-8-columns-arrows"></div>
         </div>
     </div>
     <div class="row g-6">
         <div class="col-12">
             <div class="position-relative">
                 <div class="slider-8-columns" id="slider-8-columns">
                     <!-- item -->
                     @foreach ($brands as $brand)
                         <div class="item">
                             <!-- item -->
                             <a href="shop-grid.html" class="text-decoration-none text-inherit">
                                 <!-- card -->
                                 <div class="card mb-3 card-lift">
                                     <div class="card-body text-center py-6 text-center">
                                         <div class="my-5">
                                             <svg width="56" height="56" fill="#3d4f58"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M39.615 1.482c-2.408.689-5.92 3.244-11.615 8.45-2.166 1.98-11.172 10.99-13.38 13.386C8.679 29.765 5.119 34.379 3.338 37.94c-1.308 2.616-1.407 3.949-.369 4.983.266.264.589.48.822.55 2.419.718 6.677-1.78 13.242-7.77 3.539-3.228 13.946-13.993 18.728-19.372 6.081-6.838 8.485-10.74 8.015-13.006-.172-.825-.85-1.597-1.659-1.885-.492-.176-1.82-.154-2.502.042M41.95 3.09c.305.268.33.329.33.823 0 .687-.174 1.258-.693 2.275-1.41 2.762-4.569 6.675-10.641 13.179C19.811 31.295 13.759 37.073 9.241 40.089c-3.039 2.029-5.195 2.564-5.46 1.354-.144-.656.72-2.735 1.964-4.725 1.147-1.835 1.162-1.851 2.853-2.9 3.103-1.926 5.079-2.913 7.362-3.677.967-.324 1.034-.36.671-.364-1.579-.016-4.415.816-6.564 1.926-.58.299-1.094.56-1.142.58-.123.05 1.938-2.486 3.252-4.003 1.047-1.208 1.136-1.285 2.134-1.856 2.704-1.546 6.071-2.998 8.501-3.664.595-.164 1.071-.306 1.058-.317-.013-.011-.524.018-1.137.063-2.117.157-4.114.668-6.119 1.566-.99.443-1.047.458-.83.218.127-.141.893-.956 1.701-1.811 1.603-1.698 1.606-1.699 4.164-3.063 3.621-1.929 6.062-2.922 9.058-3.683l.513-.13-.887.046c-1.256.065-3.035.369-4.323.74-1.132.326-2.913.989-3.609 1.344-.216.11-.411.182-.433.159-.023-.022.916-.962 2.085-2.088l2.127-2.048 1.68-.896c3.259-1.738 4.995-2.521 7.747-3.496l1.68-.594-.84.058c-1.726.121-4.457.823-6.324 1.626-.449.193-.816.341-.816.329 0-.05 2.445-2.216 3.546-3.141 3.918-3.293 6.511-4.835 8.14-4.84.57-.002.657.025.957.288m9.6 8.104c-3.248.878-8.229 4.84-17.159 13.651-10.108 9.974-16.547 17.56-19.17 22.584-.611 1.171-1.088 2.441-1.182 3.148-.137 1.034.376 2.074 1.23 2.492.475.232.572.246 1.417.201 1.455-.077 2.921-.706 5.197-2.232 4.091-2.741 8.783-7.083 17.162-15.882 8.679-9.114 11.932-12.829 14.239-16.259 1.075-1.6 1.613-2.603 1.974-3.682.263-.786.292-.973.256-1.68-.044-.881-.177-1.218-.672-1.714-.752-.751-1.972-.984-3.292-.627m1.879 1.445c1.063.444.789 1.993-.81 4.58-2.201 3.562-7.288 9.321-18.131 20.524-5.979 6.177-11.058 10.673-14.201 12.572-1.739 1.05-3.38 1.654-4.126 1.518-.359-.066-.667-.482-.667-.903-.001-.697.922-2.758 2.034-4.543.791-1.269.895-1.399 1.307-1.638.19-.111.864-.506 1.498-.88 1.963-1.156 4.975-2.407 7.34-3.05.668-.181 1.235-.351 1.26-.377.056-.057-1.169.039-2.146.167-1.751.23-3.687.806-5.625 1.674-.569.254-1.045.452-1.058.439-.041-.041 2.068-2.648 3.34-4.129l1.202-1.4 1.187-.638c2.708-1.456 5.552-2.652 7.814-3.284.974-.273 1.065-.314.7-.318-1.759-.02-4.605.637-6.649 1.535-.668.294-.877.354-.79.23.065-.093.915-1.011 1.888-2.041 1.744-1.844 1.786-1.88 2.797-2.43 3.14-1.707 7.404-3.449 9.707-3.966l.653-.146-.98.052c-1.309.07-2.657.273-3.719.561-.909.246-2.802.9-3.607 1.247-.44.189-.344.077 1.629-1.9l2.096-2.101 1.217-.647c.67-.356 1.701-.867 2.291-1.135.59-.269 1.42-.652 1.844-.852 1.079-.508 1.958-.854 3.896-1.535 1.625-.571 1.66-.588 1.073-.54-1.922.157-4.072.666-6.206 1.468l-1.12.42.7-.662c.995-.942 3.428-3.067 4.526-3.953 3.944-3.182 6.518-4.47 7.836-3.919"
                                                     fill-rule="evenodd"></path>
                                             </svg>
                                         </div>
                                         <!-- text -->
                                         <div>{{$brand->name}}</div>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </div>
</section>
<!-- section -->
<section class="my-lg-14 my-8">
 <div class="container">
     <!-- row -->
     <div class="row align-items-center mb-6">
         <div class="col-lg-10 col-10">
             <!-- heading -->
             <h3 class="align-items-center d-flex mb-0 h4">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-star text-primary">
                     <polygon
                         points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                     </polygon>
                 </svg>
                 <div class="d-flex gap-4">
                     <span class="ms-3">Popular Products</span>
                 </div>
                </h3>
                <div class="ms-3">
                   <p class="mb-0">Find the most popular products in our shop.</p>
               </div>
         </div>
         <div class="col-lg-2 col-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="slider-arrow" id="slider-second-arrows"></div>
                <a href="#">
                    View all
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>

     </div>
     <!-- slider -->
     <div class="product-slider-second" id="slider-second">
         <!-- item -->
         @foreach ($popular_products as $product)
            <div class="item">
                <!-- item -->
                <div class="card card-product mb-lg-4">
                    <div class="card-body">
                        <!-- badge -->
                        <div class="text-center position-relative">
                            <div class="position-absolute top-0 start-0">
                                <span class="badge bg-danger">Sale</span>
                            </div>
                            <!-- img -->
                            <!-- img -->
                            <a href="#!"><img src="{{$product->featured_image_url}}"
                                    alt="Product Image" class="mb-3 img-fluid"></a>
                            <!-- action btn -->
                            <!-- action btn -->
                            <div class="card-product-action">
                                <a href="#!" class="btn-action" data-bs-toggle="modal"
                                    data-bs-target="#quickViewModal">
                                    <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="Quick View"></i>
                                </a>
                                {{-- <a href="../pages/shop-wishlist.html" class="btn-action"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                        class="bi bi-heart"></i></a>
                                <a href="#!" class="btn-action" data-bs-toggle="tooltip"
                                    data-bs-html="true" title="Compare"><i
                                        class="bi bi-arrow-left-right"></i></a> --}}
                            </div>
                        </div>
                        <!-- title -->
                        <div class="text-small mb-1">
                            <a href="#!" class="text-decoration-none text-muted"><small>{{$product->category->name}}</small></a>
                        </div>
                        <h2 class="fs-6"><a href="#!"
                                class="text-inherit text-decoration-none">{{$product->name}}</a></h2>
                        {{-- <div>
                            <!-- rating -->
                            <small class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </small>
                            <span class="text-muted small">4.5(149)</span>
                        </div> --}}
                        <!-- price -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <span class="text-dark">KES {{$product->discount_price}}</span>
                                <span class="text-decoration-line-through text-muted">KES {{$product->selling_price}}</span>
                            </div>
                            <div>
                                <span class="text-uppercase small text-primary">In Stock</span>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
         @endforeach
     </div>
 </div>
</section>
<section class="mb-lg-14 my-8">
 <div class="container">
     <!-- row -->
     <div class="row align-items-center mb-6">
         <div class="col-lg-10 col-9">
             <div class="d-xl-flex justify-content-between align-items-center">
                 <!-- heading -->
                 <div class="d-flex">
                     <div class="mt-1">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-shopping-bag text-primary">
                             <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                             <line x1="3" y1="6" x2="21" y2="6">
                             </line>
                             <path d="M16 10a4 4 0 0 1-8 0"></path>
                         </svg>
                     </div>
                     <div class="ms-3">
                         <h3 class="mb-0">Best Selling Products</h3>
                         <p class="mb-0">Find the bestseller products in our shop.</p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-2 col-3">
            <div class="d-flex align-items-center justify-content-between">
             <div class="slider-arrow" id="slider-third-arrows"></div>
             <a href="#">
                View all
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </a>
            </div>
         </div>
     </div>
     <!-- row -->
     <div class="row">
         <div class="col-12">
             <div class="product-slider-second" id="slider-third">
                <!-- item -->
         @foreach ($best_sellers as $product)
         <div class="item">
             <!-- item -->
             <div class="card card-product mb-lg-4">
                 <div class="card-body">
                     <!-- badge -->
                     <div class="text-center position-relative">
                         <div class="position-absolute top-0 start-0">
                             <span class="badge bg-danger">Sale</span>
                         </div>
                         <!-- img -->
                         <!-- img -->
                         <a href="#!"><img src="{{$product->featured_image_url}}"
                                 alt="Product Image" class="mb-3 img-fluid"></a>
                         <!-- action btn -->
                         <!-- action btn -->
                         <div class="card-product-action">
                             <a href="#!" class="btn-action" data-bs-toggle="modal"
                                 data-bs-target="#quickViewModal">
                                 <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                     title="Quick View"></i>
                             </a>
                             {{-- <a href="../pages/shop-wishlist.html" class="btn-action"
                                 data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                     class="bi bi-heart"></i></a>
                             <a href="#!" class="btn-action" data-bs-toggle="tooltip"
                                 data-bs-html="true" title="Compare"><i
                                     class="bi bi-arrow-left-right"></i></a> --}}
                         </div>
                     </div>
                     <!-- title -->
                     <div class="text-small mb-1">
                         <a href="#!" class="text-decoration-none text-muted"><small>{{$product->category->name}}</small></a>
                     </div>
                     <h2 class="fs-6"><a href="#!"
                             class="text-inherit text-decoration-none">{{$product->name}}</a></h2>
                     {{-- <div>
                         <!-- rating -->
                         <small class="text-warning">
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-half"></i>
                         </small>
                         <span class="text-muted small">4.5(149)</span>
                     </div> --}}
                     <!-- price -->
                     <div class="d-flex justify-content-between align-items-center mt-3">
                         <div>
                             <span class="text-dark">KES {{$product->discount_price}}</span>
                             <span class="text-decoration-line-through text-muted">KES {{$product->selling_price}}</span>
                         </div>
                         <div>
                             <span class="text-uppercase small text-primary">In Stock</span>
                         </div>
                     </div>
                     <div class="d-grid mt-4">
                         <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                     </div>
                 </div>
             </div>
         </div>
      @endforeach
             </div>
         </div>
     </div>
 </div>
</section>
@foreach ($brands as $brand)
<section class="mb-lg-14 my-8">
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mb-6">
            <div class="col-lg-10 col-9">
                <div class="d-xl-flex justify-content-between align-items-center">
                    <!-- heading -->
                    <div class="d-flex">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-shopping-bag text-primary">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <!-- Brand Name -->
                            <h3 class="mb-0">{{ $brand->name }} Products</h3>
                            <p class="mb-0">Explore the best products from {{ $brand->name }}.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="slider-arrow" id="slider-{{ $brand->id }}-arrows"></div>
                    <a href="#">
                        View all
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="product-slider-second" id="slider-{{ $brand->id }}">
                    <!-- Loop through products of the brand -->
                    @foreach ($brand->products as $product)
                    <div class="item">
                        <!-- item -->
                        <div class="card card-product mb-lg-4">
                            <div class="card-body">
                                <!-- badge -->
                                <div class="text-center position-relative">
                                    <div class="position-absolute top-0 start-0">
                                        <span class="badge bg-danger">Sale</span>
                                    </div>
                                    <!-- img -->
                                    <a href="#!"><img src="{{$product->featured_image_url}}"
                                            alt="Product Image" class="mb-3 img-fluid"></a>
                                    <!-- action btn -->
                                    <div class="card-product-action">
                                        <a href="#!" class="btn-action" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal">
                                            <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                                title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="text-small mb-1">
                                    <a href="#!" class="text-decoration-none text-muted"><small>{{$product->category->name}}</small></a>
                                </div>
                                <h2 class="fs-6"><a href="#!"
                                        class="text-inherit text-decoration-none">{{$product->name}}</a></h2>
                                <!-- price -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        <span class="text-dark">KES {{$product->discount_price}}</span>
                                        <span class="text-decoration-line-through text-muted">KES {{$product->selling_price}}</span>
                                    </div>
                                    <div>
                                        <span class="text-uppercase small text-primary">In Stock</span>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <a href="{{route('product.details', $product->slug)}}" class="btn btn-primary rounded-pill">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

 <!-- Modal -->
 <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-8">
                <div class="position-absolute top-0 end-0 me-3 mt-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- img slide -->
                        <div class="product productModal" id="productModal">
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url(images/product-single-img-1.jpg)">
                                <!-- img -->
                                <img src="/theme/images/product-single-img-1.jpg" alt="">
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url(images/product-single-img-2.jpg)">
                                    <!-- img -->
                                    <img src="/theme/images/product-single-img-2.jpg" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url(images/product-single-img-3.jpg)">
                                    <!-- img -->
                                    <img src="/theme/images/product-single-img-3.jpg" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url(images/product-single-img-4.jpg)">
                                    <!-- img -->
                                    <img src="/theme/images/product-single-img-4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- product tools -->
                        <div class="product-tools">
                            <div class="thumbnails row g-3" id="productModalThumbnails">
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="/theme/images/product-single-img-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="/theme/images/product-single-img-2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="/theme/images/product-single-img-3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="/theme/images/product-single-img-4.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                            <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
                            <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
                            <div class="mb-4">
                                <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </small>
                                <a href="#" class="ms-2">(30 reviews)</a>
                            </div>
                            <div class="fs-4">
                                <span class="fw-bold text-dark">$32</span>
                                <span class="text-decoration-line-through text-muted">$35</span>
                                <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
                            </div>
                            <hr class="my-6">
                            <div class="mb-4">
                                <button type="button" class="btn btn-outline-secondary">250g</button>
                                <button type="button" class="btn btn-outline-secondary">500g</button>
                                <button type="button" class="btn btn-outline-secondary">1kg</button>
                            </div>
                            <div>
                                <!-- input -->
                                <!-- input -->
                                <div class="input-group input-spinner">
                                    <input type="button" value="-" class="button-minus btn btn-sm"
                                        data-field="quantity">
                                    <input type="number" step="1" max="10" value="1"
                                        name="quantity" class="quantity-field form-control-sm form-input">
                                    <input type="button" value="+" class="button-plus btn btn-sm"
                                        data-field="quantity">
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-start g-2 align-items-center">
                                <div class="col-lg-4 col-md-5 col-6 d-grid">
                                    <!-- button -->
                                    <!-- btn -->
                                    <button type="button" class="btn btn-primary">
                                        <i class="feather-icon icon-shopping-bag me-2"></i>
                                        Add to cart
                                    </button>
                                </div>
                                <div class="col-md-4 col-5">
                                    <!-- btn -->
                                    <a class="btn btn-light" href="#" data-bs-toggle="tooltip"
                                        data-bs-html="true" aria-label="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                    <a class="btn btn-light" href="#!" data-bs-toggle="tooltip"
                                        data-bs-html="true" aria-label="Wishlist"><i
                                            class="feather-icon icon-heart"></i></a>
                                </div>
                            </div>
                            <hr class="my-6">
                            <div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Product Code:</td>
                                            <td>FBB00255</td>
                                        </tr>
                                        <tr>
                                            <td>Availability:</td>
                                            <td>In Stock</td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>Fruits</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>
                                                <small>
                                                    01 day shipping.
                                                    <span class="text-muted">( Free pickup today)</span>
                                                </small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
