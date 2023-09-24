@extends('user.layouts.app_layout')

@section('title')
    {{ $product->meta_title }}
@endsection

@section('meta_description')
    {{ $product->meta_description }}
@endsection

@section('meta_keywords')
    {{ $product->meta_keywords }}
@endsection
@section('content')
    @livewire('product-detail', ['product' => $product,'categories' => $categories])
@endsection
