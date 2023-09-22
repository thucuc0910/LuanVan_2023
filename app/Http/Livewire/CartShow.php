<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $categories, $carts, $quantityCount = 1, $totalPrice = 0;

    public function mount($categories)
    {

        $this->categories  = $categories;
    }
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Giỏ hàng được cập nhật thành công.',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else{
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Chỉ còn ' . $productColor->quantity . ' sản phẩm trong khả dụng.',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }else{
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Chỉ còn ' . $productColor->quantity . ' sản phẩm trong khả dụng.',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }

        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi gì xảy ra.',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){
                if ($productColor->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Giỏ hàng được cập nhật thành công.',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else{
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Chỉ còn ' . $productColor->quantity . ' sản phẩm trong khả dụng.',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }else{
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Chỉ còn ' . $productColor->quantity . ' sản phẩm trong khả dụng.',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi gì xảy ra.',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function render()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.cart-show', [
            'categories' => $this->categories,
            'carts' => $this->carts,
        ]);
    }

    public function removeCartListITem(int $cartlistId){
        Cart::where('user_id', auth()->user()->id)->where('id', $cartlistId)->delete();
        $this->emit('wishListAddedUpdated');
        $this->dispatchBrowserEvent('message',[
            'text' => 'Sản phẩm đã được xoá khỏi danh sách yêu thích thành công!!!',
            'type' => 'success',
            'status' => 200
        ]);
    }
}
