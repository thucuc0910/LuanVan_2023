@extends('user.layouts.app_layout')
@section('title', 'Cart page')
{{-- @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here') --}}
@section('content')
    @livewire('cart-show', ['categories' => $categories])
@endsection
