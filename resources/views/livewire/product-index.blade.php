<div>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Giá sản phẩm</h4>
                </div>
                <div class="card-body">
                    <label for="" class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low">Giảm dần
                    </label>
                    <label for="" class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high">Tăng dần
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Stock</label>
                                @endif

                                @if ($product->productImages->Count() > 0)
                                    @if (Auth::check())
                                        <a
                                            href="{{ url('/user/categoriesAuth/' . $product->category_id . '/' . $product->id) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    @else
                                        <a
                                            href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $category->name }}</p>
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
                                <div>
                                    @if ($product->selling_price > $product->original_price)
                                        <span 
                                            class="selling-price">{{ number_format($product->selling_price) }}</span>VNĐ
                                        <span
                                            class="original-price">{{ number_format($product->original_price) }}VNĐ</span>
                                    @else
                                        <span
                                            class="selling-price">{{ number_format($product->original_price) }}</span>VNĐ
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-d-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
