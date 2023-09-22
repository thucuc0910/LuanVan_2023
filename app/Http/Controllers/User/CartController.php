<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()  {
        // dd('dfbf');
        $categories = Category::where('status', '1')->get();

        return view('user.carts.cart',compact('categories'));
    }
    
}
