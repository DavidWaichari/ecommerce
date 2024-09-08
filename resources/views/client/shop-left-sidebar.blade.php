@extends('layouts/app')
@section('content')
    <!-- Start Page Banner -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Shop </h2>

                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Shop </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->

    <!-- Start Shop Area -->
    <section class="shop-area bg-ffffff pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Search...">
                                </label>
                                <button type="submit">
                                    <i class='bx bx-search-alt'></i>
                                </button>
                            </form>
                        </div>

                        <div class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>

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

                        <div class="widget widget_price">
                            <h3 class="widget-title">Price</h3>

                            <form class="price-range-content">
                                <div class="price-range-bar" id="range-slider"></div>
                                <div class="price-range-filter">
                                    <div class="price-range-filter-item d-flex align-items-center order-1 order-xl-2">
                                        <h4>Range:</h4>
                                        <input type="text" id="price-amount" readonly="">
                                    </div>

                                    <div class="price-range-filter-item price-range-filter-button order-2 order-xl-1">
                                        <button class="btn btn-red btn-icon">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <section class="widget widget_continents">
                            <h3 class="widget-title">Supplier by Continents</h3>

                            <ul class="continents-list-row">
                                <li><a href="#">Asia</a></li>
                                <li class="active"><a href="#">Europe</a></li>
                                <li><a href="#">Africa</a></li>
                                <li><a href="#">Antarctica</a></li>
                                <li><a href="#">North America</a></li>
                                <li><a href="#">South America</a></li>
                                <li><a href="#">Oceania</a></li>
                            </ul>
                        </section>

                        <div class="widget widget_best-seller-products">
                            <h3 class="widget-title">Best Seller</h3>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="products-details.html">Action Camera</a>
                                    </h4>
                                    <span>June 10, 2024</span>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                </div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="products-details.html">Digital Camera</a>
                                    </h4>
                                    <span>June 10, 2024</span>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                </div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="products-details.html">Wireless Headphone</a>
                                    </h4>
                                    <span>June 10, 2024</span>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                </div>
                            </article>
                        </div>

                        <div class="widget widget_arrival">
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
                    </aside>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="products-filter-options">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-4">
                                <div class="d-lg-flex d-md-flex align-items-center">

                                    <span class="sub-title d-none d-lg-block d-md-block">View:</span>

                                    <div class="view-list-row d-none d-lg-block d-md-block">
                                        <div class="view-column">
                                            <a href="#" class="icon-view-two">
                                                <span></span>
                                                <span></span>
                                            </a>

                                            <a href="#" class="icon-view-three active">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <p>Showing 1 – 18 of 100</p>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="products-ordering-list">
                                    <select>
                                        <option>Sort by price: low to high</option>
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by latest</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="products-collections-filter" class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-1.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-2.jpg"
                                            alt="image"></a>
                                    <div class="tag">Sale</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">Protable Speakers</a>
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-3.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">Gaming Controller</a>
                                    </h3>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                    <span>$100.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-4.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">Camera Lense</a>
                                    </h3>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-5.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">Airpods Pro</a>
                                    </h3>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                    <span>$100.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-6.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">CCtv Camera</a>
                                    </h3>
                                    <ul class="rating">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                    </ul>
                                    <span>$120.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-7.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-8.jpg"
                                            alt="image"></a>
                                    <div class="tag">Sale</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-9.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-10.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-11.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-12.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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
                                    <span>$175.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-13.jpg"
                                            alt="image"></a>
                                    <div class="tag">Sale</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">Wireless Keyboard</a>
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

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-14.jpg"
                                            alt="image"></a>
                                    <div class="tag">Sale</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
                                    <h3>
                                        <a href="products-details.html">Wireless Mouse</a>
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

                        <div class="col-lg-4 col-sm-6 offset-lg-0 offset-md-3">
                            <div class="single-shop-products">
                                <div class="shop-products-image">
                                    <a href="products-details.html"><img src="/ejon/assets/img/shop/shop-15.jpg"
                                            alt="image"></a>
                                    <div class="tag">New</div>
                                    <ul class="shop-action">
                                        <li>
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="flaticon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productsQuickView"><i class="flaticon-view"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shop-products-content">
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

                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <a href="#" class="prev page-numbers">
                                    <i class='flaticon-left-arrow'></i>
                                </a>
                                <a href="#" class="page-numbers">1</a>
                                <span class="page-numbers current" aria-current="page">2</span>
                                <a href="#" class="page-numbers">3</a>
                                <a href="#" class="page-numbers">4</a>
                                <a href="#" class="next page-numbers">
                                    <i class='flaticon-right-arrow'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Area -->
@endsection
