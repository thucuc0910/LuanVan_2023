<div>
    <!-- content -->
    <section class="py-5">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row gx-5">
                <aside class="col-md-5 mt-3">
                    <div class="" wire:ignore>
                        @if ($product->productImages)
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $productImage)
                                            <li><img src="{{ asset($productImage->image) }}" /></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="exzoom_nav"></div>
                            </div>
                        @else
                            No Image Added
                        @endif

                    </div>

                </aside>
                <main class="col-md-7 product-view">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $product->name }}
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">
                                    4.5
                                </span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                            <span class="text-success ms-2">In stock</span>
                        </div>

                        <div class="mb-3">
                            @if ($product->selling_price > $product->original_price)
                                <span class="selling-price"
                                    style="font-size: 26px; color: #000; font-weight: 600; margin-right: 8px;">
                                    {{ number_format($product->selling_price) }}</span>VNĐ
                                <span class="original-price"
                                    style="font-size: 18px;color: #937979;font-weight: 400;text-decoration: line-through;">
                                    {{ number_format($product->original_price) }}VNĐ</span>
                            @else
                                <span class="selling-price"
                                    style="font-size: 26px; color: #000; font-weight: 600; margin-right: 8px;">
                                    {{ number_format($product->original_price) }}</span>VNĐ
                            @endif

                        </div>

                        <p>
                            {{ $product->small_description }}
                        </p>

                        {{-- <div class="row">
                                <dt class="col-3">Type:</dt>
                                <dd class="col-9">Regular</dd>
    
                                <dt class="col-3">Color</dt>
                                <dd class="col-9">Brown</dd>
    
                                <dt class="col-3">Material</dt>
                                <dd class="col-9">Cotton, Jeans</dd>
    
                                <dt class="col-3">Brand</dt>
                                <dd class="col-9">Reebook</dd>
                            </div> --}}

                        <hr />

                        <div class=" mb-4">

                            @if ($product->productColors->count() > 0)
                                <div class=" mb-3">
                                    <div class="row">
                                        <label class="mb-2" style="font-weight: bold; font-size: 20px">Size</label>
                                        @foreach ($product->productColors as $colorItem)
                                            <div class=" col-md-3 col-12">
                                                <input wire:click="colorSelected({{ $colorItem->id }})" type="radio"
                                                    name="colorSelection"
                                                    value="{{ $colorItem->id }}">{{ $colorItem->color->name }}
                                            </div>
                                        @endforeach
                                    </div>


                                    @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                        <label class="row btn-sm py-1 mt-2 text-white bg-danger col-md-2"
                                            style="">
                                            Out Stock
                                        </label>
                                    @elseif ($this->prodColorSelectedQuantity > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success col-md-2">
                                            In Stock
                                        </label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success col-md-2">
                                        In Stock
                                    </label>
                                @else
                                    <label class="row btn-sm py-1 mt-2 text-white bg-danger col-md-2" style="">
                                        Out Stock
                                    </label>
                                @endif
                            @endif
                            <!-- col.// -->
                            {{-- <div class="mb-3">
                                <div class="mt-2">
                                    <div class="input-group">
                                        <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                        <input type="text" value="1" class="input-quantity" />
                                        <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- col.// -->
                            <div class="col-md-4 col-6 mb-3">
                                <label class="mb-2 d-block" style="font-weight: bold; font-size: 20px">Quantity</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <button wire:click="decrementQuantity"
                                        class="btn btn-white border border-secondary px-3" type="button"
                                        id="button-addon1" data-mdb-ripple-color="dark">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" wire:click="quantityCount" value="{{ $this->quantityCount }}"
                                        class="form-control text-center border border-secondary" placeholder="14"
                                        aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                    <button wire:click="incrementQuantity"
                                        class="btn btn-white border border-secondary px-3" type="button"
                                        id="button-addon2" data-mdb-ripple-color="dark">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning shadow-0"> Buy now </a>

                        <button type="button" wire:click="addToCart({{ $product->id }})"
                            class="btn btn-primary shadow-0">
                            <i class="me-1 fa fa-shopping-basket"></i>
                            Thêm
                        </button>

                        <button type="button" wire:click.prevent="addToWishList({{ $product->id }})"
                            class="btn btn-light border border-secondary py-2 icon-hover px-3">
                            <span wire:loading.remove wire:target="addToWishList">
                                <i class="me-1 fa fa-heart fa-lg"></i>Yêu thích
                            </span>
                            <span wire:loading wire:target="addToWishList">Adding...</span>
                        </button>
                    </div>
                </main>
            </div>
        </div>
    </section>
    <!-- content description -->
    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                    id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                                    aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                    id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab"
                                    aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                    id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab"
                                    aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                    id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab"
                                    aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                aria-labelledby="ex1-tab-1">
                                <p>
                                    With supporting text below as a natural lead-in to additional content. Lorem ipsum
                                    dolor
                                    sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                    et
                                    dolore magna aliqua. Ut
                                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum
                                    dolore eu fugiat nulla
                                    pariatur.
                                </p>
                                <div class="row mb-2">
                                    <div class="col-12 col-md-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><i class="fas fa-check text-success me-2"></i>Some great feature name
                                                here
                                            </li>
                                            <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit
                                                amet,
                                                consectetur</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in
                                                reprehenderit</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-6 mb-0">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good
                                            </li>
                                            <li><i class="fas fa-check text-success me-2"></i>Some great feature name
                                                here
                                            </li>
                                            <li><i class="fas fa-check text-success me-2"></i>Modern style and design
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table border mt-3 mb-2">
                                    <tr>
                                        <th class="py-2">Display:</th>
                                        <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Processor capacity:</th>
                                        <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Camera quality:</th>
                                        <td class="py-2">720p FaceTime HD camera</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Memory</th>
                                        <td class="py-2">8 GB RAM or 16 GB RAM</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Graphics</th>
                                        <td class="py-2">Intel Iris Plus Graphics 640</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel"
                                aria-labelledby="ex1-tab-2">
                                Tab content or sample information now <br />
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit
                                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in culpa qui
                                officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim
                                ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            </div>
                            <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel"
                                aria-labelledby="ex1-tab-3">
                                Another tab content or sample information now <br />
                                Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi
                                ut aliquip ex ea
                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt
                                mollit anim id est laborum.
                            </div>
                            <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel"
                                aria-labelledby="ex1-tab-4">
                                Some other tab content or sample information now <br />
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit
                                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in culpa qui
                                officia deserunt mollit anim id est laborum.
                            </div>
                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Similar items</h5>
                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1">
                                            Rucksack Backpack Large <br />
                                            Line Mounts
                                        </a>
                                        <strong class="text-dark"> $38.90</strong>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1">
                                            Summer New Men's Denim <br />
                                            Jeans Shorts
                                        </a>
                                        <strong class="text-dark"> $29.50</strong>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for
                                            men
                                            and lady </a>
                                        <strong class="text-dark"> $120.00</strong>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1"> Blazer Suit Dress Jacket for Men,
                                            Blue
                                            color </a>
                                        <strong class="text-dark"> $339.90</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        $(function() {
            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            });
        });
    </script>
@endpush
