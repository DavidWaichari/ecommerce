<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/bootstrap.min.css">
         <!-- Font Awesome -->
        <link rel="stylesheet" href="/ejon/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/animate.min.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/meanmenu.css">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/boxicons.min.css">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/flaticon.css">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/owl.carousel.min.css">
        <!-- Owl Carousel Default CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/owl.theme.default.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/magnific-popup.min.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/nice-select.min.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/slick.min.css">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/odometer.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/style.css">
        <!-- Dark CSS -->
        <link rel="stylesheet" href="/ejon/assets/css/dark.css">
        <!-- Responsive CSS -->
		<link rel="stylesheet" href="/ejon/assets/css/responsive.css">

		<title>Ejon - Electronics eCommerce HTML Template</title>

        <link rel="icon" type="image/png" href="/ejon/assets/img/favicon.png">
         <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>

        <!-- Start Preloader Area -->
        <div class="preloader">
            <div class="loader">
                <div class="sbl-half-circle-spin">
                    <div></div>
                </div>
            </div>
        </div>
        <!-- End Preloader Area -->

        <!-- Start Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="top-header-content">
                            <span>
                                <i class="flaticon-check"></i>
                                Free shipping on all orders over $50
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <ul class="top-header-optional">
                            <li>
                                <span>
                                    Hotline:
                                    <a href="tel:16545676789">(+1) 654 567 – 6789</a>
                                </span>
                            </li>

                            <li>
                                <i class="bx bxs-lock-alt"></i>
                                <span><a href="login.html">Login</a> Or <a href="register.html">Register</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Header Area -->

        <!-- Start Middle Header Area -->
        <div class="middle-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="middle-header-logo">
                            <a href="index.html">
                                <img src="/ejon/assets/img/logo.png" alt="image">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="middle-header-search">
                            <form>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select>
                                                <option>All Category</option>
                                                <option value="1">Computers</option>
                                                <option value="2">Audio</option>
                                                <option value="2">Home Theater</option>
                                                <option value="3">Laptop</option>
                                                <option value="3">TV</option>
                                                <option value="3">Mobiles</option>
                                                <option value="3">Tablets</option>
                                                <option value="3">Headphone</option>
                                                <option value="3">Earphone</option>
                                                <option value="3">Battery</option>
                                                <option value="3">Watches</option>
                                                <option value="3">Cameras</option>
                                                <option value="3">Accessories</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="search-box">
                                            <input type="text" class="form-control" placeholder="Search product...">
                                            <button type="submit"><i class='bx bx-search'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <ul class="middle-header-optional">
                            <li><a href="wishlist.html"><i class="flaticon-heart"></i></a></li>
                            <li>
                                <a href="cart.html"><i class="flaticon-shopping-cart"></i><span>2</span></a>
                            </li>
                            <li>$275.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Middle Header Area -->

       @yield('content')
        <!-- Start Footer Area -->
        <section class="footer-area pt-50 pb-20" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h2>Get in Touch</h2>

                            <ul class="footer-contact-info">
                                <li>
                                    <span>Address:</span>
                                    <a href="#" target="_blank">4848 Hershell Hollow Road Bothell, WA 89076</a>
                                </li>
                                <li>
                                    <span>Phone:</span>
                                    <a href="tel:+15143214567">+1 (514) 321-4567</a>
                                </li>
                                <li>
                                    <span>Email:</span>
                                    <a href="/cdn-cgi/l/email-protection#cca4a9a0a0a38ca9a6a3a2e2afa3a1"><span class="__cf_email__" data-cfemail="046c6168686b44616e6b6a2a676b69">[email&#160;protected]</span></a>
                                </li>
                            </ul>
                            <ul class="footer-social">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class='bx bxl-pinterest-alt'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h2>Policies</h2>

                            <ul class="quick-links">
                                <li>
                                    <a href="#">Shipping And Delivery</a>
                                </li>
                                <li>
                                    <a href="#">Payment Method</a>
                                </li>
                                <li>
                                    <a href="#">How to Shop</a>
                                </li>
                                <li>
                                    <a href="#">Terms And Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Returns</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h2>Support</h2>

                            <ul class="quick-links">
                                <li>
                                    <a href="#">My Account</a>
                                </li>
                                <li>
                                    <a href="#">Order Tracking</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Customer Services</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Help Desk</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h2>Join Our Newsletter</h2>

                            <div class="newsletter-item">
                                <div class="newsletter-content">
                                    <p>Subscribe to the newsletter for all the latest updates</p>
                                </div>

                                <form class="newsletter-form" data-bs-toggle="validator">
                                    <input type="email" class="input-newsletter" placeholder="Email address" name="EMAIL" required="" autocomplete="off">

                                    <button type="submit">Subscribe</button>
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Footer Area -->

        <!-- Start Copy Right Area -->
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-area-content">
                    <p>
                        Copyright Ejon. All Rights Reserved by
                        <a href="https://envytheme.com/" target="_blank">EnvyTheme</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- End Copy Right Area -->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class='bx bx-up-arrow-alt'></i>
        </div>
        <!-- End Go Top Area -->

        <!-- Start QuickView Modal Area -->
        <div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class='bx bx-x'></i></span>
                    </button>

                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="products-details-image">
                                <ul class="products-details-image-slides">
                                    <li><img src="/ejon/assets/img/quick-view/quick-view-1.jpg" alt="image"></li>
                                    <li><img src="/ejon/assets/img/quick-view/quick-view-2.jpg" alt="image"></li>
                                    <li><img src="/ejon/assets/img/quick-view/quick-view-3.jpg" alt="image"></li>
                                </ul>

                                <div class="slick-thumbs">
                                    <ul>
                                        <li><img src="/ejon/assets/img/quick-view/quick-view-1.jpg" alt="image"></li>
                                        <li><img src="/ejon/assets/img/quick-view/quick-view-2.jpg" alt="image"></li>
                                        <li><img src="/ejon/assets/img/quick-view/quick-view-3.jpg" alt="image"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="product-content">
                                <h3>Bluetooth Headphones</h3>

                                <div class="product-review">
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                </div>

                                <div class="price">
                                    <span class="old-price">$150.00</span>
                                    <span class="new-price">$75.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea com modo consequat.</p>

                                <ul class="products-info">
                                    <li><span>Availability:</span> <a href="#">In stock</a></li>
                                    <li><span>SKU:</span> <a href="#">L458-25</a></li>
                                </ul>

                                <div class="products-color-switch">
                                    <p class="available-color"><span>Color</span> :
                                        <a href="#" style="background: #a53c43;"></a>
                                        <a href="#" style="background: #192861;"></a>
                                        <a href="#" style="background: #c58a84;"></a>
                                        <a href="#" style="background: #ecc305;"></a>
                                        <a href="#" style="background: #000000;"></a>
                                        <a href="#" style="background: #808080;"></a>
                                    </p>
                                </div>

                                <div class="product-quantities">
                                    <span>Quantities:</span>

                                    <div class="input-counter">
                                        <span class="minus-btn">
                                            <i class='bx bx-minus'></i>
                                        </span>
                                        <input type="text" value="1">
                                        <span class="plus-btn">
                                            <i class='bx bx-plus'></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="product-add-to-cart">
                                    <button type="submit" class="default-btn">
                                        <i class="flaticon-shopping-cart"></i>
                                        Add to cart
                                        <span></span>
                                    </button>
                                </div>

                                <div class="products-share">
                                    <ul class="social">
                                        <li><span>Share:</span></li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End QuickView Modal Area -->

        <!-- Jquery Slim JS -->
        <script src="/ejon/assets/js/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="/ejon/assets/js/bootstrap.bundle.min.js"></script>
        <!-- Meanmenu JS -->
        <script src="/ejon/assets/js/jquery.meanmenu.js"></script>
        <!-- Owl Carousel JS -->
        <script src="/ejon/assets/js/owl.carousel.min.js"></script>
        <!-- Magnific Popup JS -->
        <script src="/ejon/assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Nice Select JS -->
        <script src="/ejon/assets/js/jquery.nice-select.min.js"></script>
        <!-- Slick JS -->
        <script src="/ejon/assets/js/slick.min.js"></script>
        <!-- Odometer JS -->
        <script src="/ejon/assets/js/odometer.min.js"></script>
        <!-- Appear JS -->
        <script src="/ejon/assets/js/jquery.appear.js"></script>
        <!-- Jquery Ui JS -->
        <script src="/ejon/assets/js/jquery-ui.min.js"></script>
        <!-- Ajaxchimp JS -->
		<script src="/ejon/assets/js/jquery.ajaxchimp.min.js"></script>
		<!-- Form Validator JS -->
		<script src="/ejon/assets/js/form-validator.min.js"></script>
		<!-- Contact JS -->
        <script src="/ejon/assets/js/contact-form-script.js"></script>
        <!-- Wow JS -->
        <script src="/ejon/assets/js/wow.min.js"></script>
        <!-- Custom JS -->
        <script src="/ejon/assets/js/main.js"></script>
        @yield('scrips')
    </body>
</html>
