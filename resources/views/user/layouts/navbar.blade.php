<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user/cart') }}">
                                <i class="fa fa-shopping-cart"></i> Cart (@livewire('cart-count'))
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user/wishlist') }}">
                                <i class="fa fa-heart"></i> Wishlist (@livewire('wish-list-count'))
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('user/login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('user/register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                            Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ url('user/logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" style="box-shadow: 0px 0px 20px 0px grey">
        <div class="container-fluid col-md-10">
            <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                <h2 class="brand-name">MyShoes</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-5" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ml-5">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black" href="{{ url('/user/home/') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <button class="btn btn-white  border-white" style="font-weight: 600; font-size: 23px "
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </button>
                        <ul class="dropdown-menu dropdown-menu-white">
                            @foreach ($categories as $category)
                                <li>
                                    @if (Auth::check())
                                        <a class="dropdown-item"
                                            href="{{ url('/user/categoriesAuth/' . $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    @else
                                        <a class="dropdown-item"
                                            href="{{ url('/user/categories/' . $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <div class="col-md-3 my-auto">
                    <form role="search">
                        <div class="input-group">
                            <input type="search" placeholder="Search your product" class="form-control" />
                            <button class="btn bg-white border" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
</div>
