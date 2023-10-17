<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function checkout(Request $request)  {
        // dd('dfbf');
        // dd($request->all());
        $couponDiscount = $request->couponDiscount;
        $totalPrice = $request->totalPrice;
        $totalPriceDiscount = $request->totalPriceDiscount;
        $categories = Category::where('status', '1')->get();

        return view('user.carts.checkout',compact('categories', 'couponDiscount', 'totalPrice', 'totalPriceDiscount'));
    }
}
