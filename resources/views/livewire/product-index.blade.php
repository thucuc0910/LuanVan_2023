<div class="row">
    <!-- sidebar -->
    <div class="col-lg-3 ">
        <!-- Toggle button -->
        <button class="btn btn-outline-secondary mb-3 w-100 d-lg-none collapsed" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span>Show filter</span>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button text-dark bg-light" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Brands
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                        aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            <div>
                                <!-- Checked checkbox -->
                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1"
                                    checked=""> --}}

                                    <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low">

                                    <label class="form-check-label" for="flexCheckChecked1">Giảm dần</label>
                                </div>

                                <!-- Checked checkbox -->
                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1"
                                    checked=""> --}}
                                    <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high">
                                    <label class="form-check-label" for="flexCheckChecked1">Tăng dần</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button text-dark bg-light" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseThree" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseThree">
                            Price
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                        aria-labelledby="headingThree">
                        <div class="accordion-body">
                            <div class="range">
                                <form>
                                    <input wire:model="priceRange" name="priceRange" type="range" class="form-range"
                                        id="priceRange">
                                    <span class="thumb" style="left: calc(100% + 0.5px);"><span
                                            class="thumb-value">50</span></span>
                                </form>
                                @if ($priceRange > 0)
                                    {{$priceRange}}
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-0">
                                        Min
                                    </p>
                                    <div class="form-outline">
                                        <input type="number" id="typeNumber" class="form-control">
                                        <label class="form-label" for="typeNumber" style="margin-left: 0px;">$0</label>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 22.4px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">
                                        Max
                                    </p>
                                    <div class="form-outline">
                                        <input type="number" id="typeNumber" class="form-control">
                                        <label class="form-label" for="typeNumber"
                                            style="margin-left: 0px;">$1,0000</label>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 54.4px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-white w-100 border border-secondary">apply</button>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button text-dark bg-light" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseFive" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseFive">
                            Ratings
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show"
                        aria-labelledby="headingThree">
                        <div class="accordion-body">
                            <!-- Default checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                        class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </label>
                            </div>
                            <!-- Default checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                        class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-secondary"></i>
                                </label>
                            </div>
                            <!-- Default checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                        class="fas fa-star text-warning"></i><i
                                        class="fas fa-star text-secondary"></i>
                                    <i class="fas fa-star text-secondary"></i>
                                </label>
                            </div>
                            <!-- Default checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                        class="fas fa-star text-secondary"></i><i
                                        class="fas fa-star text-secondary"></i>
                                    <i class="fas fa-star text-secondary"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <!-- content -->
    <div class="col-lg-9">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
            <strong class="d-block py-2">32 Items found </strong>
            <div class="ms-auto">
                <select class="form-select d-inline-block w-auto border pt-1">
                    <option value="0">Best match</option>
                    <option value="1">Recommended</option>
                    <option value="2">High rated</option>
                    <option value="3">Randomly</option>
                </select>
                <div class="btn-group shadow-0 border">
                    <a href="#" class="btn btn-light" title="List view">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                    <a href="#" class="btn btn-light active" title="Grid view">
                        <i class="fa fa-th fa-lg"></i>
                    </a>
                </div>
            </div>
        </header>

        <div class="row">
            @forelse ($products as $product)
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
                                <a href="{{ url('/user/categories/' . $product->category_id . '/' . $product->id) }}">
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
                                    <h5 class="mb-1 me-1">{{ number_format($product->selling_price) }}VNĐ</h5>
                                    <span
                                        class="text-danger"><s>{{ number_format($product->original_price) }}VNĐ</s></span>
                                @else
                                    <h5 class="mb-1 me-1">{{ number_format($product->original_price) }}VNĐ</h5>
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
                        <h4>No Products Available for {{ $category->name }}</h4>
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
