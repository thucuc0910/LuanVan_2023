<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $categories, $product, $productSizeId, $prodSizeSelectedQuantity, $quantityCount = 1;
    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                // session()->flash('message', 'Sản phẩm đã có trong danh sách yêu thích của bạn.');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm đã có trong danh sách yêu thích của bạn.',
                    'type' => 'success',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishListAddedUpdated');

                // session()->flash('message', 'Sản phẩm đã được thêm vào danh sách yêu thích.');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm đã được thêm vào danh sách yêu thích.',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            // session()->flash('message', 'Vui lòng đăng nhập.');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Vui lòng đăng nhập.',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function mount($product, $categories)
    {
        $this->categories = $categories;
        $this->product = $product;
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function sizeSelected($productSizeId)
    {
        // dd('fvdfv');
        // dd($productColor);
        $this->productSizeId = $productSizeId;
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '1')->exists()) {

                $productSize = ProductSize::where('product_id', $productId)->first();
                if ($productSize->quantity > 1) {
                // dd('scsdvdf');

                    if ($this->productSizeId != NULL) {
                        $productSize = $this->product->productSizes()->where('id', $this->productSizeId)->first();
                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Sản phẩm đã được thêm vào.',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        } else {
                            if ($productSize->quantity > 0) {
                                if ($productSize->quantity > $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_size_id' => $this->productSizeId,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Sản phẩm được thêm vào giỏ hàng thành công.',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {

                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Chỉ còn ' . $productSize->quantity . ' sản phẩm khả dụng.',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Hết hàng.',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Vui lòng chọn size sản phẩm.',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm không tồn tại.',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Vui lòng đăng nhập.',
                'type' => 'info',
                'status' => 404
            ]);
            return false;
        }
    }
    public function render()
    {
        $productImages = ProductImage::where('product_id', $this->product->id)->get();
        return view('livewire.product-detail', [
            'categories' => $this->categories,
            'product' => $this->product,
            'productImages' => $productImages,
            'productSizeId' => $this->productSizeId
        ]);
    }
}
