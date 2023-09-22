@extends('user.layouts.app')

@section('title')
    {{ $category->meta_title }}
@endsection

@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('meta_keywords')
    {{ $category->meta_keywords }}
@endsection

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

    {{-- Products --}}
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>


                @livewire('product-index', ['sliders'=> $sliders,'products' => $products,'category' => $category, 'categories' => $categories])

            </div>
        </div>
    </div>
@endsection
