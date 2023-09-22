@extends('user.layouts.app')
@section('title', 'Cart page')
{{-- @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here') --}}
@section('content')
    @livewire('cart-show', ['categories' => $categories])
@endsection
