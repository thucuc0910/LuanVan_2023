<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css') }}">
    
    {{-- Exzoom --}}
    <link rel="stylesheet" href="{{ asset('extra_assets/exzoom/jquery.exzoom.css') }}">
     
    {{-- Other --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    
    <!-- Scripts -->

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    @livewireStyles

    @stack('styleSheet')
</head>

<body>
    <div id="app">

        @include('user.layouts.navbar')

        <main class="">
            @yield('content')
        </main>
    </div>

    <div>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading">Funda E-Commerce</h4>
                        <div class="footer-underline text-white"></div>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="" class="text-white">Home</a></div>
                        <div class="mb-2"><a href="" class="text-white">About Us</a></div>
                        <div class="mb-2"><a href="" class="text-white">Contact Us</a></div>
                        <div class="mb-2"><a href="" class="text-white">Blogs</a></div>
                        <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="" class="text-white">Collections</a></div>
                        <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                        <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                        <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                        <div class="mb-2"><a href="" class="text-white">Cart</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Reach Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i> #444, some main road, some area, some street,
                                bangalore, india - 560077
                            </p>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-phone"></i> +91 888-XXX-XXXX
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-envelope"></i> fundaofwebit@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; 2022 - Funda of Web IT - Ecommerce. All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-media">
                            
                            <span class="text-white">Get Connected:</span>
                            <a href=""><i class="text-white fa fa-facebook"></i></a>
                            <a href=""><i class="text-white fa fa-twitter"></i></a>
                            <a href=""><i class="text-white fa fa-instagram"></i></a>
                            <a href=""><i class="text-white fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery-3.7.0.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier', 'position', 'top-center');
            // alertify.success(event.detail.text);
            alertify.notify(event.detail.text, event.detail.type, event.detail.status);
        });
    </script>
    {{-- Exzoom --}}
    <script src="{{ asset('extra_assets/exzoom/jquery.exzoom.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- js -->
    @yield('script')
    @livewireScripts
    @stack('scripts')
</body>



</html>
