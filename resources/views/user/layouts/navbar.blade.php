@section('style')
    <style>

    </style>
@endsection

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top "
    style="display: block; padding: 1rem; font-size: 1.2rem">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15"
                    alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" style="color: black" href="{{ url('/user/home/') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    {{-- <button class="btn btn-white  border-white pt-3" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </button> --}}
                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false" style="color: black">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu dropdown-menu-white">
                        @foreach ($categories as $category)
                            <li>
                                @if (Auth::check())
                                    <a class="dropdown-item" style="color: black"
                                        href="{{ url('/user/categoriesAuth/' . $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                @else
                                    <a class="dropdown-item" style="color: black"
                                        href="{{ url('/user/categories/' . $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: black" href="{{ url('/user/blog/') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: black" href="#">Giới thiệu</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        {{-- search --}}

        <form action="{{ url('user/search') }}" method="GET" class="d-flex input-group w-auto">
            <input type="search" name="search" value="" class="form-control rounded" placeholder="Search"
                aria-label="Search" aria-describedby="search-addon" />
            {{-- <button class="btn btn-white input-group-text border-0" type="submit" id="search-addon">
                    <i class="fas fa-search"></i>
                </button> --}}
        </form>

        @if (Auth::check())
            <form id="search-form" action="{{ url('/user/searchProductMicrophoneAuth') }}" class="d-flex "
                method="get">
                <div class="btn btn-white input-group-text border-0" type="submit" id="">
                    <div style="display:none">
                        <input id="search-input" name="keywork" type="text">

                    </div>
                    <span class="microphone">
                        <i class="fas fa-microphone"></i>
                        <span class="recording-icon"></span>
                    </span>
                </div>
            </form>
        @else
            <form id="search-form" action="{{ url('/user/searchProductMicrophone') }}" class="d-flex "
                method="get">
                <div class="btn btn-white input-group-text border-0" type="submit" id="">
                    <div style="display:none">
                        <input id="search-input" name="keywork" type="text">

                    </div>
                    <span class="microphone">
                        <i class="fas fa-microphone"></i>
                        <span class="recording-icon"></span>
                    </span>
                </div>
            </form>
        @endif



        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            {{-- Cart --}}
            <li class="nav-item" style="list-style-type: none">
                <a class="nav-link me-3" href="{{ url('user/cart') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span style="font-size: 0.7rem"
                        class="badge rounded-pill badge-notification bg-danger">@livewire('cart-count')</span>
                </a>
            </li>

            <!-- Notifications -->
            <div class="dropdown">
                <a class=" nav-link me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span style="font-size: 0.7rem" class="badge rounded-pill badge-notification bg-danger ">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>

            <!-- Wishlist -->
            <li class="nav-item" style="list-style-type: none">
                <a class="nav-link me-3" href="{{ url('user/wishlist') }}">
                    <i class="fa fa-heart"></i>
                    <span style="font-size: 0.7rem"
                        class="badge rounded-pill badge-notification bg-danger">@livewire('wish-list-count')</span>
                </a>
            </li>

            @guest
                @if (Route::has('login'))
                    <li class="nav-item " style="list-style-type: none">
                        <a class="nav-link" href="{{ url('user/login') }}">
                            {{-- <i class="fas fa-user"></i>  --}}
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item" style="list-style-type: none">
                        <a class="nav-link" href="{{ url('/user/register') }}"></a>
                    </li>
                @endif
            @else
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ url('user/logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest

        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>


@section('script')
@endsection
