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
                      <h5 class="mb-3">Categories</h5>
                      <ul class="nav nav-category" id="categoryCollapseMenu">
                        @foreach ($categories as $category)
                        @if ($category->status == 'Active')
                        @if($category->products->count() > 0)
                        <li class="nav-item border-bottom w-100">
                            <a href="/shop?category={{$category->slug}}" class="nav-link">{{ $category->name }}</a>
                        </li>
                        @endif
                        @endif
                        @endforeach
                      </ul>
                   </div>

                   <div class="mb-8">
                    <h5 class="mb-3">Brands</h5>
                    @foreach ($brands as $brand)
                    <div class="form-check mb-2">
                        <input class="form-check-input brand_check_box" type="checkbox" value="{{$brand->slug}}"
                            id="brand-{{$brand->slug}}"
                            {{ $selected_brands->pluck('id')->contains($brand->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="brand-{{$brand->slug}}">{{$brand->name}}</label>
                    </div>
                    @endforeach
                </div>

                   @if ($selected_category && $selected_category->has_processor)
                       <div class="mb-8">
                           <h5 class="mb-3">Processor</h5>
                           @foreach ($processors as $processor)
                           <div class="form-check mb-2">
                               <input class="form-check-input processor_check_box" type="checkbox" value="{{$processor->slug}}"
                                   id="processor-{{$processor->slug}}"
                                   {{ $selected_processors->pluck('id')->contains($processor->id) ? 'checked' : '' }}>
                               <label class="form-check-label" for="processor-{{$processor->slug}}">{{$processor->name}}</label>
                           </div>
                           @endforeach
                       </div>
                   @endif
                   <div class="mb-8">
                    <h5 class="mb-3">Condition</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input condition_check_box" type="checkbox" value="New" id="condition-new"
                            {{ $selected_conditions->contains('New') ? 'checked' : '' }}>
                        <label class="form-check-label" for="condition-new">New</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input condition_check_box" type="checkbox" value="Used" id="condition-used"
                            {{ $selected_conditions->contains('Used')  ? 'checked' : '' }}>
                        <label class="form-check-label" for="condition-used">Used</label>
                    </div>
                </div>    
                   {{-- <div class="mb-8">
                       <button id="filterBtn" class="btn btn-dark">
                           Filter
                           <i class="feather-icon icon-arrow-right ms-1"></i>
                       </button>
                   </div> --}}
                </div>
             </div>
          </aside>
          <section class="col-lg-9 col-md-12">
             <div class="card mb-4 bg-light border-0">
                <div class="card-body p-9">
                   <h2 class="mb-0 fs-1">{{$title_text}}</h2>
                </div>
             </div>
             <div class="d-lg-flex justify-content-between align-items-center">
                <div class="mb-3 mb-lg-0">
                   <p class="mb-0">
                      <span class="text-dark">{{$products->count()}}</span>
                      Products found
                   </p>
                </div>
                <div class="d-md-flex justify-content-between align-items-center">
                   <div class="d-flex mt-2 mt-lg-0">
                      <div>
                         <select class="form-select" id="sortSelect">
                            <option value="" selected>Sort by price</option>
                            <option value="asc">Price: Low to High</option>
                            <option value="desc">Price: High to Low</option>
                         </select>
                      </div>
                   </div>
                </div>
             </div>
             <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                @foreach ($products as $product)
                @if($product->status == "Active")
                <div class="item">
                    <div class="card card-product mb-lg-4">
                        <div class="card-body">
                            <div class="text-center position-relative">
                                <div class="position-absolute top-0 start-0">
                                    <span class="badge bg-danger">Sale</span>
                                </div>
                                <a href="{{route('product.details', ['slug' => $product->slug])}}">
                                    <img src="{{$product->featured_image_url}}"
                                        alt="{{$product->name}}" class="mb-3 img-fluid">
                                </a>
                                <div class="card-product-action">
                                    <a href="{{route('product.details', ['slug' => $product->slug])}}" class="btn-action">
                                        <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-small mb-1">
                                <a href="#!" class="text-decoration-none text-muted"><small>{{$product->category->name}}</small></a>
                            </div>
                            <h2 class="fs-6">
                                <a href="{{route('product.details', ['slug' => $product->slug])}}"
                                    class="text-inherit text-decoration-none">{{$product->name}}</a>
                            </h2>
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
                                <a href="{{route('product.details', ['slug' => $product->slug])}}" class="btn btn-primary rounded-pill">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
@section('scripts')
<script>
$(document).ready(function() {
    function updateUrl() {
        let url = new URL(window.location.href);
        let selectedBrands = [];
        let selectedProcessors = [];
        let selectedConditions = [];

        $('.brand_check_box:checked').each(function() {
            selectedBrands.push($(this).val());
        });

        $('.processor_check_box:checked').each(function() {
            selectedProcessors.push($(this).val());
        });

        $('.condition_check_box:checked').each(function() {
            selectedConditions.push($(this).val());
        });

        // Clear existing brand, processor, condition, and sort parameters
        url.searchParams.delete('brands');
        url.searchParams.delete('processors');
        url.searchParams.delete('conditions');
        url.searchParams.delete('sort');

        // Append selected brands
        if (selectedBrands.length) {
            url.searchParams.append('brands', selectedBrands.join(','));
        }

        // Append selected processors
        if (selectedProcessors.length) {
            url.searchParams.append('processors', selectedProcessors.join(','));
        }

        // Append selected conditions
        if (selectedConditions.length) {
            url.searchParams.append('conditions', selectedConditions.join(','));
        }

        // Append selected sort option
        let sortOption = $('#sortSelect').val();
        if (sortOption) {
            url.searchParams.append('sort', sortOption);
        }

        return url.toString(); // Return the updated URL
    }

    // Attach event listener to checkboxes
    $('.brand_check_box, .processor_check_box, .condition_check_box').change(function() {
        // Update URL in the address bar without refreshing
        window.history.replaceState({}, '', updateUrl());

        refreshPage();
    });

    // Filter the results
    $('#filterBtn').on('click', function () {
        // Refresh the page with the updated URL
        window.location.href = updateUrl();
    });

    // Sort products by price
    $('#sortSelect').on('change', function () {
        refreshPage();
    });

    function refreshPage(){
        window.location.href = updateUrl();
    }
});

</script>
@endsection
