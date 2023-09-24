@extends('user.layouts.app_layout')
@section('title', isset($pageTitle) ? $pageTitle : 'WishList Index')
@section('content')
    <div class="pd-20 card-box mb-30">
        @livewire('wish-list-show')
    </div>
@endsection