<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\vnpay;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\links;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->get();
        $products = Product::where('status', '1')->get();
        return view('user.home', compact('products', 'sliders', 'categories'));
    }
    public function login()
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->get();
        $products = Product::where('status', '1')->get();

        return view('user.auth.login', compact('products', 'sliders', 'categories'));
    }
    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:8|max:45'
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exist' => 'Email is not exists in system',
                'password.required' => 'Password is required'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:8|max:45'
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exist' => 'Email is not exists in system',
                'password.required' => 'Password is required'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if (Auth::guard('user')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            session()->flash('fail', 'Incorrect credentials');
            return redirect()->route('user.auth.login');
        }
    }


    public function logout(Request $request)
    {
        // dd();
        Auth::guard('user')->logout();
        session()->flash('fail', 'You are logged out!');
        // return redirect()->route('user.login');
        return redirect('/user/home');
    }


    public function products($category_slug)
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->get();
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('user.products.index', compact('sliders', 'products', 'category', 'categories'));
        } else {
            return redirect()->back();
        }
    }

    public function productDetail($category_slug, $product_slug)
    {
        $categories = Category::where('status', '1')->get();
        $colors = Color::where('status', '1')->get();

        $product = Product::where('category_id', $category_slug)->where('id', $product_slug)->first();

        return view('user.products.productDetail', compact('product', 'categories'));
    }

    public function thankyou(Request $request)
    {
        // dd($request->all());
        $categories = Category::where('status', '1')->get();

        if (isset($_GET['partnerCode'])) {
            
        } elseif (isset($_GET['vnp_Amount'])) {
            $data_vnpay = vnpay::create([
                'vnp_Amount'            => $_GET['vnp_Amount'],
                'vnp_BankCode'          => $_GET['vnp_BankCode'],
                'vnp_BankTranNo'        => $_GET['vnp_BankTranNo'],
                'vnp_CardType'          => $_GET['vnp_CardType'],
                'vnp_OrderInfo'         => $_GET['vnp_OrderInfo'],
                'vnp_PayDate'           => $_GET['vnp_PayDate'],
                'vnp_ResponseCode'      => $_GET['vnp_ResponseCode'],
                'vnp_TmnCode'           => $_GET['vnp_TmnCode'],
                'vnp_TransactionNo'     => $_GET['vnp_TransactionNo'],
                'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
                'vnp_TxnRef'            => $_GET['vnp_TxnRef'],
                'vnp_SecureHash'        => $_GET['vnp_SecureHash'],
            ]);

            if ($_GET['vnp_ResponseCode'] == '00') {


                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'tracking_no' => 'myshoes-' . Str::random(10),
                    'fullname' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                    'pincode' => 'aaaa',
                    'address' => auth()->user()->address,
                    'status_message' => 'in progress',
                    'payment_mode' => 'Thanh toán VNPAY',
                    'payment_id' =>  $data_vnpay->id,
                ]);

                $carts = Cart::where('user_id', auth()->user()->id)->get();

                foreach ($carts as $cartItem) {
    
                    if ($cartItem->product->selling_price != 0) {
                        $price = 0;
                        $price = $cartItem->product->selling_price;
                    } else {
                        $price = 0;
                        $price = $cartItem->product->original_price;
                    }
    
                    $orderItems = OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->product_id,
                        'product_color_id' => $cartItem->product_color_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $price
                    ]);
    
                    if ($cartItem->product_color_id != NULL) {
                        $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
                    } else {
                        $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
                    }
                }
                if ($orderItems) {
                    Cart::where('user_id', auth()->user()->id)->delete();
                    session()->flash('message','Đặt hàng thành công!!!.');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Đặt hàng thành công!!!.',
                        'type' => 'success',
                        'status' => 200
                    ]);
                    return redirect('/user/thank-you');
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Đã có lỗi xảy ra.',
                        'type' => 'error',
                        'status' => 500
                    ]);
                }
                // echo "GD Thanh cong";
            } 


            // $result = $this->IndexModel($data_vnpay);
            // $result = DB::insert('vnpay', $data_vnpay);
            // $this->payment_mode = 'Cash on Delivery';
            // $this->validate();
            


        }
        return view('user.thank_you', [
            'categories' => $categories
        ]);
    }
}
