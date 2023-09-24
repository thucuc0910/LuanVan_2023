@extends('user.layouts.app_layout')

@section('content')
    <!-- sidebar + content -->
    <section class="" style="padding-top: 2rem">
        <div class="container">
            <div class="row">
                <div class="row">
                    
                    <!-- content -->
                    <div class="col-lg-12">
                        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                            <strong class="d-block py-2">{{ $searchProducts->count()}} sản phẩm được tìm thấy</strong>
                        </header>

                        <div class="row">
                            @forelse ($searchProducts as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">

                                    <div class="card w-100 my-2 shadow-2-strong">

                                        @if ($product->productImages->Count() > 0)
                                            @if (Auth::check())
                                                <a
                                                    href="{{ url('/user/categoriesAuth/' . $product->category_id . '/' . $product->id) }}">
                                                    <img src="{{ asset($product->productImages[0]->image) }}"
                                                        alt="{{ $product->name }}" class="object-fit-cover  card-img-top">
                                                </a>
                                            @else
                                                <a
                                                    href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                                    <img src="{{ asset($product->productImages[0]->image) }}"
                                                        alt="{{ $product->name }}" class="object-fit-cover  card-img-top">
                                                </a>
                                            @endif
                                        @endif
                                        <div class="card-body d-flex flex-column">
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
                                            <div class="d-flex flex-row">
                                                @if ($product->selling_price < $product->original_price)
                                                    <h5 class="mb-1 me-1">{{ number_format($product->selling_price) }}VNĐ
                                                    </h5>
                                                    <span
                                                        class="text-danger"><s>{{ number_format($product->original_price) }}VNĐ</s></span>
                                                @else
                                                    <h5 class="mb-1 me-1">{{ number_format($product->original_price) }}VNĐ
                                                    </h5>
                                                @endif
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-d-12">
                                    <div class="p-2">
                                        {{-- <h4>No Products Available for {{ $category->name }}</h4> --}}
                                        <h4>Không tìm thấy sản phẩm</h4>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <hr>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar + content -->
@endsection
