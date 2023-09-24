@extends('user.layouts.app_layout')

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
    <!-- sidebar + content -->
    <section class="" style="padding-top: 2rem">
        <div class="container">
            <div class="row">
                @livewire('product-index', ['sliders' => $sliders, 'products' => $products, 'category' => $category, 'categories' => $categories])

            </div>
        </div>
    </section>
    <!-- sidebar + content -->
@endsection


