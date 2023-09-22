<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h3>Giỏ hàng của tôi</h3>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Color</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($carts as $cart)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-5 my-auto">
                                        <a
                                            href="{{ url('/user/categoriesAuth/' . $cart->product->category->id . '/' . $cart->product->id) }}"">
                                            <label class="product-name">
                                                @if ($cart->product->productImages)
                                                    <img src="{{ asset($cart->product->productImages[0]->image) }}"
                                                        style="width: 100px; height: 100px" alt="">
                                                    {{ $cart->product->name }}
                                                @else
                                                    <img src="" style="width: 100px; height: 100px" alt="">
                                                @endif

                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <a href="{{ url('/user/categoriesAuth/' . $cart->product->category->id) }}">
                                            <label class="price">
                                                @if ($cart->productColor)
                                                    <span>
                                                        Color: {{ $cart->productColor->Color->name }}
                                                    </span>
                                                @endif
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">
                                            @if ($cart->product->selling_price < $cart->product->original_price)
                                                {{ number_format($cart->product->original_price) }}
                                                @php
                                                    $totalPrice += $cart->product->original_price * $cart->quantity;
                                                @endphp
                                            @else
                                                {{ number_format($cart->product->selling_price) }}
                                                @php
                                                    $totalPrice += $cart->product->selling_price * $cart->quantity;
                                                @endphp
                                            @endif
                                        </label> VNĐ
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <div class="input-group " style="width: 140px;">
                                            <button wire:loading.attr='disabled'
                                                wire:click="decrementQuantity({{ $cart->id }})"
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
                                                wire:click="incrementQuantity({{ $cart->id }})"
                                                class="btn btn-white border border-secondary" type="button"
                                                id="button-addon2" data-mdb-ripple-color="dark">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <div class="col-md-1 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeCartListITem({{ $cart->id }})"
                                                class="btn btn-danger btn-dm">
                                                <span wire:loading.remove>
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <span wire:loading wire:target="removeWishListITem">Đang xóa...</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div>Giỏ hàng trống</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h4>
                        Nhận được những ưu đãi đãi tốt nhất <a href="{{ url('/user/home/') }}">Cửa hàng</a>
                    </h4>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Tổng:
                            <span class="float-end">
                                {{ number_format($totalPrice) }} VNĐ
                            </span>
                        </h4>
                        <hr>
                        <a href="{{ url('/user/checkout') }}" class="btn btn-warning w-100">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
