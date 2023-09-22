<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function checkout()  {
        // dd('dfbf');
        $categories = Category::where('status', '1')->get();

        return view('user.carts.checkout',compact('categories'));
    }
}
