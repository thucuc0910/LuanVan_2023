<div>
    <!-- cart + summary -->
    <section class="bg-light my-5 bg-white">
        <div class="container bg-white">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Giỏ hàng</h4>
                            @forelse ($carts as $cart)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                @if ($cart->product->productImages)
                                                    <img src="{{ asset($cart->product->productImages[0]->image) }}"
                                                        class="border rounded me-3" style="width: 96px; height: 96px;">
                                                @else
                                                    <img src="" style="width: 100px; height: 100px"
                                                        alt="">
                                                @endif
                                                <div class="">
                                                    <a href="#" class="nav-link">{{ $cart->product->name }}</a>
                                                    @if ($cart->productSize)
                                                        <p class="text-muted">{{ $cart->productSize->size->name }}</p>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="" style="padding-top: 0.5rem">
                                            <div class="col-md-2 my-auto pr-5">
                                                <div class="input-group " style="width: 140px;">
                                                    <button wire:loading.attr='disabled'
                                                        wire:click.defer="decrementQuantity({{ $cart->id }})"
                                                        class="btn btn-white border border-secondary " type="button"
                                                        id="button-addon1" data-mdb-ripple-color="dark">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input type="text" wire:click="quantityCount"
                                                        value="{{ $cart->quantity }}"
                                                        class="form-control text-center border border-secondary"
                                                        placeholder="14" aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1" />
                                                    <button wire:loading.attr='disabled'
                                                        wire:click.defer="incrementQuantity({{ $cart->id }})"
                                                        class="btn btn-white border border-secondary" type="button"
                                                        id="button-addon2" data-mdb-ripple-color="dark">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="" style="padding-left: 0.5rem">
                                            @if ($cart->product->selling_price < $cart->product->original_price)
                                                <text class="h6">{{ number_format($cart->product->selling_price) }}
                                                    VNĐ</text> <br>
                                                <small class="text-muted text-nowrap">
                                                    {{ number_format($cart->product->original_price) }} VNĐ </small>
                                                @php
                                                    $totalPrice += $cart->product->original_price * $cart->quantity;
                                                @endphp
                                            @else
                                                <text class="h6">{{ number_format($cart->product->original_price) }}
                                                    VNĐ</text> <br>

                                                @php
                                                    $totalPrice += $cart->product->selling_price * $cart->quantity;
                                                @endphp
                                            @endif


                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <div class="col-md-1 col-5 my-auto">
                                                <div class="remove">
                                                    <button type="button"
                                                        wire:click.defer="removeCartListITem({{ $cart->id }})"
                                                        class="btn btn-danger btn-dm">
                                                        <span>
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                        {{-- <span wire:loading.remove>
                                                            <i class="fa fa-trash"></i>
                                                        </span> --}}
                                                        {{-- <span wire:loading.defer wire:target="removeWishListITem">Đang
                                                            xóa...</span> --}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div>Giỏ hàng trống</div>
                            @endforelse
                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut
                                aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <strong class="form-label">Mã giảm giá</strong>
                                    <div class="input-group">
                                        <input wire:model="coupon" type="text" class="form-control border"
                                            name="coupon" id="coupon" placeholder="Vui lòng nhập mã giảm giá"
                                            value="">
                                        {{-- <button wire:loading.attr='disabled' wire:click="applyCoupon"
                                                class="btn btn-light border">Apply</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @php
                        $totalDiscount = 0;
                        $totalPriceDiscount = 0;
                    @endphp
                    @if ($searchCoupon != null)
                        @if ($searchCoupon->coupon_type == 'Percentage')
                            @php
                                $totalDiscount = ($totalPrice * $searchCoupon->amount) / 100;
                                $totalPriceDiscount = $totalPrice - $totalDiscount;
                            @endphp
                        @else
                            @php
                                $totalPrice = $totalPrice - $searchCoupon->mount;
                            @endphp
                        @endif
                    @endif
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <form action="{{ url('/user/checkout') }}" method="GET">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Tổng tiền:</p>
                                    <p class="mb-2">{{ number_format($totalPrice) }} VNĐ</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Giảm:</p>
                                    <span name="couponDiscount" class="mb-2 text-success"
                                        style="color: red">-{{ number_format($totalDiscount) }} VNĐ</span>
                                        
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Tổng:</p>
                                    <p class="mb-2 fw-bold">
                                        @if ($totalPriceDiscount > 0)
                                            <p class="mb-2">{{ number_format($totalPriceDiscount) }} VNĐ</p>
                                        @else
                                            <p class="mb-2">{{ number_format($totalPrice) }} VNĐ</p>
                                        @endif
                                    </p>
                                </div>

                                <div style="display:none">
                                    <input id="search-input" name="couponDiscount" type="text" value="{{$totalDiscount}}">
                                    <input id="search-input" name="totalPrice" type="text" value="{{$totalPriceDiscount}}">
                                    <input id="search-input" name="totalPriceDiscount" type="text" value="{{$totalPrice}}">
            
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success w-100 shadow-0 mb-2">
                                        Thanh Toán
                                    </button>
                                </div>
                            </form>
                            <div class="">
                                {{-- <a href="{{ url('/user/checkout') }}"
                                        class="btn btn-success w-100 shadow-0 mb-2">Thanh
                                        Toán</a> --}}
                                <a href="{{ url('/user/homeAuth') }}" class="btn btn-light w-100 border mt-2"> Back
                                    to
                                    shop </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
    <!-- cart + summary -->

    <!-- Recommended -->
    {{-- <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>Recommended items</h3>
            </header>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                        <div class="mask px-2" style="height: 50px;">
                            <div class="d-flex justify-content-between">
                                <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                                <a href="#"><i
                                        class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                            </div>
                        </div>
                        <a href="#" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/7.webp"
                                class="card-img-top rounded-2">
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="#" class="nav-link">Gaming Headset with Mic</a>
                            <div class="price-wrap mb-2">
                                <strong class="">$18.95</strong>
                                <del class="">$24.99</del>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                        <div class="mask px-2" style="height: 50px;">
                            <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                        <a href="#" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp"
                                class="card-img-top rounded-2">
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="#" class="nav-link">Apple Watch Series 1 Sport </a>
                            <div class="price-wrap mb-2">
                                <strong class="">$120.00</strong>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0">
                        <div class="mask px-2" style="height: 50px;">
                            <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                        <a href="#" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp"
                                class="card-img-top rounded-2">
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="#" class="nav-link">Men's Denim Jeans Shorts</a>
                            <div class="price-wrap mb-2">
                                <strong class="">$80.50</strong>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0">
                        <div class="mask px-2" style="height: 50px;">
                            <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                        <a href="#" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                class="card-img-top rounded-2">
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="#" class="nav-link">Mens T-shirt Cotton Base Layer Slim fit </a>
                            <div class="price-wrap mb-2">
                                <strong class="">$13.90</strong>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Recommended -->
</div>
