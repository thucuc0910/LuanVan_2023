<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class WishListShow extends Component
{
    public function removeWishListITem(int $wishlistId){
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();
        $this->emit('wishListAddedUpdated');
        $this->dispatchBrowserEvent('message',[
            'text' => 'Sản phẩm đã được xoá khỏi danh sách yêu thích thành công!!!',
            'type' => 'success',
            'status' => 200
        ]);
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.wish-list-show',[
            'wishlist' => $wishlist,
        ]);
    }
}
