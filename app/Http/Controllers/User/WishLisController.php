<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class WishLisController extends Controller
{
    public function wishlist()
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->get();
        $products = Product::where('status', '1')->get();
        return view('user.products.wishlists.index', compact('products','sliders', 'categories'));
    }
}
