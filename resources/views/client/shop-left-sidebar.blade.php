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
                   <li class="breadcrumb-item"><a href="#!">Home</a></li>
                   <li class="breadcrumb-item"><a href="#!">Shop</a></li>
                   <li class="breadcrumb-item active" aria-current="page">{{$title_text}}</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <!-- section -->
 <div class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
       <!-- row -->
       <div class="row gx-10">
          <!-- col -->
          <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
             <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50" tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">
                <div class="offcanvas-header d-lg-none">
                   <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ps-lg-2 pt-lg-0">
                   <div class="mb-8">
                      <!-- title -->
                      <h5 class="mb-3">Categories</h5>
                      <!-- nav -->
                      <ul class="nav nav-category" id="categoryCollapseMenu">
                        @foreach ($categories as $category)
                        <li class="nav-item border-bottom w-100">
                            <a href="/shop?category={{$category->slug}}" class="nav-link">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                      </ul>
                   </div>

                   @if ($selected_category)
                        @if ($selected_category->has_processor)
                            <div class="mb-8">
                                <h5 class="mb-3">Processor</h5>
                                <!-- form check -->
                                <div class="form-check mb-2">
                                    <label class="form-check-label" for="eGrocery">E-Grocery</label>
                                </div>
                            </div>
                        @endif
                    @endif

                   <div class="mb-8">
                      <!-- price -->
                      <h5 class="mb-3">Price</h5>
                      <div>
                         <!-- range -->
                         <div id="priceRange" class="mb-3"></div>
                         <small class="text-muted">Price:</small>
                         <span id="priceRange-value" class="small"></span>
                      </div>
                   </div>
                   <!-- rating -->
                   <div class="mb-8">
                      <h5 class="mb-3">Rating</h5>
                      <div>
                         <!-- form check -->
                         <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="ratingFive">
                            <label class="form-check-label" for="ratingFive">
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                            </label>
                         </div>
                         <!-- form check -->
                         <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="ratingFour" checked="">
                            <label class="form-check-label" for="ratingFour">
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                            </label>
                         </div>
                         <!-- form check -->
                         <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="ratingThree">
                            <label class="form-check-label" for="ratingThree">
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                            </label>
                         </div>
                         <!-- form check -->
                         <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="ratingTwo">
                            <label class="form-check-label" for="ratingTwo">
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                            </label>
                         </div>
                         <!-- form check -->
                         <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="ratingOne">
                            <label class="form-check-label" for="ratingOne">
                               <i class="bi bi-star-fill text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                               <i class="bi bi-star text-warning"></i>
                            </label>
                         </div>
                      </div>
                   </div>
                   <div class="mb-8 position-relative">
                      <!-- Banner Design -->
                      <!-- Banner Content -->
                      <div class="position-absolute p-5 py-8">
                         <h3 class="mb-0">Fresh Fruits</h3>
                         <p>Get Upto 25% Off</p>
                         <a href="#" class="btn btn-dark">
                            Shop Now
                            <i class="feather-icon icon-arrow-right ms-1"></i>
                         </a>
                      </div>
                      <!-- Banner Content -->
                      <!-- Banner Image -->
                      <!-- img -->
                      <img src="/theme/images/assortment-citrus-fruits.png" alt="" class="img-fluid rounded">
                      <!-- Banner Image -->
                   </div>
                </div>
             </div>
          </aside>
          <section class="col-lg-9 col-md-12">
             <!-- card -->
             <div class="card mb-4 bg-light border-0">
                <!-- card body -->
                <div class="card-body p-9">
                   <h2 class="mb-0 fs-1">{{$title_text}}</h2>
                </div>
             </div>
             <!-- list icon -->
             <div class="d-lg-flex justify-content-between align-items-center">
                <div class="mb-3 mb-lg-0">
                   <p class="mb-0">
                      <span class="text-dark">{{$products->count()}}</span>
                      Products found
                   </p>
                </div>

                <!-- icon -->
                <div class="d-md-flex justify-content-between align-items-center">
                   <div class="d-flex mt-2 mt-lg-0">
                      <div>
                         <!-- select option -->
                         <select class="form-select">
                            <option selected="">Sort by price</option>
                            <option value="Low to High">Price: Low to High</option>
                            <option value="High to Low">Price: High to Low</option>
                         </select>
                      </div>
                   </div>
                </div>
             </div>
             <!-- row -->
             <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                @foreach ($products as $product)
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
                                    <a href="{{route('product.details', $product->slug)}}" class="btn-action"
                                        >
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
             <div class="row mt-8">
                <div class="col">
                    {{ $products->links('vendor.pagination.custom') }}
                </div>
             </div>
          </section>
       </div>
    </div>
 </div>
@endsection
