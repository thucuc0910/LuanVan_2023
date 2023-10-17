   <div>
       <!-- content -->
       <div class="container">
           @if (session()->has('message'))
               <div class="alert alert-success">
                   {{ session('message') }}
               </div>
           @elseif (session()->has('warning'))
               <div class="alert alert-warning">
                   {{ session('warning') }}
               </div>
           @elseif (session()->has('danger'))
               <div class="alert alert-danger">
                   {{ session('danger') }}
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


                       <hr />

                       <div class=" mb-4">

                           @if ($product->productSizes->count() > 0)

                               <div class=" mb-3">
                                   <div class="row">
                                       <label class="mb-2" style="font-weight: bold; font-size: 20px">Size</label>
                                       @php
                                           $count = 0;
                                       @endphp
                                       @foreach ($product->productSizes as $size)
                                           @php
                                               $count += 1;
                                           @endphp
                                           <div class=" col-md-2 col-12">

                                               <input wire:click="sizeSelected({{ $size->id }})" type="radio"
                                                   name="colorSelection" value="{{ $size->id }}"
                                                   {{ $size->id == $count ? 'checked=""' : '' }}>{{ $size->size->name }}

                                           </div>
                                       @endforeach
                                   </div>

                               </div>
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

                       {{-- <a href="#" class="btn btn-warning shadow-0"> Buy now </a> --}}
                       <button type="button" wire:click="addToCart({{ $product->id }})"
                           class="btn btn-primary shadow-0">
                           <i class="me-1 fa fa-shopping-basket"></i>
                           Thêm
                       </button>

                       <button type="button" wire:click.prevent="addToWishList({{ $product->id }})"
                           class="btn btn-light border border-secondary py-2 icon-hover px-3">
                           <span wire:loading.remove wire:target="addToWishList">
                               <i class="me-1 fa fa-heart fa-lg"></i>
                           </span>
                           <span wire:loading wire:target="addToWishList">Adding...</span>
                       </button>
                   </div>
               </main>
           </div>
       </div>
   </div>

   <!-- content description -->
   <section class="bg-light border-top py-4">
       <div class="container">
           <div class="row gx-4">
               <div class="col-lg-12 mb-4">
                   <div class="border rounded-2 px-3 py-2 bg-white">
                       <!-- Pills navs -->
                       <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                           <li class="nav-item d-flex" role="presentation">
                               <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                   id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                                   aria-controls="ex1-pills-1" aria-selected="true">Thông tin</a>
                           </li>
                           <li class="nav-item d-flex" role="presentation">
                               <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2"
                                   data-mdb-toggle="pill" href="#ex1-pills-2" role="tab"
                                   aria-controls="ex1-pills-2" aria-selected="false">Bình luận</a>
                           </li>
                           <li class="nav-item d-flex" role="presentation">
                               <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                   id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab"
                                   aria-controls="ex1-pills-3" aria-selected="false">Đánh giá</a>
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
                           {{-- thông tin --}}
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
                           {{-- bình luận --}}
                           <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel"
                               aria-labelledby="ex1-tab-2">
                               <div class="row d-flex justify-content-left">
                                   <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="card-body p-4">
                                           <div class="row">
                                               <div class="col">
                                                   @foreach ($product->comments as $comment)
                                                       @if ($comment->comment_reply_id == 0)
                                                           <div class="d-flex flex-start">
                                                               <img class="rounded-circle shadow-1-strong me-3"
                                                                   src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                                                                   alt="avatar" width="65" height="65" />

                                                               <div class="flex-grow-1 flex-shrink-1">
                                                                   <div>
                                                                       <div
                                                                           class="d-flex justify-content-between align-items-left">
                                                                           <p class="mb-0">
                                                                               {{ $comment->user->name }}<span
                                                                                   class="small">- 2
                                                                                   {{ $comment->created_at->format('h:i d-m-y') }}
                                                                               </span>
                                                                           </p>


                                                                       </div>
                                                                       <p class="small mb-0">
                                                                           {!! $comment->comment_body !!}
                                                                       </p>
                                                                   </div>


                                                                   @forelse ($product->comments as $reply)
                                                                       @if ($reply->comment_reply_id == $comment->id)
                                                                           <div class="d-flex flex-start mt-4">
                                                                               <a class="me-3" href="#">
                                                                                   <img class="rounded-circle shadow-1-strong"
                                                                                       src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp"
                                                                                       alt="avatar" width="65"
                                                                                       height="65" />
                                                                               </a>
                                                                               <div class="flex-grow-1 flex-shrink-1">
                                                                                   <div
                                                                                       class="d-flex justify-content-between align-items-left">
                                                                                       <p class="mb-0">
                                                                                           {{ $reply->user->name }}<span
                                                                                               class="small">- 2
                                                                                               {{ $reply->created_at->format('h:i d-m-y') }}
                                                                                           </span>
                                                                                       </p>


                                                                                   </div>
                                                                                   <p class="small mb-0">
                                                                                       {!! $reply->comment_body !!}
                                                                                   </p>
                                                                               </div>
                                                                           </div>
                                                                           {{--  --}}
                                                                       @endif
                                                                   @endforeach

                                                                   <span class="show-reply"
                                                                       style="float: right; cursor: pointer;">Phản
                                                                       hồi</span>

                                                                   <div class="form-group comment-reply-div">
                                                                       <form method="post"
                                                                           action="{{ route('user.commentAuth.reply', $comment->id) }}">
                                                                           @csrf
                                                                           <input type="hidden" name="product_id"
                                                                               value="{{ $product->id }}">

                                                                           <input type="hidden" name="comment_id"
                                                                               value="{{ $comment->id }}">
                                                                           <textarea name="comment_body_reply" id="comment" class="form-control" cols="20" rows="3"
                                                                               placeholder="Enter comment here..."></textarea>
                                                                           <button class="btn btn-sm btn-info mt-3"
                                                                               style="float: right">Reply</button>
                                                                       </form>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       @endif

                                                   @endforeach
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <hr>
                               <div class="card-footer py-5 border-0 ">
                                   @if (Auth::check())
                                       <form action="{{ url('/user/commentAuth') }}" method="post">
                                       @else
                                           <form action="{{ url('/user/comment') }}" method="post">
                                   @endif
                                   @csrf
                                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                                   <div class="d-flex flex-start w-100">
                                       <img class="rounded-circle shadow-1-strong me-3"
                                           src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                           alt="avatar" width="40" height="40" />
                                       <div class="form-outline w-100">
                                           <textarea name="comment_body" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                           <label class="form-label" for="textAreaExample">Message</label>
                                       </div>
                                   </div>
                                   <div class="float-end mt-1 pt-1 ">
                                       <button type="submit" class="btn btn-primary btn-sm">Post
                                           comment</button>
                                       <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                                   </div>
                                   </form>
                               </div>
                           </div>
                           {{-- đánh giá --}}
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
                           {{--  --}}
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
                   </div>
               </div>
               <!-- Pills content -->
           </div>
       </div>
   </section>


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



           $('.comment-reply-div').hide();

           $(document).ready(function() {
               $('.show-reply').click(function() {

                   $(this).next('.comment-reply-div').toggle('swing');

                   // $('.comment-reply-div').show();
               });

           });


           $('html, body').animate({
               scrollTop: $("#comment-section").offset().top
           }, 2000);
       </script>
   @endpush
