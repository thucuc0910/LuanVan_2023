@extends('user.layouts.app')
@section('title', 'Cart page')
@section('content')
    @livewire('checkout-show', ['categories' => $categories])
@endsection
