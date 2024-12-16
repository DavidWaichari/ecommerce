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
            <!-- <img src="{{$product->featured_image_url}}" alt="Product Image" class="mb-3 img-fluid"> -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                @foreach($product->images as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('uploads/images/' . $image) }}" alt="Product image {{ $index + 1 }}">
                    </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-md-7 col-xl-6">
             <div class="ps-lg-10 mt-6 mt-md-0">
                <!-- content -->
                <a href="#!" class="mb-4 d-block">{{$product->category->name}}</a>
                <!-- heading -->
                <h1 class="mb-1">{{$product->name}}</h1>
                <div class="fs-4">
                   <!-- price -->
                   <span class="fw-bold text-dark">KES {{number_format($product->discount_price)}}</span>
                   @if ($product->discount > 0)
                   <span class="text-decoration-line-through text-muted">KES {{number_format($product->selling_price)}}</span>
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
                <!-- nav item -->
                {{-- <li class="nav-item" role="presentation">
                   <!-- btn -->
                   <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false" tabindex="-1">
                      Information
                   </button>
                </li>
                <!-- nav item -->
                <li class="nav-item" role="presentation">
                   <!-- btn -->
                   <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false" tabindex="-1">
                      Reviews
                   </button>
                </li>
                <!-- nav item -->
                <li class="nav-item" role="presentation">
                   <!-- btn -->
                   <button class="nav-link" id="sellerInfo-tab" data-bs-toggle="tab" data-bs-target="#sellerInfo-tab-pane" type="button" role="tab" aria-controls="sellerInfo-tab-pane" aria-selected="false" disabled="" tabindex="-1">
                      Seller Info
                   </button>
                </li> --}}
             </ul>
             <!-- tab content -->
             <div class="tab-content" id="myTabContent">
                <!-- tab pane -->
                <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                   <div class="my-8">
                      <div class="mb-5">
                         <!-- text -->
                         <h4 class="mb-1">Description</h4>
                         <p class="mb-0">
                            {{$product->description}}
                         </p>
                      </div>
                   </div>
                </div>
                <!-- tab pane -->
                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                   <div class="my-8">
                      <div class="row">
                         <div class="col-12">
                            <h4 class="mb-4">Details</h4>
                         </div>
                         <div class="col-12 col-lg-6">
                            <table class="table table-striped">
                               <!-- table -->
                               <tbody>
                                  <tr>
                                     <th>Weight</th>
                                     <td>1000 Grams</td>
                                  </tr>
                                  <tr>
                                     <th>Ingredient Type</th>
                                     <td>Vegetarian</td>
                                  </tr>
                                  <tr>
                                     <th>Brand</th>
                                     <td>Dmart</td>
                                  </tr>
                                  <tr>
                                     <th>Item Package Quantity</th>
                                     <td>1</td>
                                  </tr>
                                  <tr>
                                     <th>Form</th>
                                     <td>Larry the Bird</td>
                                  </tr>
                                  <tr>
                                     <th>Manufacturer</th>
                                     <td>Dmart</td>
                                  </tr>
                                  <tr>
                                     <th>Net Quantity</th>
                                     <td>340.0 Gram</td>
                                  </tr>
                                  <tr>
                                     <th>Product Dimensions</th>
                                     <td>9.6 x 7.49 x 18.49 cm</td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                         <div class="col-12 col-lg-6">
                            <table class="table table-striped">
                               <!-- table -->
                               <tbody>
                                  <tr>
                                     <th>ASIN</th>
                                     <td>SB0025UJ75W</td>
                                  </tr>
                                  <tr>
                                     <th>Best Sellers Rank</th>
                                     <td>#2 in Fruits</td>
                                  </tr>
                                  <tr>
                                     <th>Date First Available</th>
                                     <td>30 April 2022</td>
                                  </tr>
                                  <tr>
                                     <th>Item Weight</th>
                                     <td>500g</td>
                                  </tr>
                                  <tr>
                                     <th>Generic Name</th>
                                     <td>Banana Robusta</td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                </div>
                <!-- tab pane -->
                <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                   <div class="my-8">
                      <!-- row -->
                      <div class="row">
                         <div class="col-md-4">
                            <div class="me-lg-12 mb-6 mb-md-0">
                               <div class="mb-5">
                                  <!-- title -->
                                  <h4 class="mb-3">Customer reviews</h4>
                                  <span>
                                     <!-- rating -->
                                     <small class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                     </small>
                                     <span class="ms-3">4.1 out of 5</span>
                                     <small class="ms-3">11,130 global ratings</small>
                                  </span>
                               </div>
                               <div class="mb-8">
                                  <!-- progress -->
                                  <div class="d-flex align-items-center mb-2">
                                     <div class="text-nowrap me-3 text-muted">
                                        <span class="d-inline-block align-middle text-muted">5</span>
                                        <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                     </div>
                                     <div class="w-100">
                                        <div class="progress" style="height: 6px">
                                           <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                     </div>
                                     <span class="text-muted ms-3">53%</span>
                                  </div>
                                  <!-- progress -->
                                  <div class="d-flex align-items-center mb-2">
                                     <div class="text-nowrap me-3 text-muted">
                                        <span class="d-inline-block align-middle text-muted">4</span>
                                        <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                     </div>
                                     <div class="w-100">
                                        <div class="progress" style="height: 6px">
                                           <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50"></div>
                                        </div>
                                     </div>
                                     <span class="text-muted ms-3">22%</span>
                                  </div>
                                  <!-- progress -->
                                  <div class="d-flex align-items-center mb-2">
                                     <div class="text-nowrap me-3 text-muted">
                                        <span class="d-inline-block align-middle text-muted">3</span>
                                        <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                     </div>
                                     <div class="w-100">
                                        <div class="progress" style="height: 6px">
                                           <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="35"></div>
                                        </div>
                                     </div>
                                     <span class="text-muted ms-3">14%</span>
                                  </div>
                                  <!-- progress -->
                                  <div class="d-flex align-items-center mb-2">
                                     <div class="text-nowrap me-3 text-muted">
                                        <span class="d-inline-block align-middle text-muted">2</span>
                                        <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                     </div>
                                     <div class="w-100">
                                        <div class="progress" style="height: 6px">
                                           <div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="22"></div>
                                        </div>
                                     </div>
                                     <span class="text-muted ms-3">5%</span>
                                  </div>
                                  <!-- progress -->
                                  <div class="d-flex align-items-center mb-2">
                                     <div class="text-nowrap me-3 text-muted">
                                        <span class="d-inline-block align-middle text-muted">1</span>
                                        <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                     </div>
                                     <div class="w-100">
                                        <div class="progress" style="height: 6px">
                                           <div class="progress-bar bg-warning" role="progressbar" style="width: 14%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="14"></div>
                                        </div>
                                     </div>
                                     <span class="text-muted ms-3">7%</span>
                                  </div>
                               </div>
                               <div class="d-grid">
                                  <h4>Review this product</h4>
                                  <p class="mb-0">Share your thoughts with other customers.</p>
                                  <a href="#" class="btn btn-outline-gray-400 mt-4 text-muted">Write the Review</a>
                               </div>
                            </div>
                         </div>
                         <!-- col -->
                         <div class="col-md-8">
                            <div class="mb-10">
                               <div class="d-flex justify-content-between align-items-center mb-8">
                                  <div>
                                     <!-- heading -->
                                     <h4>Reviews</h4>
                                  </div>
                                  <div>
                                     <select class="form-select">
                                        <option selected="">Top Reviews</option>
                                        <option value="Most Recent">Most Recent</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="d-flex border-bottom pb-6 mb-6">
                                  <!-- img -->
                                  <!-- img -->
                                  <img src="../assets/images/avatar/avatar-10.jpg" alt="" class="rounded-circle avatar-lg">
                                  <div class="ms-5">
                                     <h6 class="mb-1">Shankar Subbaraman</h6>
                                     <!-- select option -->
                                     <!-- content -->
                                     <p class="small">
                                        <span class="text-muted">30 December 2022</span>
                                        <span class="text-primary ms-3 fw-bold">Verified Purchase</span>
                                     </p>
                                     <!-- rating -->
                                     <div class="mb-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                                     </div>
                                     <!-- text-->
                                     <p>
                                        Product quality is good. But, weight seemed less than 1kg. Since it is being sent in open package, there is a possibility of pilferage in between.
                                        FreshCart sends the veggies and fruits through sealed plastic covers and Barcode on the weight etc. .
                                     </p>
                                     <div>
                                        <div class="border icon-shape icon-lg border-2">
                                           <!-- img -->
                                           <img src="../assets/images/products/product-img-1.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="border icon-shape icon-lg border-2 ms-1">
                                           <!-- img -->
                                           <img src="../assets/images/products/product-img-2.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="border icon-shape icon-lg border-2 ms-1">
                                           <!-- img -->
                                           <img src="../assets/images/products/product-img-3.jpg" alt="" class="img-fluid">
                                        </div>
                                     </div>
                                     <!-- icon -->
                                     <div class="d-flex justify-content-end mt-4">
                                        <a href="#" class="text-muted">
                                           <i class="feather-icon icon-thumbs-up me-1"></i>
                                           Helpful
                                        </a>
                                        <a href="#" class="text-muted ms-4">
                                           <i class="feather-icon icon-flag me-2"></i>
                                           Report abuse
                                        </a>
                                     </div>
                                  </div>
                               </div>
                               <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                  <!-- img -->
                                  <img src="../assets/images/avatar/avatar-12.jpg" alt="" class="rounded-circle avatar-lg">
                                  <div class="ms-5">
                                     <h6 class="mb-1">Robert Thomas</h6>
                                     <!-- content -->
                                     <p class="small">
                                        <span class="text-muted">29 December 2022</span>
                                        <span class="text-primary ms-3 fw-bold">Verified Purchase</span>
                                     </p>
                                     <!-- rating -->
                                     <div class="mb-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                                     </div>

                                     <p>
                                        Product quality is good. But, weight seemed less than 1kg. Since it is being sent in open package, there is a possibility of pilferage in between.
                                        FreshCart sends the veggies and fruits through sealed plastic covers and Barcode on the weight etc. .
                                     </p>

                                     <!-- icon -->
                                     <div class="d-flex justify-content-end mt-4">
                                        <a href="#" class="text-muted">
                                           <i class="feather-icon icon-thumbs-up me-1"></i>
                                           Helpful
                                        </a>
                                        <a href="#" class="text-muted ms-4">
                                           <i class="feather-icon icon-flag me-2"></i>
                                           Report abuse
                                        </a>
                                     </div>
                                  </div>
                               </div>
                               <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                  <!-- img -->
                                  <img src="../assets/images/avatar/avatar-9.jpg" alt="" class="rounded-circle avatar-lg">
                                  <div class="ms-5">
                                     <h6 class="mb-1">Barbara Tay</h6>
                                     <!-- content -->
                                     <p class="small">
                                        <span class="text-muted">28 December 2022</span>
                                        <span class="text-danger ms-3 fw-bold">Unverified Purchase</span>
                                     </p>
                                     <!-- rating -->
                                     <div class="mb-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                                     </div>

                                     <p>Everytime i ordered from fresh i got greenish yellow bananas just like i wanted so go for it , its happens very rare that u get over riped ones.</p>

                                     <!-- icon -->
                                     <div class="d-flex justify-content-end mt-4">
                                        <a href="#" class="text-muted">
                                           <i class="feather-icon icon-thumbs-up me-1"></i>
                                           Helpful
                                        </a>
                                        <a href="#" class="text-muted ms-4">
                                           <i class="feather-icon icon-flag me-2"></i>
                                           Report abuse
                                        </a>
                                     </div>
                                  </div>
                               </div>
                               <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                  <!-- img -->
                                  <img src="../assets/images/avatar/avatar-8.jpg" alt="" class="rounded-circle avatar-lg">
                                  <div class="ms-5 flex-grow-1">
                                     <h6 class="mb-1">Sandra Langevin</h6>
                                     <!-- content -->
                                     <p class="small">
                                        <span class="text-muted">8 December 2022</span>
                                        <span class="text-danger ms-3 fw-bold">Unverified Purchase</span>
                                     </p>
                                     <!-- rating -->
                                     <div class="mb-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <span class="ms-3 text-dark fw-bold">Great product</span>
                                     </div>

                                     <p>Great product &amp; package. Delivery can be expedited.</p>

                                     <!-- icon -->
                                     <div class="d-flex justify-content-end mt-4">
                                        <a href="#" class="text-muted">
                                           <i class="feather-icon icon-thumbs-up me-1"></i>
                                           Helpful
                                        </a>
                                        <a href="#" class="text-muted ms-4">
                                           <i class="feather-icon icon-flag me-2"></i>
                                           Report abuse
                                        </a>
                                     </div>
                                  </div>
                               </div>
                               <div>
                                  <a href="#" class="btn btn-outline-gray-400 text-muted">Read More Reviews</a>
                               </div>
                            </div>
                            <div>
                               <!-- rating -->
                               <h3 class="mb-5">Create Review</h3>
                               <div class="border-bottom py-4 mb-4">
                                  <h4 class="mb-3">Overall rating</h4>
                                  <div class="rater star-rating" style="width: 100px; height: 20px; background-size: 20px;"><div class="star-value" style="background-size: 20px; width: 0px;"></div></div>
                               </div>
                               <div class="border-bottom py-4 mb-4">
                                  <h4 class="mb-0">Rate Features</h4>
                                  <div class="my-5">
                                     <h5>Flavor</h5>
                                     <div class="rater star-rating" style="width: 100px; height: 20px; background-size: 20px;"><div class="star-value" style="background-size: 20px; width: 0px;"></div></div>
                                  </div>
                                  <div class="my-5">
                                     <h5>Value for money</h5>
                                     <div class="rater star-rating" style="width: 100px; height: 20px; background-size: 20px;"><div class="star-value" style="background-size: 20px; width: 0px;"></div></div>
                                  </div>
                                  <div class="my-5">
                                     <h5>Scent</h5>
                                     <div class="rater star-rating" style="width: 100px; height: 20px; background-size: 20px;"><div class="star-value" style="background-size: 20px; width: 0px;"></div></div>
                                  </div>
                               </div>
                               <!-- form control -->
                               <div class="border-bottom py-4 mb-4">
                                  <h5>Add a headline</h5>
                                  <input type="text" class="form-control" placeholder="What’s most important to know">
                               </div>
                               <div class="border-bottom py-4 mb-4">
                                  <h5>Add a photo or video</h5>
                                  <p>Shoppers find images and videos more helpful than text alone.</p>

                                  <div id="my-dropzone" class="dropzone mt-4 border-dashed rounded-2 min-h-0 dz-clickable"><div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div></div>
                               </div>
                               <div class="py-4 mb-4">
                                  <!-- heading -->
                                  <h5>Add a written review</h5>
                                  <textarea class="form-control" rows="3" placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                               </div>
                               <!-- button -->
                               <div class="d-flex justify-content-end">
                                  <a href="#" class="btn btn-primary">Submit Review</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <!-- tab pane -->
                <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab" tabindex="0">...</div>
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
