@extends('user.layouts.app')
@section('title', 'Home Page')

@section('content')
    {{-- Slider  --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($slider->image)
                        <img class="d-block w-100" src="{{ asset('/images/sliders/' . $slider->image) }}" alt="First slide">
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
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Categories --}}
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse ($categories as $category)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            @if (Auth::check())
                                <a href="{{ url('/user/categoriesAuth/' . $category->slug) }}">
                                    <div class="category-card-img">
                                        <img src="{{ asset('/images/category/' . $category->image) }}" class="w-100"
                                            alt="Laptop">
                                    </div>
                                    <div class="category-card-body">
                                        <h5>{{ $category->name }}</h5>
                                    </div>
                                </a>
                            @else
                                <a href="{{ url('/user/categories/' . $category->slug) }}">
                                    <div class="category-card-img">
                                        <img src="{{ asset('/images/category/' . $category->image) }}" class="w-100"
                                            alt="Laptop">
                                    </div>
                                    <div class="category-card-body">
                                        <h5>{{ $category->name }}</h5>
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No Categories Available</h5>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    {{-- Products --}}
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>

                @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Stock</label>
                                @endif

                                @if ($product->productImages->Count() > 0)
                                    @if (Auth::check())
                                        <a
                                            href="{{ url('/user/categoriesAuth/' . $product->category_id . '/' . $product->id) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    @else
                                        <a
                                            href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $category->name }}</p>
                                <h5 class="product-name">
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
                                        <span 
                                            class="selling-price">{{ number_format($product->selling_price) }}</span>VNĐ
                                        <span
                                            class="original-price">{{ number_format($product->original_price) }}VNĐ</span>
                                    @else
                                        <span
                                            class="selling-price">{{ number_format($product->original_price) }}</span>VNĐ
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-d-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse

                {{-- @livewire('user.product.index', ['category' => $category, 'categories' => $categories]) --}}

            </div>
        </div>
    </div>

@endsection
