@extends('layouts/app')
@section('content')
<div class="mt-4">
    <div class="container">
       <!-- row -->
       <div class="row">
          <!-- col -->
          <div class="col-12">
             <!-- breadcrumb -->
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>

                   <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <section class="mt-8">
    <div class="container">
       <div class="row">
          <div class="col-md-5 col-xl-6">
            <img src="{{$product->featured_image_url}}" alt="Product Image" class="mb-3 img-fluid">
          </div>
          <div class="col-md-7 col-xl-6">
             <div class="ps-lg-10 mt-6 mt-md-0">
                <!-- content -->
                <a href="#!" class="mb-4 d-block">{{$product->category->name}}</a>
                <!-- heading -->
                <h1 class="mb-1">{{$product->name}}</h1>
                <div class="fs-4">
                   <!-- price -->
                   <span class="fw-bold text-dark">KES {{$product->discount_price}}</span>
                   @if ($product->discount > 0)
                   <span class="text-decoration-line-through text-muted">KES {{$product->selling_price}}</span>
                   <span><small class="fs-6 ms-2 text-danger">{{$product->discount}}% Off</small></span>
                   @endif
                </div>
                <!-- hr -->
                <hr class="my-6">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div>
                       <!-- input -->
                       <div class="input-group input-spinner">
                          <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity">
                          <input type="number" step="1"  value="1" name="quantity" class="quantity-field form-control-sm form-input">
                          <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity">
                       </div>
                    </div>
                    <div class="mt-3 row justify-content-start g-2 align-items-center">
                       <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                          <!-- button -->
                          <button type="submit" class="btn btn-primary">
                             <i class="feather-icon icon-shopping-bag me-2"></i>
                             Add to cart
                          </button>
                       </div>
                    </div>
                </form>
                <!-- hr -->
                <hr class="my-6">
                <div>
                   <!-- table -->
                   <table class="table table-borderless mb-0">
                      <tbody>
                         <tr>
                            <td>Product Code:</td>
                            <td>{{$product->part_number}}</td>
                         </tr>
                         <tr>
                            <td>Availability:</td>
                            <td>In Stock</td>
                         </tr>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="mt-lg-14 mt-8">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                <!-- nav item -->
                <li class="nav-item" role="presentation">
                   <!-- btn -->
                   <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">
                      Product Details
                   </button>
                </li>

             </div>
          </div>
       </div>
    </div>
 </section>

 <!-- section -->
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
                            <h3 class="mb-0">Related Items</h3>
                            <p class="mb-0">These are the related items.</p>
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
            @foreach ($related_products as $product)
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
@endsection

@section('scripts')

