<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Homepage v4 - eCommerce HTML Template - FreshCart</title>
    <link href="/theme/css/tiny-slider.css" rel="stylesheet">
    <link href="/theme/css/slick.css" rel="stylesheet">
    <link href="/theme/css/slick-theme.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Libs CSS -->
    <link href="/theme/css/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/theme/css/feather-icons.css" rel="stylesheet">
    <link href="/theme/css/simplebar.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/theme/css/theme.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/theme/plugins/fontawesome-free/css/all.min.css">

    <script async="" src="https://www.clarity.ms/tag/kuc8w5o9nt"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
     <!-- Scripts -->
     {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
     {{-- @vite(['resources/sass/app.scss']) --}}
</head>

<body>
    <!-- navigation -->
    <header class="py-lg-5 py-4 border-bottom border-bottom-lg-0">
        <div class="container">
            <div class="row w-100 align-items-center gx-3">
                <div class="col-xl-7 col-lg-8">
                    <div class="d-flex align-items-center">
                        <a class="navbar-brand d-none d-lg-block" href="../index.html">
                            <img src="/theme/images/freshcart-logo.svg" alt="eCommerce HTML Template">
                        </a>
                        <div class="w-100 ms-4 d-none d-lg-block">
                            <form action="#">
                                <div class="input-group">
                                    <input class="form-control rounded" type="search"
                                        placeholder="Search for products">
                                    <span class="input-group-append">
                                        <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                </line>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center w-100 d-lg-none">
                        <a class="navbar-brand mb-0" href="../index.html">
                            <img src="/theme/images/freshcart-logo.svg" alt="eCommerce HTML Template">
                        </a>

                        <div class="d-flex align-items-center lh-1">
                            <div class="list-inline me-4">
                                <div class="list-inline-item">
                                    <!-- Button trigger modal -->
                                    <a href="#" class="text-reset d-none d-md-block" data-bs-toggle="modal"
                                        data-bs-target="#locationSecondModal">
                                        <i class="feather-icon icon-map-pin me-2"></i>
                                        Set A Location
                                    </a>
                                </div>
                                <div class="list-inline-item">
                                    <div class="dropdown">
                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-shopping-cart align-text-bottom">
                                                    <circle cx="9" cy="21" r="1"></circle>
                                                    <circle cx="20" cy="21" r="1"></circle>
                                                    <path
                                                        d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                    </path>
                                                </svg>
                                            </span>

                                            <span>${{$cart}}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-5">
                                            <div
                                                class="d-flex justify-content-between align-items-center border-bottom pb-5 mb-3">
                                                <div>
                                                    <span><i class="feather-icon icon-shopping-cart"></i></span>
                                                    <span class="text-success">3</span>
                                                </div>
                                                <div>
                                                    <span>Total:</span>
                                                    <span class="text-success">$105.00</span>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 py-3">
                                                    <div class="row align-items-center g-0">
                                                        <div class="col-lg-3 col-3 text-center">
                                                            <!-- img -->
                                                            <img src="/theme/images/product-img-1.jpg" alt="Ecommerce"
                                                                class="icon-xxl">
                                                        </div>
                                                        <div class="col-lg-7 col-7">
                                                            <!-- title -->
                                                            <a href="../pages/shop-single.html" class="text-inherit">
                                                                <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
                                                            </a>
                                                            <small class="text-muted">1 x $35.00</small>
                                                        </div>

                                                        <!-- price -->
                                                        <div class="text-end col-lg-2 col-2">
                                                            <a href="#" class="text-inherit"
                                                                aria-label="Close"><i class="bi bi-x fs-4"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 py-3">
                                                    <div class="row align-items-center g-0">
                                                        <div class="col-lg-3 col-3 text-center">
                                                            <!-- img -->
                                                            <img src="/theme/images/product-img-2.jpg" alt="Ecommerce"
                                                                class="icon-xxl">
                                                        </div>
                                                        <div class="col-lg-7 col-7">
                                                            <!-- title -->
                                                            <a href="../pages/shop-single.html" class="text-inherit">
                                                                <h6 class="mb-0">NutriChoice Digestive</h6>
                                                            </a>
                                                            <small class="text-muted">1 x $29.00</small>
                                                        </div>

                                                        <!-- price -->
                                                        <div class="text-end col-lg-2 col-2">
                                                            <a href="#" class="text-inherit"
                                                                aria-label="Close"><i class="bi bi-x fs-4"></i></a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0 py-3">
                                                    <div class="row align-items-center g-0">
                                                        <div class="col-lg-3 col-3 text-center">
                                                            <!-- img -->
                                                            <img src="/theme/images/product-img-3.jpg" alt="Ecommerce"
                                                                class="icon-xxl">
                                                        </div>
                                                        <div class="col-lg-7 col-7">
                                                            <!-- title -->
                                                            <a href="../pages/shop-single.html" class="text-inherit">
                                                                <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
                                                            </a>
                                                            <small class="text-muted">1 x $29.00</small>
                                                        </div>

                                                        <!-- price -->
                                                        <div class="text-end col-lg-2 col-2">
                                                            <a href="#" class="text-inherit"
                                                                aria-label="Close"><i class="bi bi-x fs-4"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="mt-2 d-grid">
                                                <a href="#" class="btn btn-primary">Checkout</a>
                                                <a href="#" class="btn btn-light mt-2">View Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="bi bi-text-indent-left text-primary"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-4 d-flex align-items-center">
                    <div class="list-inline ms-auto d-lg-block d-none">
                        <div class="list-inline-item me-3">
                            <!-- Button trigger modal -->
                            <a href="#" class="text-reset d-none d-lg-block" data-bs-toggle="modal"
                                data-bs-target="#locationSecondModal">
                                <i class="feather-icon icon-map-pin me-2"></i>
                                Set A Location
                            </a>
                        </div>

                        <div class="list-inline-item me-3">
                            <a href="#!" class="text-reset" data-bs-toggle="modal"
                                data-bs-target="#registerModal">Register</a>
                        </div>

                        <div class="list-inline-item me-3">
                            <div class="dropdown d-none d-xl-block">
                                <a href="#" class="dropdown-toggle text-reset" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-shopping-cart align-text-bottom">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                            </path>
                                        </svg>
                                    </span>

                                    <span>${{$cart}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-5">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-5">
                                        <div>
                                            <span><i class="feather-icon icon-shopping-cart"></i></span>
                                            <span class="text-success">3</span>
                                        </div>
                                        <div>
                                            <span>Total:</span>
                                            <span class="text-success">$105.00</span>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-3">
                                            <div class="row align-items-center g-0">
                                                <div class="col-lg-3 text-center">
                                                    <!-- img -->
                                                    <img src="/theme/images/product-img-1.jpg" alt="Ecommerce"
                                                        class="icon-xxl">
                                                </div>
                                                <div class="col-lg-7">
                                                    <!-- title -->
                                                    <a href="../pages/shop-single.html" class="text-inherit">
                                                        <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
                                                    </a>
                                                    <small class="text-muted">1 x $35.00</small>
                                                </div>

                                                <!-- price -->
                                                <div class="text-end col-lg-2">
                                                    <a href="#" class="text-inherit" aria-label="Close"><i
                                                            class="bi bi-x fs-4"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item px-0 py-3">
                                            <div class="row align-items-center g-0">
                                                <div class="col-lg-3 text-center">
                                                    <!-- img -->
                                                    <img src="/theme/images/product-img-2.jpg" alt="Ecommerce"
                                                        class="icon-xxl">
                                                </div>
                                                <div class="col-lg-7">
                                                    <!-- title -->
                                                    <a href="../pages/shop-single.html" class="text-inherit">
                                                        <h6 class="mb-0">NutriChoice Digestive</h6>
                                                    </a>
                                                    <small class="text-muted">1 x $29.00</small>
                                                </div>

                                                <!-- price -->
                                                <div class="text-end col-lg-2">
                                                    <a href="#" class="text-inherit" aria-label="Close"><i
                                                            class="bi bi-x fs-4"></i></a>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item px-0 py-3">
                                            <div class="row align-items-center g-0">
                                                <div class="col-lg-3 text-center">
                                                    <!-- img -->
                                                    <img src="/theme/images/product-img-3.jpg" alt="Ecommerce"
                                                        class="icon-xxl">
                                                </div>
                                                <div class="col-lg-7">
                                                    <!-- title -->
                                                    <a href="../pages/shop-single.html" class="text-inherit">
                                                        <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
                                                    </a>
                                                    <small class="text-muted">1 x $29.00</small>
                                                </div>

                                                <!-- price -->
                                                <div class="text-end col-lg-2">
                                                    <a href="#" class="text-inherit" aria-label="Close"><i
                                                            class="bi bi-x fs-4"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mt-2 d-grid">
                                        <a href="#" class="btn btn-primary">Checkout</a>
                                        <a href="#" class="btn btn-light mt-2">View Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-inline-item">
                            <a href="../pages/signin.html" class="btn btn-dark d-none d-xl-block">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light navbar-default py-0 py-lg-2 border-top navbar-offcanvas-color"
        aria-label="Offcanvas navbar large">
        <div class="container">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar-default"
                aria-labelledby="navbar-defaultLabel">
                <div class="offcanvas-header pb-1">
                    <a href="./index.html"><img src="/theme/images/freshcart-logo.svg" alt="eCommerce HTML Template"></a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="d-block d-lg-none mb-4">
                        <form action="#">
                            <div class="input-group">
                                <input class="form-control rounded" type="search" placeholder="Search for products">
                                <span class="input-group-append">
                                    <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65">
                                            </line>
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <div class="mt-2">
                            <button type="button" class="btn btn-outline-gray-400 text-muted w-100"
                                data-bs-toggle="modal" data-bs-target="#locationModal">
                                <i class="feather-icon icon-map-pin me-2"></i>
                                Pick Location
                            </button>
                        </div>
                    </div>

                    <div>
                        <ul class="navbar-nav align-items-center">
                            <li class="dropdown me-3 d-none d-lg-block">
                                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-text-left text-white me-2"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                        </path>
                                    </svg>
                                    All Categories
                                </button>

                                <ul class="dropdown-menu dropdown-menu-lg">
                                    @foreach ($categories as $category)
                                    <li class="dropdown-menu-list">
                                        <a href="javascript:void(0)"
                                            class="dropdown-item d-flex justify-content-between mb-1 py-1">
                                            <div>
                                                <i class="fa fa-{{ $category->icon }}"></i>
                                                <span class="ms-1">{{$category->name}}</span>
                                            </div>
                                            <div>
                                                <i class="feather-icon icon-chevron-right"></i>
                                            </div>
                                        </a>

                                        <div class="dropdown-menu-list-submenu">
                                            <div>
                                                <ul class="list-unstyled">
                                                    @foreach ($category->products as $product)
                                                    <li>
                                                        <a href="javascript:void(0)" class="dropdown-item">{{$product->name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                               <a href="/">Home</a>
                            </li>
                            <li class="nav-item dropdown dropdown-fullwidth" style="margin-left:20px">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                                <div class="dropdown-menu pb-0">
                                    <div class="row p-2 p-lg-4">
                                        @foreach ($categories as $category)
                                        <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                            <h6 class="text-primary ps-3">{{$category->name}}</h6>
                                            @foreach ($category->products as $product)
                                                <a class="dropdown-item" href="../pages/shop-grid.html">{{$product->name}}</a>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/shop">Shop</a>
                             </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Location Modal -->
    <div class="modal fade" id="locationSecondModal" tabindex="-1" aria-labelledby="locationSecondModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-5 d-flex align-items-center justify-content-between">
                        <h1 class="modal-title fs-5" id="locationSecondModalLabel">Add Your Location</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="w-100">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" aria-label="Last name" class="form-control w-45"
                                    placeholder="Search for area, location more..">
                                <button class="input-group-text bg-transparent" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="my-10 text-center">
                        <img src="/theme/images/delivery-boy.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light">
                <div class="modal-header bg-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register via Phone Number</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12">
                            <div class="py-6">
                                <h4 class="fs-6 mb-4">Enter your phone number to Signup or Register</h4>
                                <form>
                                    <div class="input-phone mb-2">
                                        <input type="tel" maxlength="10" class="form-control"
                                            pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required="">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Next</button>
                                    </div>
                                </form>

                                <div class="mt-4">
                                    <small>
                                        <a href="#">Terms of Service</a>
                                        <a href="#" class="ms-3">Privacy Policy</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
       @yield('content')
    </main>
    <!-- modal -->

    <!-- Footer -->
    <!-- footer -->
    <footer class="footer bg-dark pb-6 pt-4 pt-md-12">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 col-md-12 col-lg-4">
                    <a href="#"><img src="/theme/images/freshcart-white-logo.svg" alt=""></a>
                </div>
                <div class="col-4 col-md-12 col-lg-8 text-end">
                    <ul class="list-inline text-md-end mb-0 small">
                        <li class="list-inline-item me-2">
                            <a href="#!" class="social-links">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="list-inline-item me-2">
                            <a href="#!" class="social-links">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="social-links">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-lg-8 opacity-25">
            <div class="row g-4">
                <div class="col-12 col-md-12 col-lg-4">
                    <h6 class="mb-4 text-white">Categories</h6>
                    <div class="row">
                        <div class="col-6">
                            <!-- list -->
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Vegetables &amp;
                                        Fruits</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Breakfast &amp;
                                        instant food</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Bakery &amp;
                                        Biscuits</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Atta, rice &amp;
                                        dal</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Sauces &amp;
                                        spreads</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Organic &amp;
                                        gourmet</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Baby care</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Cleaning
                                        essentials</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Personal care</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <!-- list -->
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Dairy, bread &amp;
                                        eggs</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Cold drinks &amp;
                                        juices</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Tea, coffee &amp;
                                        drinks</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Masala, oil &amp;
                                        more</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Chicken, meat &amp;
                                        fish</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Paan corner</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Pharma &amp;
                                        wellness</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Home &amp; office</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Pet care</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="row g-4">
                        <div class="col-6 col-sm-6 col-md-3">
                            <h6 class="mb-4 text-white">Get to know us</h6>
                            <!-- list -->
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Company</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">About</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Blog</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Help Center</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Our Value</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <h6 class="mb-4 text-white">For Consumers</h6>
                            <ul class="nav flex-column">
                                <!-- list -->
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Payments</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Shipping</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Product Returns</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">FAQ</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Shop Checkout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <h6 class="mb-4 text-white">Become a Shopper</h6>
                            <ul class="nav flex-column">
                                <!-- list -->
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Shopper
                                        Opportunities</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Become a Shopper</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Earnings</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Ideas &amp;
                                        Guides</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">New Retailers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <h6 class="mb-4 text-white">Freshcart programs</h6>
                            <ul class="nav flex-column">
                                <!-- list -->
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Freshcart
                                        programs</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Gift Cards</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Promos &amp;
                                        Coupons</a></li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Freshcart Ads</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#!" class="nav-link">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-8 opacity-25">
            <div>
                <div class="row gy-4 align-items-center">
                    <div class="col-md-6">
                        <span class="small text-muted">
                            © 2022
                            <span id="copyright">
                                -
                                <script>
                                    document.getElementById("copyright").appendChild(document.createTextNode(new Date().getFullYear()));
                                </script>2024
                            </span>
                            FreshCart eCommerce HTML Template. All rights reserved. Powered by
                            <a href="https://codescandy.com/">Codescandy</a>
                            .
                        </span>
                    </div>
                    <div class="col-lg-6 text-end mb-2 mb-lg-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item text-light">Payment Partners</li>
                            <li class="list-inline-item">
                                <a href="#!"><img src="/theme/images/amazonpay.svg" alt=""></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><img src="/theme/images/american-express.svg" alt=""></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><img src="/theme/images/mastercard.svg" alt=""></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><img src="/theme/images/paypal.svg" alt=""></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><img src="/theme/images/visa.svg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Javascript-->
    <!-- Libs JS -->
    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="/theme/js/bootstrap.bundle.min.js"></script>
    <script src="/theme/js/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="/theme/js/theme.min.js"></script>

    <script src="/theme/js/jquery.min.js"></script>
    <script src="/theme/js/slick.min.js"></script>
    <script src="/theme/js/slick-slider.js"></script>
    <script src="/theme/js/tiny-slider.js"></script>
    <script src="/theme/js/tns-slider.js"></script>
    <script src="/theme/js/zoom.js"></script>
</body>

</html>
