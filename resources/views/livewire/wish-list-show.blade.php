<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h3>Sản phẩm yêu thích</h3>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @foreach ($wishlist as $wishlistItem)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        @if (Auth::check())
                                            <a
                                                href="{{ url('/user/categoriesAuth/' . $wishlistItem->product->category->id . '/' . $wishlistItem->product->id) }}">
                                                <label class="product-name">
                                                    <img src="{{ asset($wishlistItem->product->productImages[0]->image) }}"
                                                        style="width: 100px; height: 100px" alt="">
                                                    {{ $wishlistItem->product->name }}
                                                </label>
                                            </a>
                                        @else
                                            <a
                                                href="{{ url('/user/categoriesAuth/' . $wishlistItem->product->category->id) }}">
                                                <label class="product-name">
                                                    <img src="{{ asset($wishlistItem->product->productImages[0]->image) }}"
                                                        style="width: 100px; height: 100px" alt="">
                                                    {{ $wishlistItem->product->name }}
                                                </label>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label
                                            class="price">{{ number_format($wishlistItem->product->original_price) }}
                                            VNĐ</label>
                                    </div>
                                    <div class="col-md-4 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button"
                                                wire:click="removeWishListITem({{ $wishlistItem->id }})"
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
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
