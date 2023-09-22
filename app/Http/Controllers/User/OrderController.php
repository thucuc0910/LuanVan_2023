<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $categories = Category::where('status', '1')->get();
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at','desc')->paginate(5);
        return view('user.orders.index',[
            'categories' => $categories,
            'orders' => $orders
        ]);
    }

    public function show($orderId){
        $categories = Category::where('status', '1')->get();
        $order = Order::where('user_id', auth()->user()->id)->where('id',$orderId)->first();
        if($order){
            return view('user.orders.show',[
                'categories' => $categories,
                'order' => $order,
            ]);
        }else{
            return redirect()->back()->with('message','Không có đơn hàng nào được tìm thấy.');
        }
        
    }
}
