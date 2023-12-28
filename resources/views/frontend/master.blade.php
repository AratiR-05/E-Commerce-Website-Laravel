<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/capitalshop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 07:23:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop | E-Commerce</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend/assets/img/icon/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
    <style>
        .ctotal {
            transition: all .4s ease-out 0s;


            background: #FF2020;
            color: #fff !important;
            text-align: center;
            border-radius: 50%;
            font-size: 12px !important;
            top: -7px !important;
            right: 0px !important;
            padding: 1px 7px !important;
        }
    </style>
    <script nonce="bbf063ac-af54-4838-8ef6-44f53e30cd8c">
        (function(w, d) {
            ! function(j, k, l, m) {
                j[l] = j[l] || {};
                j[l].executed = [];
                j.zaraz = {
                    deferred: [],
                    listeners: []
                };
                j.zaraz.q = [];
                j.zaraz._f = function(n) {
                    return async function() {
                        var o = Array.prototype.slice.call(arguments);
                        j.zaraz.q.push({
                            m: n,
                            a: o
                        })
                    }
                };
                for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                j.zaraz.init = () => {
                    var q = k.getElementsByTagName(m)[0],
                        r = k.createElement(m),
                        s = k.getElementsByTagName("title")[0];
                    s && (j[l].t = k.getElementsByTagName("title")[0].text);
                    j[l].x = Math.random();
                    j[l].w = j.screen.width;
                    j[l].h = j.screen.height;
                    j[l].j = j.innerHeight;
                    j[l].e = j.innerWidth;
                    j[l].l = j.location.href;
                    j[l].r = k.referrer;
                    j[l].k = j.screen.colorDepth;
                    j[l].n = k.characterSet;
                    j[l].o = (new Date).getTimezoneOffset();
                    if (j.dataLayer)
                        for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                ...x[1],
                                ...y[1]
                            })), {}))) zaraz.set(w[0], w[1], {
                            scope: "page"
                        });
                    j[l].q = [];
                    for (; j.zaraz.q.length;) {
                        const z = j.zaraz.q.shift();
                        j[l].q.push(z)
                    }
                    r.defer = !0;
                    for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith(
                        "_zaraz_"))).forEach((B => {
                        try {
                            j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                        } catch {
                            j[l]["z_" + B.slice(7)] = A.getItem(B)
                        }
                    }));
                    r.referrerPolicy = "origin";
                    r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                    q.parentNode.insertBefore(r, q)
                };
                ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('public/frontend/assets/img/icon/loder.png') }}" alt="loder">
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="header-area">
            <div class="header-top d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Privacy</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </div>
                                <div class="header-info-right d-flex">
                                    <ul class="order-list">
                                        @auth
                                            <li>{{ Auth::user()->name }}</li>
                                        @endauth

                                        <li><a href="#">Track Your Order</a></li>
                                        <li><a href="{{ url('pro_details') }}" onclick="viewAlert()">Wishlist</a></li>
                                    </ul>
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid header-sticky">
                <div class="container">
                    <div class="menu-wrapper">

                        <div class="logo">
                            <a href="{{ url('home') }}"><img
                                    src="{{ asset('public/frontend/assets/img/logo/logo.png') }}" alt></a>
                        </div>
                        @inject('categories', 'App\Http\Controllers\frontend\homeController')
                        @php
                            $datas = $categories::catget();
                        @endphp
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ url('home') }}">Home</a></li>
                                    @foreach ($datas as $data)
                                        <li><a
                                                href="{{ url('categories') }}/{{ $data->name }}">{{ $data->name }}</a>
                                        </li>
                                    @endforeach
                                    <ul class="submenu">
                                        <li><a href="{{ url('login') }}">Login</a></li>
                                        <li><a href="{{ url('cart') }}">Cart</a></li>
                                        <li><a href="{{ url('pro_details') }}">Product Details</a></li>
                                        <li><a href="{{ url('checkout') }}">Product Checkout</a></li>
                                    </ul>
                                    </li>
                                    <li><a href="{{ url('contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch hearer_icon">
                                        <a id="search_1" href="javascript:void(0)">
                                            <span class="flaticon-search"></span>
                                        </a>
                                    </div>
                                </li>
                                @if (Auth::user())
                                    <li> <a href="{{ url('user/logout') }}"><img
                                                src="{{ asset('public\frontend\assets\img\icon\turn-off.png') }}"
                                                style="width:34px;"></a>
                                    </li>
                                @else
                                    <li> <a href="{{ url('login') }}"><span class="flaticon-user"></span></a></li>
                                @endif



                                <li class="cart">
                                    <a href="{{ url('cart') }}">
                                        <span class="flaticon-shopping-cart"></span><span class="ctotal" id="ctotal">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="search_input" id="search_input_box">
                        <form class="search-inner d-flex justify-content-between ">
                            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                            <button type="submit" class="btn"></button>
                            <span class="ti-close" id="close_search" title="Close Search"></span>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
            <div class="header-bottom text-center">
                <p>Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a href="#"
                        class="browse-btn">Shop Now</a></p>
            </div>
        </div>
    </header>

    @yield('body')

    <footer>
        <div class="footer-wrapper gray-bg">
            <div class="footer-area footer-padding">

                <section class="subscribe-area">
                    <div class="container">
                        <div class="row justify-content-between subscribe-padding">
                            <div class="col-xxl-3 col-xl-3 col-lg-4">
                                <div class="subscribe-caption">
                                    <h3>Subscribe Newsletter</h3>
                                    <p>Subscribe newsletter to get 5% on all products.</p>
                                </div>
                            </div>
                            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                                <div class="subscribe-caption">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your email">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-4">

                                <div class="footer-social">
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-20">

                                    <div class="footer-logo mb-35">
                                        <a href="{{ url('home') }}"><img
                                                src="{{ asset('public/frontend/assets/img/logo/logo2_footer.png') }}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Shop Men</h4>
                                    <ul>
                                        <li><a href="#">Clothing Fashion</a></li>
                                        <li><a href="#">Winter</a></li>
                                        <li><a href="#">Summer</a></li>
                                        <li><a href="#">Formal</a></li>
                                        <li><a href="#">Casual</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Shop Women</h4>
                                    <ul>
                                        <li><a href="#">Clothing Fashion</a></li>
                                        <li><a href="#">Winter</a></li>
                                        <li><a href="#">Summer</a></li>
                                        <li><a href="#">Formal</a></li>
                                        <li><a href="#">Casual</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Baby Collection</h4>
                                    <ul>
                                        <li><a href="#">Clothing Fashion</a></li>
                                        <li><a href="#">Winter</a></li>
                                        <li><a href="#">Summer</a></li>
                                        <li><a href="#">Formal</a></li>
                                        <li><a href="#">Casual</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="#">Track Your Order</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Carrier</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i
                                            class="fa fa-heart color-danger" aria-hidden="true"></i> by <a
                                            href="https://colorlib.com/" target="_blank"
                                            rel="nofollow noopener">Colorlib</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <a class="wrapper" title="Go to Top" href="#">
            <div class="arrows-container">
                <div class="arrow arrow-one">
                </div>
                <div class="arrow arrow-two">
                </div>
            </div>
        </a>
    </div>


    <script src="{{ asset('public/frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.slicknav.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/price_rangs.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/js/contact.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        function getCategory() {

        }
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"7fa122296efdf3d5","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>


    <script>
        getcartcount();

        function getcartcount() {
            console.log('t5est5');
            $.get("{{ url('subtotal') }}", function(response) {
                console.log(response);
                if (response.success) {
                    $('#ctotal').html(response.totalcart);
                } else {
                    $('#ctotal').html(0);
                }
            })
        }
    </script>

    @stack('js');
</body>


</html>
