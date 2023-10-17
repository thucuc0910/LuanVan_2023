@extends('user.layouts.app_layout')
@section('title', 'Home Page')

@section('content')

    <!-- Carousel wrapper -->
    <div id="carouselDarkVariant" style="padding-bottom: 50px" class="pb-50 carousel slide carousel-fade carousel-dark"
        data-mdb-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1" aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2" aria-label="Slide 1"></button>
        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            @if ($sliders->count() > 0)
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        @if ($slider->image)
                            <img class="d-block w-100" src="{{ asset('/images/sliders/' . $slider->image) }}"
                                alt="First slide">
                        @endif
                        <div class="carousel-caption d-none d-md-block">
                            <div class="custom-carousel-content">
                                <h1>
                                    {!! $slider->title !!}
                                </h1>
                                <p>
                                    {!! $slider->description !!}
                                </p>
                                <div>
                                    <a href="#" class="btn btn-slider">
                                        Get Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Single item -->
                <div class="carousel-item active">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(19).webp" class="d-block w-100"
                        alt="Motorbike Smoke" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(35).webp" class="d-block w-100"
                        alt="Mountaintop" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(40).webp" class="d-block w-100"
                        alt="Woman Reading a Book" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            @endif

        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev">
            {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
            {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
            <span class="visually-hidden">Next</span>
        </button>

    </div>
    <!-- Carousel wrapper -->



    {{-- Category start --}}
    <div class="container pd-20 card-box mb-30">
        <header class="mb-4">
            <h3 class="d-flex justify-content-center align-items-center">DANH MỤC</h3>
        </header>
        <div class="row">
            @forelse ($categories as $category)
                <div class="col-md-3">
                    <div class="card ">
                        @if (Auth::check())
                            <a href="{{ url('/user/categoriesAuth/' . $category->id) }}">
                                <div class="category-card-img">
                                    <img src="{{ asset('/images/category/' . $category->image) }}" class="w-100"
                                        style=" height: 18rem">
                                </div>
                                <div class="category-card-body ">
                                    <h5 style="padding-left: 1rem">{{ $category->name }}</h5>
                                </div>
                            </a>
                        @else
                            <div class="category-card-img">
                                <a href="{{ url('/user/categories/' . $category->id) }}">

                                    <img src="{{ asset('/images/category/' . $category->image) }}" class="w-100"
                                        style=" height: 18rem">
                                </a>

                            </div>
                            <div class="category-card-body ">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-md-12 ">
                    <h5>No Categories Available</h5>
                </div>
            @endforelse
        </div>
    </div>
    {{-- Category end --}}

    <!-- Products -->
    <div class="container" style="padding-bottom: 50px;padding-top: 20px ">
        <header class="mb-4">
            <h3>New products</h3>
        </header>

        <div class="row col-md-12">
            @forelse ($products as $product)
                <div class="row- col-md-4 cols-md-3 g-4 pt-50">
                    <div class="card h-100 ">
                        @if ($product->productImages->Count() > 0)
                            @if (Auth::check())
                                <a href="{{ url('/user/categoriesAuth/' . $product->category_id . '/' . $product->id) }}">
                                    <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top" />
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if (Auth::check())
                                            <a
                                                href="{{ url('/user/categoriesAuth/' . $product->category_id . '/' . $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        @else
                                            <a
                                                href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        @endif
                                    </h5>
                                    <div>
                                        @if ($product->selling_price > $product->original_price)
                                            <strong
                                                class="selling-price">{{ number_format($product->selling_price) }}VNĐ</strong>
                                            <strong
                                                class="original-price">{{ number_format($product->original_price) }}VNĐ</strong>
                                        @else
                                            <strong
                                                class="selling-price">{{ number_format($product->original_price) }}VNĐ</strong>
                                        @endif
                                    </div>
                                    <p class="card-text">
                                        This is a longer card with supporting text below as a natural lead-in to
                                        additional content. This content is a little bit longer.
                                    </p>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            @else
                                <a href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                    <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top" />
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if (Auth::check())
                                            <a
                                                href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        @else
                                            <a
                                                href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        @endif
                                    </h5>
                                    <div>
                                        @if ($product->selling_price > $product->original_price)
                                            <strong
                                                class="selling-price">{{ number_format($product->selling_price) }}VNĐ</strong>
                                            <strong
                                                class="original-price">{{ number_format($product->original_price) }}VNĐ</strong>
                                        @else
                                            <strong
                                                class="selling-price">{{ number_format($product->original_price) }}VNĐ</strong>
                                        @endif
                                    </div>
                                    <p class="card-text">
                                        This is a longer card with supporting text below as a natural lead-in to
                                        additional content. This content is a little bit longer.
                                    </p>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Products Available for {{ $category->name }}</h4>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
    <!-- Products -->


    <!-- Feature -->
    <section class="mt-5" style="background-color: #f5f5f5;">
        <div class="container text-dark pt-3">
            <header class="pt-4 pb-3">
                <h3>Why choose us</h3>
            </header>

            <div class="row mb-4">
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-camera-retro fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Reasonable prices</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-star fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Best quality</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-plane fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Worldwide shipping</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-users fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Customer satisfaction</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-thumbs-up fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Happy customers</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-box fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Thousand items</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
            </div>
        </div>
        <!-- container end.// -->
    </section>
    <!-- Feature -->

    <!-- Blog -->
    <section class="mt-5 mb-4">
        <div class="container text-dark">
            <header class="mb-4">
                <h3>Blog posts</h3>
            </header>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <article>
                        <a href="#" class="img-fluid">
                            <img class="rounded w-100"
                                src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/1.webp"
                                style="object-fit: cover;" height="160">
                        </a>
                        <div class="mt-2 text-muted small d-block mb-1">
                            <span>
                                <i class="fa fa-calendar-alt fa-sm"></i>
                                23.12.2022
                            </span>
                            <a href="#">
                                <h6 class="text-dark">How to promote brands</h6>
                            </a>
                            <p>When you enter into any new area of science, you almost reach</p>
                        </div>
                    </article>
                </div>
                <!-- col.// -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <article>
                        <a href="#" class="img-fluid">
                            <img class="rounded w-100"
                                src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/2.webp"
                                style="object-fit: cover;" height="160">
                        </a>
                        <div class="mt-2 text-muted small d-block mb-1">
                            <span>
                                <i class="fa fa-calendar-alt fa-sm"></i>
                                13.12.2022
                            </span>
                            <a href="#">
                                <h6 class="text-dark">How we handle shipping</h6>
                            </a>
                            <p>When you enter into any new area of science, you almost reach</p>
                        </div>
                    </article>
                </div>
                <!-- col.// -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <article>
                        <a href="#" class="img-fluid">
                            <img class="rounded w-100"
                                src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/3.webp"
                                style="object-fit: cover;" height="160">
                        </a>
                        <div class="mt-2 text-muted small d-block mb-1">
                            <span>
                                <i class="fa fa-calendar-alt fa-sm"></i>
                                25.11.2022
                            </span>
                            <a href="#">
                                <h6 class="text-dark">How to promote brands</h6>
                            </a>
                            <p>When you enter into any new area of science, you almost reach</p>
                        </div>
                    </article>
                </div>
                <!-- col.// -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <article>
                        <a href="#" class="img-fluid">
                            <img class="rounded w-100"
                                src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/4.webp"
                                style="object-fit: cover;" height="160">
                        </a>
                        <div class="mt-2 text-muted small d-block mb-1">
                            <span>
                                <i class="fa fa-calendar-alt fa-sm"></i>
                                03.09.2022
                            </span>
                            <a href="#">
                                <h6 class="text-dark">Success story of sellers</h6>
                            </a>
                            <p>When you enter into any new area of science, you almost reach</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog -->

@endsection
