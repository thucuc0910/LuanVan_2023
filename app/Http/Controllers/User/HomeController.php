<?php

namespace App\Http\Controllers\User;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        // $sliders = Slider::where('status','1')->get();
        // return view('user.index', compact('sliders'));
        try {
            $products = Product::latest()->paginate(5);
        } catch (\Exception $exception) {
            $exception->getMessage();
        }

        return view('ecommerce.welcome', [
            'products' => $products
        ]);
    }

    // public function ()
    // {
        
    // }

}
