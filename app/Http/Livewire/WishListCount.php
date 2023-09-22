<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListCount extends Component
{
    public $wishlistCount;

    // wishlistAddedUpdated

    protected $listeners = ['wishListAddedUpdated' => 'checkWishListCount'];

    public function checkWishListCount(){
        if(Auth::check()){
            return $this->wishlistCount = Wishlist::where('user_id',auth()->user()->id)->count();
        }else{
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        $this->wishlistCount = $this->checkWishListCount();
        return view('livewire.wish-list-count',[
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
