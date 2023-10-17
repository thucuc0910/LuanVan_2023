<?php

namespace App\Http\Controllers\User;

use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\vnpay;
use App\Models\Ward;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    public function blog()
    {
        $categories = Category::where('status', '1')->get();
        return view('user.blog', compact('categories'));
    }

    public function profile()
    {
        $addresses = Address::get();
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $orderItems = OrderItem::all();
        return view('user.profile', compact('categories', 'addresses', 'cities', 'districts', 'wards', 'orders', 'orderItems'));
    }



    public function orderDetail($orderId)
    {
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        $order = Order::where('id', $orderId)->first();
        $orderItems = OrderItem::all();
        return view('user.orderDetail', compact('categories', 'cities', 'districts', 'wards', 'order', 'orderItems'));
    }


    public function createAddress()
    {
        $addresses = Address::get();
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        return view('user.createAddress', compact('categories', 'addresses', 'cities', 'districts', 'wards'));
    }

    public function addAddress(Request $request)
    {
        if ($request->status == null) {
            $status = 0;
        } else {
            $status = 1;
        }
        if ($status == 1) {
            $a = Address::Where('status', 1)->first();
            if ($a != null) {
                $a->update([
                    'status' => 0
                ]);
            }
        }
        $temp = Address::create([
            'user_id' => auth()->user()->id,
            'name'      => $request->name,
            'phone'     => $request->phone,
            'city'      => $request->user_city,
            'district' => $request->user_district,
            'ward'      => $request->user_ward,
            'detail'      => $request->user_street,
            'pincode'   => '',
            'status'    => $status,
        ]);

        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        if ($temp) {
            session()->flash('success', 'Địa chỉ được thêm thành công!');
            return view('user.createAddress', compact('categories',  'cities', 'districts', 'wards'));
        }
    }

    public function updateAddress($addressId)
    {
        $address = Address::where('id', $addressId)->first();
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        return view('user.updateAddress', compact('categories',  'cities', 'districts', 'wards', 'address'));
    }

    public function editAddress(Request $request, $addressId)
    {
        if ($request->status == null) {
            $status = 0;
        } else {
            $status = 1;
        }
        if ($status == 1) {
            $a = Address::Where('status', 1)->first();
            if ($a != null) {
                $a->update([
                    'status' => 0
                ]);
            }
        }

        $address = Address::Where('id', $addressId)->first();

        if ($address != null) {
            $address->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'city' => $request->user_city,
                'district' => $request->user_district,
                'ward' => $request->user_ward,
                'street' => $request->street,
                'status' => $status,
            ]);
        }

        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        session()->flash('success', 'Địa chỉ được cập nhật thành công!');
        return view('user.updateAddress', compact('categories',  'cities', 'districts', 'wards', 'address'));
    }


    public function select_address(Request $request)
    {

        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $add_district = District::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output .= '<option>------------------------------------Chọn quận huyện------------------------------------<option>';
                foreach ($add_district as $key => $district) {
                    $output .= '<option value="' . $district->maqh . '">' . $district->name . '</option>';
                }
            } else {
                $add_ward = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output .= '<option>------------------------------------Chọn xã phường------------------------------------<option>';
                foreach ($add_ward as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
        }
        echo $output;
    }

    public function changePassword(Request $request)
    {
        $addresses = Address::get();
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();

        $request->validate([
            'oldpass' => 'required',
            'newpass' => 'required|min:8|max:45|required_with:repass|same:repass',
            'repass' => 'required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        if (!Hash::check($request->oldpass, $user->password)) {
            // dd('2222');

            session()->flash('danger', 'Mật khẩu không đúng. Vui lòng nhập lại!');
            return view('user.profile', compact('categories', 'addresses', 'cities', 'districts', 'wards'));
        } else {
            // dd('3333');
            $user->update([
                'password' => Hash::make($request->newpass)
            ]);
            session()->flash('success', 'Mật khẩu được cập nhật thành công!');
            return view('user.profile', compact('categories', 'addresses', 'cities', 'districts', 'wards'));
        }
    }

    public function searchProduct(Request $request)
    {
        $categories = Category::where('status', '1')->get();
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate();
            return view('user.search', compact('categories', 'searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Không tìm thấy sản phẩm tương tự.');
        }
    }


    // public function searchMicrophone(Request $request)
    // {
    //     dd($request->all());
    //     $categories = Category::where('status', '1')->get();
    //     if ($request->search) {
    //         $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate();
    //         return view('user.search', compact('categories', 'searchProducts'));
    //     } else {
    //         return redirect()->back()->with('message', 'Không tìm thấy sản phẩm tương tự.');
    //     }
    // }
    public function searchProductMicrophone(Request $request)
    {
        dd($request->all());
        $categories = Category::where('status', '1')->get();
        if ($request->keywork) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->keywork . '%')->latest()->paginate();
            return view('user.search', compact('categories', 'searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Không tìm thấy sản phẩm tương tự.');
        }
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
        Auth::guard('user')->logout();
        session()->flash('fail', 'You are logged out!');
        return redirect('/user/home');
    }


    public function products($categoryId)
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->get();
        $category = Category::where('id', $categoryId)->first();
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
        // $colors = Color::where('status', '1')->get();

        $product = Product::where('category_id', $category_slug)->where('id', $product_slug)->first();

        return view('user.products.productDetail', compact('product', 'categories'));
    }

    public function cancleOrder($orderId)
    {
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        $categories = Category::where('status', '1')->get();
        $order = Order::where('id', $orderId)->first();
        $orderItems = OrderItem::all();
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $result = $order->update([
                'status_message' => 'Cancle'
            ]);
        }

        if ($result) {

            session()->flash('success', 'Huỷ đơn hàng thành công!!!');
            return view('user.orderDetail', compact('categories', 'cities', 'districts', 'wards', 'order', 'orderItems'));
        }
    }

    public function thankyou(Request $request)
    {
        // dd($request->all());
        // $postData = $request->all();
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

                $payment_mode = 'Cash on VNPAY';
                $address = Address::where('user_id', auth()->user()->id)->where('status', 1)->first();
                // dd($address);
                $total = 0;
                if ($request->couponDiscount == 0) {
                    $total = $request->totalPriceDiscount;
                } else {
                    $total = $request->totalPrice;
                }

                // dd($total);

                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'tracking_no' => 'myshoes-' . Str::random(10),
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city' => $address->city,
                    'district' => $address->district,
                    'ward' => $address->ward,
                    'detail' => $address->detail,
                    'totalPrice' => $total,
                    'totalPriceDiscount' => $request->couponDiscount,
                    'note' => $request->note,
                    'status_message' => 'pending',
                    'payment_mode' => $payment_mode,
                    'payment_id' => $request->payment_id,
                ]);

                if ($order) {

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

                        if ($cartItem->product_size_id != NULL) {
                            $cartItem->productSize()->where('id', $cartItem->product_size_id)->decrement('quantity', $cartItem->quantity);
                        }
                    }

                    Cart::where('user_id', auth()->user()->id)->delete();
                }
            }
        }

        session()->flash('message', 'Đặt hàng thành công!!!.');
        return view('user.thank_you', [
            'categories' => $categories
        ]);
    }
}
